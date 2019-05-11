<template>



</template>

<script>
    export default {

        name: "cookbook",

        data(){

            return {

                accordionStatus: [
                    {down: 1},
                    {down: 1},
                    {down: 1}
                ]

            }

        },

        methods: {

            changeAccordionStatus(index){

                if(this.accordionStatus[index].down === 1){

                    this.accordionStatus[index].down = 0

                }else {

                    this.accordionStatus[index].down = 1;

                }

            }

        }

    }
</script>

<style scoped>


</style>