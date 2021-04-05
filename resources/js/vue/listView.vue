<template>
    <div>
        <div v-for="(route, index) in routes" :key="index">
            <list-route
                :route="route"
                class = "route"
                :v-on:itemchanged="$emit('reloadlist')"
                />
        </div>
    </div>
</template>

<script>
import listRoute from './listRoute.vue';
export default {
    props:['routes'],
    components: {
        listRoute
    },
    methods:{
        
    }
};
</script>
<style scoped>
    .route{
        background: #e6e6e6;
        padding: 5px;
        margin-top: 5px;
    }
</style>