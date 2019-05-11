<template>



</template>

<script>

    import family_plan from './family_plan';

    import row_person_plan from './tow_person_plan';

    export default {

        name: "sign_up",

        data() {

            return {

                step: 1,

            }

        },

        methods: {

            next(){

                this.step = this.step + 1;

            },

            prev(){

                this.step = this.step - 1;
            },

            setStep(newStep){

                this.step = newStep

            }

        }

    }
</script>

<style scoped>



</style>