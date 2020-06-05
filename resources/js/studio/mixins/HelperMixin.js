export default {
    computed: {
        Studio() {
            return window.Studio
        },
    },

    methods: {
        scrollToTop() {
            window.scrollTo(0, 0);
        },

        /**
         * Parse a given url.
         *
         * @param url
         * @link https://www.abeautifulsite.net/parsing-urls-in-javascript
         */
        parseURL(url) {
            let parser = document.createElement('a'),
                searchObject = {},
                queries,
                split,
                i;

            parser.href = url;
            queries = parser.search.replace(/^\?/, '').split('&');

            for (i = 0; i < queries.length; i++) {
                split = queries[i].split('=');
                searchObject[split[0]] = split[1];
            }

            return {
                protocol: parser.protocol,
                host: parser.host,
                hostname: parser.hostname,
                port: parser.port,
                pathname: parser.pathname,
                search: parser.search,
                searchObject: searchObject,
                hash: parser.hash
            };
        },

        publicIdentifier(post) {
            switch (Studio.identifier) {
                case 'id':
                    return post.user_id

                case 'username':
                    return post.user_meta.username

                default:
                    break;
            }
        }
    },
}
