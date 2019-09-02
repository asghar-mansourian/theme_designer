<template>
  <div>
    <treeselect
      v-model="value"
      :options="options"
      @select="selectedCategory"
      :load-options="loadOptions"
      noChildrenText="هیچ زیر منوی ندارد"
      loading-text="در حال بارگذاری"
      placeholder="لطفا زیر منوی مورد نظر را انتخاب کنید"
    />
  </div>
</template>

<script>
import Treeselect from "@riophae/vue-treeselect";
import "@riophae/vue-treeselect/dist/vue-treeselect.css";
import { LOAD_CHILDREN_OPTIONS } from "@riophae/vue-treeselect";
import axios from "axios";
// We just use `setTimeout()` here to simulate an async operation
// instead of requesting a real API server for demo purpose.
const simulateAsyncOperation = fn => {
  setTimeout(fn, 1000);
};

export default {
  components: { Treeselect },
  data: () => ({
    value: 0,
    options: [
      {
        id: 0,
        label: "هیچ کدام",
        noChildren: null
      }
    ]
  }),
  created: function() {
    this.loadParentsOptions();
    this.$emit("selectedcategoryid", this.value);
  },
  methods: {
    selectedCategory(node) {
      this.$emit("selectedcategoryid", node.id);
    },
    loadParentsOptions() {
      let context = this;
      axios.get("/admin/ajax/categories").then(res => {
        let parents = res.data;
        parents.forEach(parent => {
          parent.children = null;
          context.options.push(parent);
        });
      });
    },
    loadChilrenOptions(parentNode) {
      let context = this;
      axios.get("/admin/ajax/categories/" + parentNode.id).then(res => {
        let childs = res.data;
        console.log(childs);
        childs.forEach(child => {
          parentNode.children = [
            {
              id: child.id,
              label: child.lable,
              children: null
            }
          ];
        });
      });
    },
    loadOptions({ action, parentNode, callback }) {
      let context = this;
      if (action === LOAD_CHILDREN_OPTIONS) {
        simulateAsyncOperation(() => {
          axios.get("/admin/ajax/categories/" + parentNode.id).then(res => {
            let childs = res.data;
            console.log(parentNode);
            parentNode.children = [];
            childs.forEach(child => {
              parentNode.children.push({
                id: child.id,
                label: child.label,
                children: null
              });
            });
            callback();
          });
        });
      }
    }
  }
};
</script>
