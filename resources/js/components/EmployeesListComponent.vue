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
                <a href="" role="button" class="btn btn-primary btn-sm">
                    Edit Employee
                </a>
            </td>
        </tr>
</template>

<script>
    export default {
        name: "EmployeesListComponent",
        props:{
            employee:{
                type: Object,
            }
        }
    }
</script>

<style scoped>

</style>
