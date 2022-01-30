<template>
  <main>
    <div
      class="loading-shell d-flex align-items-center justify-content-center"
      v-if="loading"
    >
      <div class="text-center">
        <div class="spinner-border" role="status">
          <span class="visually-hidden">Loading...</span>
        </div>
      </div>
    </div>
    <div v-else>
      <div class="container">
        <div class="mt-5 row justify-content-between">

          <!-- lista posts -->
          <div class="col-7">
            <ul class="list-group">
              <li class="list-group-item" v-for="post in posts" :key="post.id">
                <router-link class="post-title"
                  :to="{ name: 'posts.show', params: { id: post.id } }"
                >
                  <h2 class="py-3 text-center">
                    <strong >{{ post.title }}</strong>
                  </h2>
                </router-link>
                <p v-html="post.content"></p>
                <p>Created {{ creationDate }} by {{ post.user.name }}</p>
                <p>
                  <small>{{ post.category.cat_name }}</small>
                </p>

                <span
                  v-for="tag in post.tags"
                  :key="tag.id"
                  class="
                    badge
                    bg-primary
                    text-white
                    ms-2
                    rounded-pill
                    text-small
                  "
                  >{{ tag.tag_name }}</span
                >
              </li>
            </ul>
                    <!-- menu paginazione -->

        <div class="row mt-3">
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
                  :class="{ active: currentPage === page }"
                >
                  <button class="page-link" @click="getData(page)">
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
          </div>

          <!-- lista categories -->

          <div class="col-4 categories-col">
            <h3 class="ms-4 mt-5">Categories:</h3>

            <ul>
              <li class="nav-link" @click="setCategory()">All</li>
              <li
                v-for="category of categoriesList"
                class="nav-link"
                :key="category.id"
                @click="setCategory(category.id)"
              >
                {{ category.cat_name }}
              </li>
            </ul>
          </div>
        </div>


      </div>
    </div>
  </main>
</template>

<script>
export default {
  name: "App",
  data() {
    return {
      welcomeMsg: "Welcome!",
      posts: [],
      selectedCategory: null,
      currentPage: 1,
      lastPage: null,
      categoriesList: [],
      loading: true,
    };
  },
  computed: {
    creationDate: function creationDate() {
      return window.dayjs(this.posts.created_at).format("DD/MM/YYYY HH:mm:ss");
    },
  },
  methods: {
    setCategory(id) {
      this.selectedCategory = id;

      this.getData();
    },

    getData(page = 1) {
      this.loading = true;
      axios
        .get("/api/posts", {
          params: {
            page,
            category: this.selectedCategory,
          },
        })
        .then((resp) => {
          this.posts = resp.data.data;
          this.currentPage = resp.data.current_page;
          this.lastPage = resp.data.last_page;
          this.loading = false;
        });
    },
    getCategories() {
      axios.get("/api/categories").then((resp) => {
        this.categoriesList = resp.data;
      });
    },
  },
  mounted() {
    this.getCategories();
    this.getData();
  },
};
</script>

<style scoped>
.post-title {
  text-decoration: none !important;
}

.categories-col {
  background-color: #D3E4CD;
}

.categories-col li {
  cursor: pointer;
}
.loading-shell {
  height: 100vh;
  width: 100vw;
}
.spinner-border {
  height: 200px;
  width: 200px;
  color: aquamarine;
}
</style>
