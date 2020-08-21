export default {
    methods: {
        post: async function (url, options) {

            let data = await fetch(url, options)
            .then((request) => request.json())
            .then((response) => response)
            .catch((error) => console.log(error));

            return data;

        }
    }
}
