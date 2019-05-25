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

                show: true,
                recipes: {},

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
                this.$Progress.start();
                axios.get('/ar/pricing/'+ id)
                .then(response => {
                    console.log("response");
                    console.log(response.data);
                    console.log(response.data.recipes);
                    this.recipes = response.data.recipes;

                    this.show = !this.show;
                    this.$Progress.finish();
                    //this.meals = parseInt(this.$root.weekCost);
                    //++this.$root.step;
                    
                })
                .catch(error => {
                    console.log("error");
                    console.log(error.data);
                });
                // if (this.language == 'ar') {
                //     axios.post('/ar/pricing', {
                //         plan_id: id,
                //         meal_cost: this.servingCost,
                //         no_meals: this.weekCost,
                //         shipping_cost: this.shippingCost,
                //         total_cost: this.total,
                //     })
                //     .then(response => {
                //         console.log("response");
                //         console.log(response.data);
                //         window.location.pathname = '/ar/pricing'
                //         this.$Progress.finish();
                //     })
                //     .catch(error => {
                //         console.log("error");
                //         console.log(error.data);
                //         window.location.pathname = '/ar/login'
                //     });
                    
                // }else{
                //     axios.post('/en/pricing', {
                //         plan_id: id,
                //         meal_cost: this.servingCost,
                //         no_meals: this.weekCost,
                //         shipping_cost: this.shippingCost,
                //         total_cost: this.total,
                //     })
                //     .then(response => {
                //         console.log("response");
                //         console.log(response.data);
                //         window.location.pathname = '/en/pricing'
                //         this.$Progress.finish();
                        
                //     })
                //     .catch(error => {
                //         console.log("error");
                //         console.log(error.data);
                //         alert(error);
                //         window.location.pathname = '/en/login'
                //     });
                }
            }

        }

</script>

<style scoped>

</style>