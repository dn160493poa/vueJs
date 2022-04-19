<template>
    <div>
        <CreateComponent></CreateComponent>
        <div>
<!--            <table class="table">-->
<!--                <thead>-->
<!--                <tr>-->
<!--                    <th scope="col">ID</th>-->
<!--                    <th scope="col">Name</th>-->
<!--                    <th scope="col">Age</th>-->
<!--                    <th scope="col">Job</th>-->
<!--                </tr>-->
<!--                </thead>-->
<!--                <tbody>-->
<!--                <tr v-for="person in persons">-->
<!--                    <th scope="row">{{ person.id }}</th>-->
<!--                    <td>{{ person.name }}</td>-->
<!--                    <td>{{ person.age }}</td>-->
<!--                    <td>{{ person.job }}</td>-->
<!--                </tr>-->
<!--                </tbody>-->
<!--            </table>-->
        </div>
        <!--    <SinglePostComponent></SinglePostComponent>-->
    </div>
</template>

<script>
import SinglePostComponent from "./SinglePostComponent"
import CreateComponent from "./CreateComponent"

export default {
    name: "PostComponent",

    data() {
        return {
            persons: []
        }
    },

    mounted() {
        this.getPosts()
    },

    methods: {
        getPosts(){
            axios.get('/people')
            .then( res => {
                this.persons = res.data
                console.log(res)
            })
            .catch( error => {
                console.log(error)
            })
        }
    },

    computed: {
        // vasyJob() {
        //     return this.name + 'work in bool'
        // }
    },

    components: {
        SinglePostComponent,
        CreateComponent,
    }
}
</script>

<style scoped>

</style>