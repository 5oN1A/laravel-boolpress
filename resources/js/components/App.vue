<template>
  <div class="container">
    <main>
      <ul>
        <li v-for="post in posts" :key="post.id">
          <h2 class="">{{ post.title }}</h2>
          <h3 class="">{{ post.category.cat_name }}</h3>
          <small>Author: {{ post.user.name }}</small>
        </li>
      </ul>
    </main>
  </div>
</template>

<script>
export default {
  name: "App",
  data() {
    return {
      welcomeMsg: "Welcome!",
      posts: [],
    };
  },
  mounted() {
    window.axios.get("/api/posts").then((resp) => {
      this.posts = resp.data;
    });
  },
};
</script>
