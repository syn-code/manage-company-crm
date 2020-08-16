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
                        <input type="hidden" name="id" :value="employeeId" />
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
                                <input class="form-control" type="email" id="email" name="email" :value="email" />
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
    export default {
        name: "EditEmployeeModelComponent",
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

            };
        },
        methods: {
            // receiveEmployeeData: function (payload) {
            //     console.log(payload);
            // }
            updateEmployee: function () {
                const form = document.querySelector('#employee-edit-form');
                const formInput = form.querySelectorAll('input');

                //TODO map form data to a form object
                // then set the ajax using fetch
            }
        }

    }
</script>
