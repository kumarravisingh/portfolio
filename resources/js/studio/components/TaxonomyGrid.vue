<template>
    <div v-if="availableItems.length > 0">
        <div class="row row-cols-1 row-cols-md-3 row-cols-sm-2">
            <div v-for="item in availableItems">
                <router-link :to="{ name: type+'-posts', params: { slug: item.slug } }" class="text-decoration-none">
                    <div class="col mb-4">
                        <div class="card mb-4 shadow-sm">
                            <div class="card-body">
                                <p class="card-text">{{ item.name }}</p>
                            </div>
                        </div>
                    </div>
                </router-link>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'taxonomy-grid',

        props: {
            items: {
                type: Array,
                required: true,
            },
            type: {
                type: String,
                required: true
            }
        },

        data() {
            return {
                availableItems: this.items,
            }
        }
    }
</script>
