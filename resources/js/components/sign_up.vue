<template>



</template>

<script>

    //import family_plan from './family_plan';
    //import row_person_plan from './tow_person_plan';
    import validator from '../validator';

    export default {

        name: "sign_up",

        mixins: [validator],

        props: ['language',],

        data() {

            return {
                step: 1,
                phone:"",
                password:"",
                first_name:"",
                last_name:"",
                address:"",
                city_id:"",
                recipes:{},
                dates:{},

                count:0,
                meals:0,
                selected:[],
                length:0,
                hide: true,

            }

        },

        methods: {

            next(){

                this.checkForm();

                this.$root.step = this.$root.step + 1;
                
            },
            subscribe(id){
                this.planID = id;
                ++this.$root.step;
            },

            prev(){

                this.$root.step = this.$root.step - 1;
            },

            setStep(newStep){

                this.$root.step = newStep

            },

            order(){
                this.checkForm();

                axios.get('/ar/sign_up/recipes/'+this.$root.planId)
                .then(response => {
                    console.log("response");
                    console.log(response.data);
                    console.log(response.data.recipes);
                    console.log(response.data.dates);
                    this.dates = response.data.dates;
                    this.recipes = response.data.recipes;
                    this.meals = parseInt(this.$root.weekCost);
                    
                    ++this.$root.step;
                    
                })
                .catch(error => {
                    console.log("error");
                    console.log(error.data);
                });

            },
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
                
                if (this.meals === this.count && this.language == 'ar') {
                    axios.post('/register', {
                        plan_id: this.$root.planId,
                        recipes_id: this.selected,
                        city_id : this.city_id,
                        meal_cost: this.$root.servingCost,
                        no_meals: this.$root.weekCost,
                        shipping_cost: this.$root.shippingCost,
                        total_cost: this.$root.total,
                        phone: this.phone,
                        password: this.password,
                        first_name: this.first_name,
                        last_name: this.last_name,
                        address: this.address,
                    })
                    .then(response => {
                        console.log("response");
                        console.log(response.data);
                        window.location.pathname = '/ar'
                        
                    })
                    .catch(error => {
                        console.log("error");
                        console.log(error.data);
                        window.location.pathname = '/ar'
                    });
                }else if(this.meals === this.count && this.language == 'en'){

                    axios.post('/register', {
                        plan_id: this.$root.planId,
                        recipes_id: this.selected,
                        city_id : this.city_id,
                        meal_cost: this.$root.servingCost,
                        no_meals: this.$root.weekCost,
                        shipping_cost: this.$root.shippingCost,
                        total_cost: this.$root.total,
                        phone: this.phone,
                        password: this.password,
                        first_name: this.first_name,
                        last_name: this.last_name,
                        address: this.address,
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