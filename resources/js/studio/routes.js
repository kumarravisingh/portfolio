export default [
    {
        path: '/',
        name: 'home',
        component: require('./screens/HomeScreen').default,
    },
    {
        path: '/tags',
        name: 'tags',
        component: require('./screens/TagScreen').default,
    },
    {
        path: '/tags/:slug',
        name: 'tag-posts',
        component: require('./screens/TagPostsScreen').default,
    },
    {
        path: '/topics',
        name: 'topics',
        component: require('./screens/TopicScreen').default,
    },
    {
        path: '/topics/:slug',
        name: 'topic-posts',
        component: require('./screens/TopicPostsScreen').default,
    },
    {
        path: '/:identifier',
        name: 'user',
        component: require('./screens/UserScreen').default,
    },
    {
        path: '/:identifier/:slug',
        name: 'post',
        component: require('./screens/PostScreen').default,
    },
    {
        path: '*',
        name: 'catch-all',
        redirect: '/',
    },
]
