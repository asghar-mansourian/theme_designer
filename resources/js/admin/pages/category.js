import Vue from "vue";
import Categories from "./../components/TreeSelectCategory";
import Axios from "axios";
import swal from "sweetalert";
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
        validator() {
            let messageMissingInput = '';
            if (!this.name) {
                messageMissingInput = 'فیلد نام نباید خالی باشد' + '\n';
            }
            if (!this.slug) {
                messageMissingInput += 'فیلد رشته اصلاق نباید خالی باشد' + '\n';
            }
            if (!this.image) {
                messageMissingInput += 'فیلد تصویر نباید خالی باشد' + '\n';
            }

            if (!messageMissingInput.length)
                return true;
            else {
                swal('خطا!', messageMissingInput, 'error');
                return false;
            }
        },
        store() {
            if (!this.validator())
                return false;

            let form_data = new FormData();
            form_data.append('name', this.name);
            form_data.append('image', this.image);
            form_data.append('slug', this.slug);
            form_data.append('parent_id', this.selectedCategoryId);
            form_data.append('type', this.type);
            form_data.append('position', this.position);
            Axios({
                    method: 'POST',
                    url: "categories",
                    data: form_data,
                })
                .then((response) => {
                    swal('موفق', 'دسته بندی با موفقیت ایجاد شد', 'success');
                })
                .catch(function(data) {
                    let errors = data.response.data.errors;
                    console.log(errors);
                    let messageErrorsInput = '';
                    for (var error in errors) {
                        errors[error].forEach(item => {
                            messageErrorsInput += item + '\n';
                        });
                    }
                    swal('خطا!', messageErrorsInput, 'error');
                })

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