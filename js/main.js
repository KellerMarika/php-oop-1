const { createApp } = Vue;

const app = createApp({
  data() {
    return {
      a: "www.miPiaciTu"


    }
  },
  methods: {
  },
  mounted() {
    console.log(this.a)
  },
}).mount("#app");