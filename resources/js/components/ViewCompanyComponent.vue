<template>
    <div>
        <div class="row">
            <div class="col">
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
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <button type="button" class="btn btn-success mt-3" href="/home" v-if="isAdmin != 0">
                                    Edit
                                </button>
                            </li>
                            <li class="list-inline-item">
                                <a class="btn btn-dark mt-3" href="/home">
                                    Back Home
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <svg width="38" class="mx-auto" height="38" viewBox="0 0 38 38" xmlns="http://www.w3.org/2000/svg" stroke="#d3d3d3" v-else>
                    <g fill="none" fill-rule="evenodd">
                        <g transform="translate(1 1)" stroke-width="2">
                            <circle stroke-opacity=".5" cx="18" cy="18" r="18"/>
                            <path d="M36 18c0-9.94-8.06-18-18-18">
                                <animateTransform
                                    attributeName="transform"
                                    type="rotate"
                                    from="0 18 18"
                                    to="360 18 18"
                                    dur="1s"
                                    repeatCount="indefinite"/>
                            </path>
                        </g>
                    </g>
                </svg>
            </div>
            <div class="col-7 d-flex">
                <table class="table table-striped table-responsive" v-if="show == true">
                    <thead>
                    <tr>
                        <th>
                            Full Name
                        </th>
                        <th>
                            Email
                        </th>
                        <th>
                            Company
                        </th>
                        <th>
                            Date Started
                        </th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        <employees-list-component v-for="employee in employees" :key="employee.id" :employee="employee"></employees-list-component>
                    </tbody>
                </table>
                <svg width="38" class="mx-auto" height="38" viewBox="0 0 38 38" xmlns="http://www.w3.org/2000/svg" stroke="#d3d3d3" v-else>
                    <g fill="none" fill-rule="evenodd">
                        <g transform="translate(1 1)" stroke-width="2">
                            <circle stroke-opacity=".5" cx="18" cy="18" r="18"/>
                            <path d="M36 18c0-9.94-8.06-18-18-18">
                                <animateTransform
                                    attributeName="transform"
                                    type="rotate"
                                    from="0 18 18"
                                    to="360 18 18"
                                    dur="1s"
                                    repeatCount="indefinite"/>
                            </path>
                        </g>
                    </g>
                </svg>
            </div>
        </div><!-- Row End -->
    </div>
</template>

<script>
    import EmployeesListComponent from "./EmployeesListComponent";
    export default {
        name: "ViewCompanyComponent",
        components:{
            'employees-list-component': EmployeesListComponent,
        },
        props:{
            isAdmin:{
                default: false,
            }
        },
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
                employees: null,
                show: null,
            };
        },
        methods: {
            getCurrentUrl: function () {
                 this.url =  location.href.split('/');

            },
            setId: function () {
                this.id = this.url.pop();
            },
             getCompany: async function () {
                fetch (`/get-company?id=${this.id}`)
                .then((request) => request.json())
                .then((response) => {
                    if (response) {
                        this.show = true;
                        this.company.name = response.name;
                        this.company.email = response.email;
                        this.company.logo = response.logo;
                        this.company.website = response.website;
                        setTimeout(() => {
                            this.setCard();
                        }, 1);
                    } else {
                        this.show = false;
                    }
                })
                .catch((err) => console.log(err));
            },
            getCompanyEmployees: async function (){
                fetch(`/show-employees?id=${this.id}`)
                .then((request) => request.json())
                .then((response) => {
                    this.employees = response;
                });
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
        mounted() {
            this.getCurrentUrl();
            this.setId();
            this.getCompany();
            this.getCompanyEmployees();
        }
    }
</script>

