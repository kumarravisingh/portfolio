<template>
    <div>
        <vue-headful
            title="Studio — A Laravel publishing platform"
            description="Sometimes creating a blog is easier said than done. With Canvas, it's just easier."
        />

        <navbar>
            <div class="btn-group align-items-center" slot="extra">
                <a href="https://twitter.com/@cnvs_io" class="pr-3 text-decoration-none" target="_blank" rel="noopener">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" viewBox="0 0 24 20" class="primary">
                        <path d="M21.173 3.162A5.038 5.038 0 0023.338.37a9.698 9.698 0 01-3.129 1.223A4.856 4.856 0 0016.616 0c-2.718 0-4.922 2.26-4.922 5.049 0 .396.042.78.126 1.15C7.728 5.988 4.1 3.979 1.67.922a5.14 5.14 0 00-.666 2.54c0 1.751.87 3.297 2.19 4.203a4.834 4.834 0 01-2.23-.63v.062c0 2.447 1.697 4.488 3.951 4.95a4.695 4.695 0 01-1.297.178c-.317 0-.627-.03-.927-.09.626 2.006 2.444 3.466 4.599 3.505A9.722 9.722 0 010 17.733 13.71 13.71 0 007.548 20c9.058 0 14.01-7.692 14.01-14.365 0-.22-.005-.439-.013-.654A10.1 10.1 0 0024 2.368a9.617 9.617 0 01-2.827.794z" fill-rule="evenodd"/>
                    </svg>
                </a>
                <a href="https://github.com/cnvs/canvas" class="text-decoration-none" target="_blank" rel="noopener">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" viewBox="0 0 24 24" class="primary">
                        <path d="M0 12.305c0 5.435 3.438 10.047 8.207 11.674.6.113.82-.267.82-.593 0-.292-.011-1.066-.017-2.093-3.339.744-4.043-1.65-4.043-1.65-.545-1.42-1.332-1.798-1.332-1.798-1.09-.764.083-.749.083-.749 1.203.087 1.837 1.268 1.837 1.268 1.071 1.88 2.809 1.338 3.493 1.022.109-.795.42-1.337.762-1.645-2.665-.31-5.466-1.365-5.466-6.08 0-1.343.467-2.442 1.235-3.302-.123-.311-.535-1.562.117-3.256 0 0 1.008-.33 3.3 1.261a11.241 11.241 0 013.005-.414c1.019.005 2.046.141 3.004.414 2.29-1.592 3.297-1.261 3.297-1.261.654 1.694.242 2.945.119 3.256.77.86 1.234 1.959 1.234 3.302 0 4.726-2.806 5.767-5.48 6.071.431.38.815 1.13.815 2.279 0 1.645-.015 2.971-.015 3.375 0 .329.216.712.825.591 4.765-1.63 8.2-6.239 8.2-11.672C24 5.508 18.627 0 12 0S0 5.508 0 12.305z" fill-rule="evenodd"/>
                    </svg>
                </a>
            </div>
        </navbar>

        <div class="mt-5 pt-5">
            <div class="col-xl-8 offset-xl-2 col-lg-10 offset-lg-1 col-md-12 mt-3">
                <h1 class="font-serif">Studio</h1>
                <p class="lead text-secondary">A Laravel Publishing Platform</p>

                <main role="main" class="mt-5">
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
    </div>
</template>

<script>
    import NProgress from 'nprogress'
    import vueHeadful from 'vue-headful'
    import Navbar from "../components/Navbar";
    import PostList from '../components/PostList'
    import FeaturedPostList from "../components/FeaturedPostList";

    export default {
        name: 'home-screen',

        components: {
            FeaturedPostList,
            Navbar,
            PostList,
            vueHeadful
        },

        data() {
            return {
                featuredPostCount: 4,
                posts: [],
            }
        },

        mounted() {
            this.fetchPosts()
        },

        methods: {
            fetchPosts() {
                this.request()
                    .get(Studio.path + '/api/posts')
                    .then(response => {
                        this.posts = response.data.posts

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
