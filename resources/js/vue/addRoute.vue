<template>
  <div>
        <label for="from" class="mt-3">From</label>
        <b-form-select v-model="route.from" :options="optionsFrom" value="route.from"></b-form-select>
        <label for="to" class="mt-3">To</label>
        <b-form-select v-model="route.to" :options="optionsTo" value="route.to" size="sm" class="mt-3"></b-form-select>
        <label for="departure" class="mt-3">Departure</label>
        <template>
            <datetime format="YYYY-MM-DD H:i:s" width="300px" name='route.departure' v-model="route.departure"></datetime>
        </template>
        <label for="arrival" class="mt-3">Arrival</label>
        <template>
            <datetime format="YYYY-MM-DD H:i:s" width="300px" name='route.arrival' v-model="route.arrival"></datetime>
        </template>
        <b-button @click="addRoute()" variant="primary" size="lg" class="mt-3">Submit</b-button>
             
  </div>
</template>


<script>
export default {
    data: function(){
        return {
            routeChoices: [],
            fromSelected: "",
            toSelected: "",
            departure: "",
            arrival: "",
            route:{
                from: "",
                to:"",
                departure:"",
                arrival:""
            },
            selectedFrom: 'null',
            selectedTo: null,
            optionsFrom: [
                { value: 'Park', text: 'Park' },
                { value: 'Rosebank', text: 'Rosebank' },
                 { value: 'Sandton', text: 'Sandton' },
                { value: 'Marlboro', text: 'Marlboro' },
                 { value: 'Midrand', text: 'Midrand' },
                { value: 'Centurion', text: 'Centurion' },
                 { value: 'Pretoria', text: 'Pretoria' },
                { value: 'Hatfield', text: 'Hatfield' },
                { value: 'Rhodesfield', text: 'Rhodesfield' },
                { value: 'OR Tambo', text: 'OR Tambo' },
            ],
            optionsTo: [
                { value: 'Park', text: 'Park' },
                { value: 'Rosebank', text: 'Rosebank' },
                 { value: 'Sandton', text: 'Sandton' },
                { value: 'Marlboro', text: 'Marlboro' },
                 { value: 'Midrand', text: 'Midrand' },
                { value: 'Centurion', text: 'Centurion' },
                 { value: 'Pretoria', text: 'Pretoria' },
                { value: 'Hatfield', text: 'Hatfield' },
                { value: 'Rhodesfield', text: 'Rhodesfield' },
                { value: 'OR Tambo', text: 'OR Tambo' },
            ]
        }
    },
    methods: {
        addRoute(){
            if(this.route.from === '' || this.route.to === ''){
                alert('Select From - To');
                return;
            }
            axios.post('api/route/store',{
                route: this.route
            })
            .then(response =>{
                if(response.status == 201){
                    this.route.from = "";
                    this.route.to = "";
                    this.route.departure = "";
                    this.route.arrival = "";
                    this.$emit('reloadlist');
                }
            })
            .catch(error =>{
                console.log(error);
            })
        },
        onSubmit(event) {
            event.preventDefault();
            console.log(this.route);

            axios
                .post("api/route/store", this.route)
                .then(Response => console.log("successful"))
                .catch(error => console.log(error));
        },
    }
};
</script>

<style scoped>
    .addRoute{
        display: flex;
        justify-content: center;
        align-items: center;
    }

    input{
        background: #f7f7f7;
        border: 1px;
        outline: none;
        padding: 5px;
        width:100%; /*it fills the entire available space */
    }

    .plus{
        font-size: 20px;
    }
    
    .active{
        color:#00CE25;  
    }
    .inactive{
        color:#999999;  
    }
</style>