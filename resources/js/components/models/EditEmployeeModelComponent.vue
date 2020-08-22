<template>
    <div id="employeeModal" class="modal fade" role="dialog">
        <!-- v-if="show == true" -->
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="model-title">{{`Editing Employee - ${firstName} ${lastName}`}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="employee-edit-form">
                        <div class="row">
                            <div class="col">
                                <label for="first_name">First Name</label>
                                <input class="form-control" type="text" id="first_name" name="first_name" :value="firstName" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="last_name">Last Name</label>
                                <input class="form-control" type="text" id="last_name" name="last_name" :value="lastName" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="email">Email</label>
                                <input class="form-control" id="email" :value="email" readonly />
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-success" @click="updateEmployee" type="button">Update Employee</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import FetchPost from "../../mixins/FetchPost";

    export default {
        name: "EditEmployeeModelComponent",
        mixins: [FetchPost],
        props:{
            firstName: String,
            lastName: String,
            email: String,
            employeeId: Number,
            modelShow:{
              type: Boolean,
              default: false,
            },
        },
        data(){
            return {
                postOptions: {
                    method: 'PATCH',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-Token': document.querySelector('meta[name="csrf-token"]').content,
                    },
                    body: null
                },
            };
        },
        methods: {
            updateEmployee: function () {
                const form = document.querySelector('#employee-edit-form');
                const formInput = form.querySelectorAll('input');

                this.postOptions.body = this.prepareData(formInput);

                /* TODO:
                    - need to handle the success message / error when the response is returned
                     - need to emit a re-render of the list component on success
                */

               const result =  this.post(`/employee/${this.employeeId}`, this.postOptions);
            },
            prepareData: function (payload) {
                //const allowedData = ['first_name', 'last_name'];
               const formData = {
                   'first_name': null,
                   'last_name': null,
               };

               payload.forEach((input) => {
                    if (input.name == 'first_name') {
                        formData.first_name = input.value;
                    }

                    if (input.name == 'last_name') {
                        formData.last_name = input.value;
                    }
               });

                return JSON.stringify(formData);
            }

        }

    }
</script>
