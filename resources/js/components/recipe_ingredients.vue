<template>



</template>

<script>
    export default {

        name: "recipe_ingredients",

        data() {

            return {

                serve: true,
                hide:false

            }

        },

        created() {
            this.hide = !this.hide 
        },
        methods: {

            changeServe(serve){

                if (serve === 2) {
                    this.serve = true;    
                } else {
                    this.serve = false;
                }
                

            }

        }

    }
</script>

<style scoped>

</style>