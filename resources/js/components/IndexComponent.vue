<template>
    <div class="w-50">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Age</th>
                <th scope="col">Job</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
            </thead>
            <tbody>
            <template v-for="person in people">
                <tr :class="isEdit(person.id) ? 'd-none' : '' ">
                    <th scope="row">{{ person.id }}</th>
                    <td>{{ person.name }}</td>
                    <td>{{ person.age }}</td>
                    <td>{{ person.job }}</td>
                    <td><a href="#" @click.prevent="changeEditPersonId(person.id, person.name, person.age, person.job)" class="btn btn-success">Edit</a></td>
                    <td><a href="#" @click.prevent="deletePerson(person.id)" class="btn btn-danger">Delete</a></td>
                </tr>
                <EditComponent :person="person" :ref="`edit_${person.id}`"></EditComponent>
            </template>
            </tbody>
        </table>
    </div>
</template>

<script>
import EditComponent from "./EditComponent";
export default {
    name: "IndexComponent",

    data() {
        return {
            people: null,
            editPersonId: null,
            name: '',
            age: null,
            job: ''
        }
    },

    mounted() {
        this.getPeople()
    },

    components: {
        EditComponent
    },

    methods: {
        getPeople(){
            axios.get('/api/people')
            .then(res => {
                this.people = res.data
            })
        },

        updatePerson(id) {
            this.editPersonId = null
            axios.patch(`/api/people/${id}`, { 'name': this.name, 'age': this.age, 'job': this.job})
                .then(res => {
                    this.getPeople()
                })
        },

        changeEditPersonId(id, name, age, job){
            this.editPersonId = id
            this.$refs[`edit_${id}`][0].name = name
            this.$refs[`edit_${id}`][0].age = age
            this.$refs[`edit_${id}`][0].job = job
        },

        deletePerson(id){
            axios.delete(`/api/people/${id}`)
                .then(res => {
                    this.getPeople()
                })
        },

        isEdit(id){
            return this.editPersonId === id
        }
    }


}


</script>

<style scoped>

</style>