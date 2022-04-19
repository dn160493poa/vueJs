<template>
    <div>
        <!--    <div>{{ name }}</div>-->
        <!--    <div>{{ vasyJob }}</div>-->
        <!--    <button @click="sayHello">Hello</button>-->
        <!--    <button @click="sayHi">Hi</button>-->
        <div>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Age</th>
                    <th scope="col">Job</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="person in persons">
                    <th scope="row">{{ person.id }}</th>
                    <td>{{ person.name }}</td>
                    <td>{{ person.age }}</td>
                    <td>{{ person.job }}</td>
                </tr>
                </tbody>
            </table>

<!--            <div>{{ person.name }}</div>-->
<!--            <div>{{ person.age }}</div>-->
<!--            <div>{{ person.job }}</div>-->
        </div>
        <!--    <SinglePostComponent></SinglePostComponent>-->
    </div>
</template>

<script>
import SinglePostComponent from "./SinglPostComponent"

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
            axios.get('/persons')
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
        vasyJob() {
            return this.name + 'work in bool'
        }
    },

    components: {
        SinglePostComponent
    }
}
</script>

<style scoped>

</style>