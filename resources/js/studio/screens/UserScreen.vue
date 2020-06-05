<template>
    <div>
        <vue-headful
            v-if="isReady"
            :title="user.name + ' — Studio'"
            :description="summary"
            :image="avatar"
        />

        <navbar>
            <router-link slot="extra" :to="{name: 'home'}" class="btn btn-sm btn-outline-secondary">
                Go home
            </router-link>
        </navbar>

        <div v-if="isReady" class="mt-5 pt-5">
            <div class="container my-5 col-xl-8 offset-xl-2 col-lg-10 offset-lg-1 col-md-12 align-items-center">
                <div class="row">
                    <div class="col-lg-2">
                        <img :src="avatar" :alt="user.name" width="120" class="rounded-circle shadow-inner">
                    </div>
                    <div class="col-lg-10">
                        <h1>{{ user.name }}</h1>
                        <p class="text-secondary">
                            {{ summary }}
                        </p>
                    </div>
                </div>
            </div>

            <main role="main" class="col-xl-8 offset-xl-2 col-lg-10 offset-lg-1 col-md-12">
                <div v-if="posts.length > 0">
                    <h4 class="mb-4 border-bottom pb-2">
                        <span class="border-bottom border-dark pb-2">Featured</span>
                    </h4>

                    <featured-post-list :posts="posts.slice(0, featuredPostCount)"></featured-post-list>

                    <h4 v-if="posts.slice(featuredPostCount).length > 0" class="my-4 border-bottom mt-5 pb-2">
                        <span class="border-bottom border-dark pb-2">All Posts</span>
                    </h4>

                    <post-list :posts="posts.slice(featuredPostCount)"></post-list>
                </div>

                <div v-else class="col-12">
                    <p class="lead text-muted text-center mt-5 pt-5">You have no published posts</p>
                    <p class="lead text-muted text-center mt-1">Write on the go with our mobile-ready app!</p>
                </div>
            </main>
        </div>
    </div>
</template>

<script>
    import NProgress from 'nprogress'
    import vueHeadful from 'vue-headful';
    import PostList from '../components/PostList'
    import Navbar from "../components/Navbar";
    import FeaturedPostList from "../components/FeaturedPostList";

    export default {
        name: 'user-screen',

        components: {
            Navbar,
            PostList,
            FeaturedPostList,
            vueHeadful
        },

        data() {
            return {
                user: null,
                avatar: null,
                summary: null,
                featuredPostCount: 4,
                posts: [],
                isReady: false,
            }
        },

        created() {
            this.fetchData()
        },

        methods: {
            fetchData() {
                this.request()
                    .get(Studio.path + '/api/users/' + this.$route.params.identifier)
                    .then(response => {
                        this.user = response.data.user
                        this.avatar = response.data.avatar
                        this.summary = response.data.summary
                        this.posts = response.data.posts
                        this.isReady = true

                        NProgress.done()
                    })
                    .catch(error => {
                        // Add any error debugging...
                        this.$router.push({name: 'home'})

                        NProgress.done()
                    })
            }
        },
    }
</script>
