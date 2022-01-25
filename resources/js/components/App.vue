<template>
  <div class="container">
    <main>
      <ul class="list-group">
        <li class="list-group-item" v-for="post in posts" :key="post.id">
          <h2>
            <strong>{{ post.title }}</strong>
          </h2>
          <p v-html="post.content"></p>
          <p>Author: {{ post.user.name }}</p>
          <p>
            <small>{{ post.category.cat_name }}</small>
          </p>

          <span
            v-for="tag in post.tags"
            :key="tag.id"
            class="badge bg-primary text-white ms-2 rounded-pill text-small"
            >{{ tag.tag_name }}</span
          >
        </li>
      </ul>
      <div class="row">
                <div class="col justify-content-center d-flex">
                    <nav>
                        <ul class="pagination">
                            <li>
                                <button
                                    class="page-link"
                                    v-if="currentPage != 1"

                                    @click="getData(currentPage - 1)"
                                >
                                    Indietro
                                </button>
                            </li>

                            <li
                                v-for="page of lastPage"
                                :key="page"
                                class="page-item"
                                :class="{ 'active': currentPage === page }"
                            >
                                <button
                                    class="page-link"
                                    @click="getData(page)"
                                >
                                    {{ page }}
                                </button>
                            </li>

                            <li>
                                <button
                                    class="page-link"
                                    v-if="currentPage != lastPage"

                                    @click="getData(currentPage + 1)"
                                >
                                    Avanti
                                </button>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
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
      currentPage: 1,
      lastPage: null
    };
  },
  
  methods: {
    getData(page = 1) {
      axios.get("/api/posts?page=" + page).then((resp) => {
        this.posts = resp.data.data;
        this.currentPage = resp.data.current_page;
        this.lastPage = resp.data.last_page;
      });
    },
  },
  mounted() {
    this.getData();
  },
};

</script>
