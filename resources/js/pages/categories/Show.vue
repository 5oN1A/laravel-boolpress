<template>
  <div>
    <h2 class="text-center">Categories Details {{ category.cat_name }}</h2>
    <div class="d-flex flex-column">
      <div
        class="p-2 mb-4 "
        v-for="post in category.posts"
        :key="post.id"
      >
        <h3>{{ post.title }}</h3>
        <p v-html="post ? post.content : ''"></p>
      </div>
    </div>
  </div>
</template>


<script>
export default {
  data() {
    return {
      category: {
        type: Object,
        default: () => ({}),
      },
    };
  },
  methods: {
    fetchPost() {
      window.axios
        .get("/api/categories/" + this.$route.params.category)
        .then((resp) => {
          this.category = resp.data;
        });
    },
  },
  mounted() {
    this.fetchPost();
  },
};
</script>

<style>
</style>

