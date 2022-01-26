<template>
  <div>
  <h2>
            <strong>{{ post.title }}</strong>
          </h2>
         
          <p v-html="post.content"></p>
         <p>Created {{ post.created_at }}</p> 
    <!--       <p>{{ post.user.name }}</p> -->
            <small>{{ post.category.cat_name }}</small>
  </div>
</template>

<script>

export default {
  data() {
    return {
      post: Object,
     
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
