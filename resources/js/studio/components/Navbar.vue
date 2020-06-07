<template>
    <nav class="navbar fixed-top py-3">
        <div class="container justify-content-between  col-md-10 px-6">
            <slot name="extra"></slot>

            <div class="align-items-center">
                <a class=" mx-2 social-icons pt-2" target="_blank" href="https://www.linkedin.com/in/kumarravisingh/">
                    <i class="fab fa-linkedin fa-2x"></i>
                </a>

                <a class=" mx-2 social-icons pt-2" target="_blank" href="https://twitter.com/kumarravi_me">
                    <i class="fab fa-twitter fa-2x"></i>
                </a>

                <a class=" mx-2 social-icons pt-2" target="_blank" href="https://github.com/kumarravisingh">
                    <i class="fab fa-github fa-2x"></i>
                </a>
                <router-link :to="{name:'tags'}" class="navbar-menu-item text-decoration-none">
                    Tags
                </router-link>
                <router-link :to="{name:'topics'}" class="navbar-menu-item text-decoration-none ml-2">
                    Topics
                </router-link>

                <div v-if="user" class="btn-group">
                    <slot name="actions"></slot>

                    <div class="dropdown">
                        <a href="#" id="dropdownMenu" class="nav-link p-0" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img :src="avatar" class="rounded-circle my-0 shadow-inner ml-3" style="width: 31px" :alt="user.name">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu">
                            <h6 class="dropdown-header">
                                {{ user.name }}
                                <br/>
                                {{ user.email }}
                            </h6>
                            <div class="dropdown-divider"></div>
                            <a :href="'/' + canvasPath + '/posts'" class="dropdown-item">Posts</a>
                            <a :href="'/' + canvasPath + '/tags'" class="dropdown-item">Tags</a>
                            <a :href="'/' + canvasPath + '/topics'" class="dropdown-item">Topics</a>
                            <a :href="'/' + canvasPath + '/stats'" class="dropdown-item">Stats</a>
                            <div class="dropdown-divider"></div>
                            <a :href="'/' + canvasPath + '/settings'" class="dropdown-item">Settings</a>
                            <a class="dropdown-item" style="cursor: pointer" @click.prevent="sessionLogout">
                                Sign out
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </nav>
</template>

<script>
    export default {
        name: 'navbar',

        data() {
            return {
                user: Studio.user,
                avatar: Studio.avatar,
                canvasPath: Studio.canvasPath
            }
        },

        methods: {
            sessionLogout() {
                this.logout()
            },
        }
    }
</script>
