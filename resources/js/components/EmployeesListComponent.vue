<template>
        <tr>
            <td scope="row">
                {{ employee.full_name }}
            </td>
            <td scope="row">
                {{ employee.email }}
            </td>
            <td scope="row">
                {{ employee.company.name }}
            </td>
            <td scope="row">
                {{ employee.start_date }}
            </td>
            <td scope="row">
                <button v-on:click="editEmployee" data-toggle="modal" data-target="#employeeModal" role="button" class="btn btn-primary btn-sm">
                    Edit Employee
                </button>
            </td>
        </tr>
</template>

<script>
    import EditEmployeeModelComponent from "./models/EditEmployeeModelComponent";
    export default {
        name: "EmployeesListComponent",
        components: {
            'edit-employee-model-component': EditEmployeeModelComponent,
        },
        props:{
            employee:{
                type: Object,
            }
        },
        data(){
          return {
              data:{
                  fullName: null,
                  email: null,
                  show: false,
              }
          }
        },
        methods: {
            /**
             * TODO:
             * map the items within the detailsArray to the data and then send the data down to the child
             */
            editEmployee: function (e) {
                const detailsArray = [];
                const tableRow = e.target.parentElement.parentElement;
                const td = tableRow.querySelectorAll('td');
                //console.log(td);
                td.forEach((item) => {
                    detailsArray.push(item.innerText);
                });

                //removes fullname from the detailsArray
                this.setFullName(detailsArray.shift());
                //removes email from the details array
                this.setEmail(detailsArray.shift());


                //todo need to emit the payload to parent component
               this.$emit('edit-employee-event', this.data);
            },
            setFullName: function (fullName){
                this.data.fullName = fullName;
            },
            setEmail: function (email){
                this.data.email = email;
            }
        }
    }
</script>

<style scoped>

</style>
