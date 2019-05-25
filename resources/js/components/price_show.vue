<template>



</template>

<script>

    export default {

        name: "price_show",

        props: ['language', 'plan_id', 'meal_cost', 'no_meals', 'shipping_cost', 'total_cost',],

        data() {

            return {

                recipes: {},
                count:0,
                selected:[],
                id: this.plan_id,
                meal_cost: this.meal_cost,
                no_meals: this.no_meals,
                shipping_cost: this.shipping_cost,
                total_cost: this.total_cost,
                
            }

        },

        beforeMount() {
            axios.get('/ar/pricing/'+ this.id)
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
        },

        methods: {

            add(id, index){
                if (this.language == 'ar') {
                    Toast.fire({
                        type: 'success',
                        title: 'تم أختيار الوجبة'
                    })
                    this.selected.push(id);
                    this.recipes.splice(index, 1);
                    this.count++;
                } else {
                    Toast.fire({
                        type: 'success',
                        title: 'Meal has been chossed'
                    })
                    this.selected.push(id);
                    this.recipes.splice(index, 1);
                    this.count++;
                }
                
                if (this.no_meals == this.count && this.language == 'ar') {
                    axios.post('/ar/pricing', {
                        plan_id: this.$root.planId,
                        recipes_id: this.selected,
                        meal_cost: this.$root.servingCost,
                        no_meals: this.$root.weekCost,
                        shipping_cost: this.$root.shippingCost,
                        total_cost: this.$root.total,
                    })
                    .then(response => {
                        console.log("response");
                        console.log(response.data);
                        //window.location.pathname = '/ar'
                        
                    })
                    .catch(error => {
                        console.log("error");
                        console.log(error.data);
                        //window.location.pathname = '/ar'
                    });
                }else if(this.no_meals === this.count && this.language == 'en'){

                    axios.post('/en/pricing', {
                        plan_id: this.$root.planId,
                        recipes_id: this.selected,
                        meal_cost: this.$root.servingCost,
                        no_meals: this.$root.weekCost,
                        shipping_cost: this.$root.shippingCost,
                        total_cost: this.$root.total,
                    })
                    .then(response => {
                        console.log("response");
                        console.log(response.data);
                        window.location.pathname = '/en'
                        
                    })
                    .catch(error => {
                        console.log("error");
                        console.log(error.data);
                        window.location.pathname = '/en'
                    });

                }
                //!this.hide
            },

        }

    }
</script>

<style scoped>



</style>