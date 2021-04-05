<template>
    <div class="routeContainer">
        <div class="heading">
            <h2 id="title">Train Route App</h2>
            <add-route
                :v-on:reloadlist="getList()"
            />
        </div>
        <list-view 
            :routes="routes" 
            :v-on:reloadlist="getList()"
        /> <!--pass the property called routes with the route data-->
    </div>
</template>

<script>
import addRoute from "./addRoute.vue"
import listView from "./listView.vue"
export default {
    components: {
        addRoute,
        listView
    },
    data: function(){
        return{
            routes:[] //grab data from database and put it here
        }

    },
    methods: {
        getList(){
             axios.get('api/routes')
             .then(response => {
                 this.routes = response.data //save this response to routes 
             })
             .catch(error =>{
                 console.log(error);
             })
        },
        created(){
            this.getList()
        }
    }
};
</script>
<style scoped>
    .routeContainer{
        width: 350px;
        margin: auto;
    }

    .heading{
        background: #e6e6e6;
        padding: 10px;
    }

    #title{
        text-align: center;

    }

</style>
