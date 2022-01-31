<template>
  <div>
    <h2>
      <strong>{{ post ? post.title : "" }}</strong>
    </h2>

    <img
      class="w-50"
      :src="post ? `/storage/` + post.cover_img : ''"
      :alt="post ? post.title : ''"
    />


    <p v-html="post ? post.content : ''"></p>

    <p>Created {{ post ? post.created_at : "" }}</p>
    <p>{{ post ? post.user.name : "" }}</p>
    <small>{{ post ? post.category.cat_name : "" }}</small>
    <span
      v-for="tag in post ? post.tags : ''"
      :key="tag.id"
      class="badge bg-primary text-white ms-2 rounded-pill text-small"
      >{{ tag.tag_name }}</span
    >
  </div>
</template>

<script>
export default {
  data() {
    return {
      post: null,
    };
  },
  methods: {
    fetchPost() {
      window.axios.get("/api/posts/" + this.$route.params.id).then((resp) => {
        this.post = resp.data;
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
