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
                <button v-on:click="editEmployee($event, employee.id)" data-toggle="modal" data-target="#employeeModal" role="button" class="btn btn-primary btn-sm">
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
                  id: null,
                  show: false,
              }
          }
        },
        methods: {
            /**
             * Gathers the employee data from where the event took place
             * @param e - the event that occurred
             * @param id - employee id
             */
            editEmployee: function (e, id) {

                const detailsArray = [];
                const tableRow = e.target.parentElement.parentElement;
                const td = tableRow.querySelectorAll('td');

                td.forEach((item) => {
                    detailsArray.push(item.innerText);
                });

                //removes full name from the detailsArray
                this.setFullName(detailsArray.shift());
                //removes email from the details array
                this.setEmail(detailsArray.shift());
                //set the employee id
                this.setId(id);

                //send data back to parent component
               this.$emit('edit-employee-event', this.data);
            },
            setFullName: function (fullName){
                this.data.fullName = fullName;
            },
            setEmail: function (email){
                this.data.email = email;
            },
            setId: function (employeeId) {
              this.data.id = employeeId;
            }
        }
    }
</script>

