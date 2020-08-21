<template>
    <div id="addEmployeeModal" class="modal fade" role="dialog">
        <!-- v-if="show == true" -->
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="model-title">Add An Employee</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="employee-edit-form">
                        <div class="row">
                            <div class="col">
                                <label for="first_name">First Name</label>
                                <input class="form-control" type="text" id="first_name" name="first_name" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="last_name">Last Name</label>
                                <input class="form-control" type="text" id="last_name" name="last_name" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="email">Email</label>
                                <input class="form-control" id="email" name="email" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="email">Employee Phone Number</label>
                                <input class="form-control" id="phone" name="phone" />
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-success" @click="addEmployee" type="button">Add Employee</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "AddEmployeeModal.vue",
        props: {
            companyId: String,
        },
        methods:{
            addEmployee: function () {
                //TODO functionality to add employee here
            }
        }
    }
</script>

<style scoped>

</style>
