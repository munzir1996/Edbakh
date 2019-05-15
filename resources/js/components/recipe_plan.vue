<template>



</template>

<script>
    export default {
        name: "recipe_plan",

        props: ['serving', 'week', 'shipping', 'language'],

        created: {
            

        },

        data(){

            return {

                servingCost: this.serving,

                weekCost: this.week,

                shippingCost: this.shipping,

            }

        },

        computed: {

            total() {

                return  parseInt(this.servingCost) * parseInt(this.weekCost) + parseInt(this.shippingCost)
                
            }

        },

        methods: {

            setPerWeek(perWeek, shipping){
                
                this.weekCost = perWeek;

                this.shippingCost = shipping;
                
            },

            subscribe(id){
                if (this.language == 'ar') {
                    axios.post('/ar/pricing', {
                        plan_id: id,
                        meal_cost: this.servingCost,
                        no_meals: this.weekCost,
                        shipping_cost: this.shippingCost,
                        total_cost: this.total,
                    })
                    .then(response => {
                        //window.Alert.success('Subscribe Added!');
                        console.log("response");
                        console.log(response.data);
                        window.location.pathname = '/ar/pricing'
                    })
                    .catch(error => {
                        //window.Alert.error('Oops! Something went wrong!');
                        console.log("error");
                        console.log(error.data);
                        window.location.pathname = '/ar/pricing'
                    });
                    
                }else{
                    axios.post('/en/pricing', {
                        plan_id: id,
                        meal_cost: this.servingCost,
                        no_meals: this.weekCost,
                        shipping_cost: this.shippingCost,
                        total_cost: this.total,
                    })
                    .then(response => {
                        //window.Alert.success('Subscribe Added!');
                        console.log("response");
                        console.log(response.data);
                        window.location.pathname = '/en/pricing'
                        
                    })
                    .catch(error => {
                        //window.Alert.error('Oops! Something went wrong!');
                        console.log("error");
                        console.log(error.data);
                        alert(error);
                        window.location.pathname = '/en/pricing'
                    });
                }
            }

        }

    }
</script>

<style scoped>

</style>