import Vue from "vue";
import VueRouter from "vue-router";

import Home from "./pages/Home.vue";
import About from "./pages/About.vue";
import Contact from "./pages/Contact.vue";
import PostsShow from "./pages/posts/Show.vue";
import CategoryShow from "./pages/categories/Show.vue";

Vue.use(VueRouter);

const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/",
            name: "home",
            component: Home,
        },
        {
            path: "/about",
            name: "about",
            component: About,
           
        },
        {
            path: "/contact",
            name: "contact",
            component: Contact,
           
        },
        {
            path: "/posts/:id",
            name: "posts.show",
            component: PostsShow,
          },
          {
            path: "/categories/:category",
            name: "categories.show",
            component: CategoryShow,
          },
      
    ],
});

export default router;