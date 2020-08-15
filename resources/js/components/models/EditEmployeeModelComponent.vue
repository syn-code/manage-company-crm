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
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-success" type="button">Update Employee</button>
                </div>
            </div>
        </div>
    </div>
<!--    <div id="employeeModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" style="display:none;">-->
<!--        <div class="modal-dialog modal-dialog-centered" role="document">-->
<!--            <div class="modal-content">-->
<!--                <div class="modal-header">-->
<!--                    <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>-->
<!--                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
<!--                        <span aria-hidden="true">×</span>-->
<!--                    </button>-->
<!--                </div>-->
<!--                <div class="modal-body">-->
<!--                    <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>-->
<!--                </div>-->
<!--                <div class="modal-footer">-->
<!--                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
<!--                    <button type="button" class="btn btn-primary">Save changes</button>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
</template>

<script>
    export default {
        name: "EditEmployeeModelComponent",
        props:{
            firstName: String,
            lastName: String,
            email: String,
            //company: String,
            modelShow:{
              type: Boolean,
              default: false,
            },
        },
        data(){
            return {
                // data: {
                //     firstName: null,
                //     lastName: null,
                // },

            };
        },
        created() {
           // const nameSplit = this.fullName.split(' ');
           // console.log(nameSplit);
        },
        methods: {
            // receiveEmployeeData: function (payload) {
            //     console.log(payload);
            // }
        }

    }
</script>
