<template>
    <div>
        <div class="card" style="width: 30em" v-if="show == true">
            <div class="card-header bg-primary text-white text-center">
                <label class="text-dark font-weight-bolder">Company Name:</label>
                <span class="text-center" id="title"></span>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                            <img id="company-image" class="img-responsive rounded img-thumbnail">
                    </div>
                    <div class="col">
                            <ul class="list-unstyled">
                                <li>Company Website</li>
                                <li><a id="website"></a></li>
                                <li>Company Email</li>
                                <li><a id="email"></a></li>
                            </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="alert alert-warning" v-else>
            <span>Sorry no company to show</span>
        </div>
        <a class="btn btn-dark mt-3" href="/home">Back Home</a>
    </div>
</template>

<script>
    export default {
        name: "ViewCompanyComponent",
        data(){
            return {
                url: '',
                id: null,
                company:{
                    name:null,
                    email:null,
                    logo:null,
                    website:null,
                },
                show: false,
            };
        },
        methods: {
            getCurrentUrl: function () {
                 this.url =  location.href.split('/');

            },
            setId: function () {
                this.id = this.url.pop();
            },
            getCompany: function () {

                fetch (`/get-company?id=${this.id}`)
                .then((request) => request.json())
                .then((response) => {
                    if (response) {
                        this.show = true;
                        this.company.name = response.name;
                        this.company.email = response.email;
                        this.company.logo = response.logo;
                        this.company.website = response.website;
                    }
                })
                .catch((err) => console.log(err));

            },
            setCard: function () {
                this.elementSelector('title').textContent = this.company.name;
                this.elementSelector('company-image').src = `/storage/${this.company.logo}`;
                this.elementSelector('website').textContent = this.company.website;
                this.elementSelector('website').href = this.company.website;
                this.elementSelector('email').textContent = this.company.email;
                this.elementSelector('email').href = `mailto:${this.company.email}`;
            },
            elementSelector: function (element) {
              return  document.querySelector(`#${element}`);
            }
        },
        created() {
            this.getCurrentUrl();
            this.setId();
            this.getCompany();
            setTimeout(() => {
                this.setCard();
            }, 400);
        }
    }
</script>

