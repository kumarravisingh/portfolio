<template>
    <div>
        <vue-headful
            title="Studio — Topics"
            description="Topics are great for broadly grouping your posts."
        />

        <navbar>
            <router-link slot="extra" :to="{name: 'home'}" class="btn btn-sm btn-outline-secondary">
                Go home
            </router-link>
        </navbar>

        <div class="mt-5 pt-5">
            <div class="col-xl-8 offset-xl-2 col-lg-10 offset-lg-1 col-md-12 mt-3">
                <h1 class="font-serif">Topics</h1>
                <p class="lead text-secondary">Topics are great for broadly grouping your posts.</p>

                <main role="main" class="mt-5">
                    <div v-if="topics.length > 0">
                        <taxonomy-grid :items="topics" type="topic"></taxonomy-grid>
                    </div>

                    <div v-else class="col-12">
                        <p class="lead text-muted text-center mt-5 pt-5">You have no topics</p>
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
    import TaxonomyGrid from "../components/TaxonomyGrid";

    export default {
        name: 'topic-screen',

        components: {
            TaxonomyGrid,
            Navbar,
            vueHeadful
        },

        data() {
            return {
                topics: [],
            }
        },

        mounted() {
            this.fetchTopics()
        },

        methods: {
            fetchTopics() {
                this.request()
                    .get(Studio.path + '/api/topics')
                    .then(response => {
                        this.topics = response.data

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
