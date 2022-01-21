<template>
  <div class="container">
    <main>
      <ul>
        <li v-for="post in posts" :key="post.id">
          <h2>{{ post.title }}</h2>
          <h3>{{ post.category.cat_name }}</h3>
          <small>Author: {{ post.user.name }}</small>
          <p v-html="post.content"></p>

          <span
                v-for="tag in post.tags"
                :key="tag.id"
                class="badge bg-primary text-white ms-2 rounded-pill text-small"
                >{{ tag.tag_name }}</span
            >

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
