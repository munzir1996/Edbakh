<template>



</template>

<script>
    export default {

        name: "gift_content",

        data(){

          return {

              giftType: 1,

              giftAmount: 60,

              quantity: 1,

          }

        },

        methods: {

            changeGiftType(type){

                this.giftType = type;

            },

            changeGiftAmount(amount){

                this.giftAmount = amount

            },

            addGiftAmount(){

                this.quantity = this.quantity + 1

            },

            minusGiftAmount(){
                if (this.quantity > 1) {
                    this.quantity = this.quantity - 1            
                }

            }

        }
    }
</script>

<style scoped>

</style>