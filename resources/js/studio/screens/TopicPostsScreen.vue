<template>
    <div>
        <vue-headful
            v-if="isReady"
            :title="topic.name + ' — Kumar Ravi'"
        />

        <navbar>
            <a slot="extra" href="/" class="align-content-center text-decoration-none">
                <svg fill="none" class="menu-icon-svg" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>

                <span class="mx-3 font-large text-decoration-none navbar-menu-item">Kumar Ravi</span>
            </a>
        </navbar>

        <div v-if="isReady" class="mt-5 pt-5">
            <div class="col-xl-8 offset-xl-2 col-lg-10 offset-lg-1 col-md-12 mt-3">
                <h1 class="font-serif">{{ topic.name }}</h1>

                <main role="main" class="mt-5">
                    <h4 class="my-4 border-bottom mt-5 pb-2">
                        <span class="border-bottom border-dark pb-2">All Posts</span>
                    </h4>

                    <post-list :posts="posts"></post-list>
                </main>
            </div>
        </div>
    </div>
</template>

<script>
    import NProgress from 'nprogress'
    import vueHeadful from 'vue-headful'
    import PostList from '../components/PostList'
    import Navbar from "../components/Navbar";

    export default {
        name: 'topic-posts-screen',

        components: {
            Navbar,
            PostList,
            vueHeadful
        },

        data() {
            return {
                posts: [],
                topic: null,
                isReady: false,
            }
        },

        mounted() {
            this.fetchData()
        },

        methods: {
            fetchData() {
                this.request()
                    .get(Studio.path + '/api/topics/' + this.$route.params.slug)
                    .then(response => {
                        this.topic = response.data.topic
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
        }
    }
</script>
