<template>
    <div class="route">
        <input
            type="checkbox"
            @change="updateCheck()"
            v-model="route.completed"
            />
        <span :class="[route.completed ? 'completed' : '', 'routeText']">{{route.from}} To {{route.to}}-{{route.departure}}-{{route.arrival}}</span>
        <button @click="removeRoute()" class="trashcan">
            <font-awesome-icon icon="trash" />
        </button>
    </div>
</template>

<script>
export default {
   props:['route'],
   methods:{
       updateCheck(){
           axios.put('api/route/'+this.route.id,{
               route:this.route
           })
           .then(reponse=>{
               if(reponse.status == 200){
                   this.$emit('itemchanged');
               }
           })
           .catch(error=>{
               console.log(error);
           })
       },
       removeRoute(){
           axios.delete('api/route/'+this.route.id)
           .then(response =>{
               if(response.status == 200){
                   this.$emit('itemchanged');
               }
           })
           .catch(error=>{
               console.log( error );
           })
       }
   }
};
</script>

<style scoped>
    .completed{
        text-decoration: line-through;
        color: #999999;
    }

    .routeText{
        width: 100%;
        margin-left: 20px;
    }
    .route{
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .trashcan{
        background: #e6e6e6;
        border: none;
        color: #FF0000;
        outline: none;
    }
</style>