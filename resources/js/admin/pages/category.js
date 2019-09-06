import Vue from "vue";
import Categories from "./../components/TreeSelectCategory";
import Axios from "axios";
import { emptyStatement } from "babel-types";

new Vue({
    components: { Categories },
    el: "#container-category",
    data: {
        selectedCategoryId: 0,
        name: "",
        src: "",
        image: "",
        type: 'blog',
        position: 'PT1'
    },

    computed: {
        slug: function() {
            var slug = this.sanitizeName(this.name);
            return slug;
        }
    },
    methods: {
        getCategoryId(categoryId) {
            this.selectedCategoryId = categoryId;
        },
        store() {
            if (!this.name) {
                alert('فیلد نام نباید خالی باشد');
            } else if (!this.slug) {
                alert('فیلد رشته الصاق نباید خالی باشد');
            } else if (!this.image) {
                alert('فیلد تصویر نباید خالی باشد');
            } else {
                let form_data = new FormData();
                form_data.append('name', this.name);
                form_data.append('image', this.image);
                form_data.append('slug', this.slug);
                form_data.append('parentId', this.selectedCategoryId);
                form_data.append('type', this.type);
                form_data.append('position', this.position);
                $('#loader').css('display', 'block');
                Axios({
                        method: 'POST',
                        url: "categories",
                        data: form_data,
                    })
                    .then((response) => {
                        $('#loader').css('disp;ay', 'none');
                        alert('با موفقیت ثبت شد.');
                        this.assign(this.$data, '');
                    })
                    .catch(function(error) {
                        $('#loader').css('display', 'none');
                        alert(error.response.data.slug);
                        this.assign(this.$data, '');
                    })
            }

        },
        sanitizeName: function(name) {
            var slug = "";
            // Change to lower case
            var nameLower = name.toLowerCase();
            // Letter "e"
            slug = nameLower.replace(/e|é|è|ẽ|ẻ|ẹ|ê|ế|ề|ễ|ể|ệ/gi, "e");
            // Letter "a"
            slug = slug.replace(/a|á|à|ã|ả|ạ|ă|ắ|ằ|ẵ|ẳ|ặ|â|ấ|ầ|ẫ|ẩ|ậ/gi, "a");
            // Letter "o"
            slug = slug.replace(/o|ó|ò|õ|ỏ|ọ|ô|ố|ồ|ỗ|ổ|ộ|ơ|ớ|ờ|ỡ|ở|ợ/gi, "o");
            // Letter "u"
            slug = slug.replace(/u|ú|ù|ũ|ủ|ụ|ư|ứ|ừ|ữ|ử|ự/gi, "u");
            // Letter "d"
            slug = slug.replace(/đ/gi, "d");
            // Trim the last whitespace
            slug = slug.replace(/\s*$/g, "");
            // Change whitespace to "-"
            slug = slug.replace(/\s+/g, "-");

            return slug;

        },
        url: function(e) {
            const file = e.target.files[0];
            this.src = URL.createObjectURL(file);
            this.image = file;
        }
    }
});