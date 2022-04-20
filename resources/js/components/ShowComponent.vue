<template>
    <tr :class="this.$parent.isEdit(person.id) ? 'd-none' : '' ">
        <th scope="row">{{ person.id }}</th>
        <td>{{ person.name }}</td>
        <td>{{ person.age }}</td>
        <td>{{ person.job }}</td>
        <td><a href="#" @click.prevent="changeEditPersonId(person.id, person.name, person.age, person.job)" class="btn btn-success">Edit</a></td>
        <td><a href="#" @click.prevent="deletePerson(person.id)" class="btn btn-danger">Delete</a></td>
    </tr>
</template>

<script>
export default {
    name: "ShowComponent",

    props: [
        'person'
    ],

    data() {
        return {
        }
    },

    methods: {
        changeEditPersonId(id, name, age, job){
            this.$parent.editPersonId = id
            this.$parent.$refs[`edit_${id}`][0].name = name
            this.$parent.$refs[`edit_${id}`][0].age = age
            this.$parent.$refs[`edit_${id}`][0].job = job
        },

        deletePerson(id){
            axios.delete(`/api/people/${id}`)
                .then(res => {
                    this.$parent.getPeople()
                })
        },
    }


}


</script>

<style scoped>

</style>