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
                    <form id="add-employee-form">
                        <input type="hidden" :value="companyId" name="company_id" />
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
    import FetchPost from "../../mixins/FetchPost";
    export default {
        name: "AddEmployeeModal.vue",
        mixins:[FetchPost],
        props: {
            companyId: String,
        },
        data() {
          return {
              formOptions: {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                },
                body: null,
              },
              form: {
                  first_name: null,
                  last_name: null,
                  email: null,
                  company_id: null,
                  phone: null,
              }
          }
        },
        methods:{
            addEmployee: async function () {
                this.getFormInput();
                this.setPostBody();
                const result = await this.post('/employee', this.formOptions);
                //TODO Add success message or control the errors that come back
                console.log(result);
            },
            getFormInput: function () {
                const form = document.querySelector('#add-employee-form');
                const allInput = form.querySelectorAll('input');
                this.mapInputValues(allInput);
            },
            mapInputValues: function (formInput) {
                formInput.forEach((input) => {
                    if (input.name in this.form) {
                        this.form[input.name] = input.value;
                    }
                });
            },
            setPostBody:function () {
                this.formOptions.body = JSON.stringify(this.form);
            }
        }

    }
</script>

<style scoped>

</style>
