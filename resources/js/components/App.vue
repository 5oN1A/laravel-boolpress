<template>

  <div class="container">
    <nav>
      <a href="/login">Login</a>
      <a href="/register">Register</a>
    </nav>

    <main>
      <ul>
        <li v-for="post in posts" :key="post.id">
          <h2 class="post-title">{{ post.title }}</h2>
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
