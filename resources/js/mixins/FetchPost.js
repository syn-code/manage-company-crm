export default {
    methods: {
        post: async function (url, options) {

            return await fetch(url, options)
            .then((request) => request.json())
            .then((response) => response)
            .catch((error) => console.log(error));

        }
    }
}
