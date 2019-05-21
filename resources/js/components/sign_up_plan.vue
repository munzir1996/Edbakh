<template>



</template>

<script>
    export default {
        name: "sign_up_plan",

        props: ['serving', 'week', 'shipping', 'language', 'serve', 'title'],

        created: {
            

        },

        data(){

            return {

                serve: this.serve,
                title: this.title,

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

                this.$root.serve = this.serve;
                this.$root.title = this.title;

                this.$root.planId = id;
                this.$root.servingCost = this.servingCost;
                this.$root.weekCost = this.weekCost;
                this.$root.shippingCost = this.shippingCost;
                this.$root.total = this.total;
                ++this.$root.step;
            }

        }

    }
</script>

<style scoped>

</style>