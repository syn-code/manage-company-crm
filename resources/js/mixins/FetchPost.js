export default {
    methods: {
        post: function (url, options) {
            fetch(url, options)
            .then((request) => request.json())
            .then((response) => console.log(response))
            .catch((error) => console.log(error));
        }
    }
}
