<template>
    <div>
        <CreateComponent></CreateComponent>
        <IndexComponent></IndexComponent>
    </div>
</template>

<script>
import CreateComponent from "./CreateComponent"
import IndexComponent from "./IndexComponent"

export default {
    name: "PostComponent",

    data() {
        return {
            persons: []
        }
    },

    mounted() {
        //this.getPosts()
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
        CreateComponent,
        IndexComponent
    }
}
</script>

<style scoped>

</style>