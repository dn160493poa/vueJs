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
                <ShowComponent :person="person" :ref="`show_${person.id}`">></ShowComponent>
                <EditComponent :person="person" :ref="`edit_${person.id}`"></EditComponent>
            </template>
            </tbody>
        </table>
    </div>
</template>

<script>
import EditComponent from "./EditComponent";
import ShowComponent from "./ShowComponent";
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
        EditComponent,
        ShowComponent
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