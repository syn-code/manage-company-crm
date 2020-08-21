export default {
    methods: {
        post: async function (url, options) {

            //will await until the promise is resolved before it the data is returned
            return await fetch(url, options)
            .then((request) => request.json())
            .then((response) => response)
            .catch((error) => console.log(error));

        }
    }
}
