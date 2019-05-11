<template>

    <div class="col-lg-5 col-md-5 col-sm-12 mr-md-5 ml-md-auto mb-md-0 mb-5" style="padding-right: 0 !important; padding-left: 0 !important;">

        <div class="pricing_plan">

            <div class="pricing_plan_header" style="background: #fff !important;">

                <h3 class="pricing_plan_title">{{this.title}}</h3>

                <p class="pricing_plan_text">{{this.serve}}</p>

            </div>

            <div class="plan_image pricing_plan_tow_person"></div>

            <p class="plan_description_text">

                {{this.description_text}}

            </p>

            <div>

                <div class="plan_quantity_selector">

                    <fieldset class="plan_quantity_selector_inputs">

                        <legend class="plan_quantity_selector_legend">tow_person</legend>

                        <input id="tow_person_1_option" @click="setPerWeek(2)" type="radio" name="tow_person_plan" class="plan_quantity_selector_radio" checked>

                        <label for="tow_person_1_option" class="plan_quantity_selector_label">
                            <span>2</span>
                        </label>

                        <legend class="plan_quantity_selector_legend">three_person</legend>

                        <input id="tow_person_2_option" @click="setPerWeek(3)" type="radio" name="tow_person_plan" class="plan_quantity_selector_radio">

                        <label for="tow_person_2_option" class="plan_quantity_selector_label">
                            <span>3</span>
                        </label>

                    </fieldset>

                    <p class="plan_quantity_selector_text">{{this.per_week}}</p>

                </div>

                <div class="plan_pricing">

                    <p class="plan_pricing_price">

                        <span class="plan_pricing_item">{{this.perServing}} <br> {{this.currency}}</span>

                        <span class="plan_pricing_description">{{this.per_serving}}</span>

                    </p>

                    <p class="plan_pricing_price">

                        <span class="plan_pricing_item">{{this.shipping}} <br> {{this.currency}}</span>

                        <span class="plan_pricing_description">{{this.shipping_text}}</span>

                    </p>

                    <p class="plan_pricing_price">

                        <span class="plan_pricing_item">{{this.total}} <br> {{this.currency}}</span>

                        <span class="plan_pricing_description">{{this.total1}}</span>

                        <span class="plan_pricing_description">{{this.total2}}</span>

                    </p>

                </div>

                <slot></slot>

            </div>

        </div>

    </div>

</template>

<script>
    export default {

        name: "tow_person_plan",

        props: [
            'title', 'serve', 'per_week', 'per_serving', 'shipping_text', 'total1', 'total2', 'currency', 'description_text'
        ],

        data(){

            return {

                perServing: 9.99,

                serves: 2,

                perWeek: 2,

                shipping: 7.99,

            }

        },

        computed: {

            total() {

               return this.perServing * this.perWeek * this.serves + this.shipping

            }

        },

        methods: {

            setPerWeek(perWeek){

                if(perWeek == 2) {

                    this.shipping = 7.99

                }else {

                    this.shipping = 0

                }

                this.perWeek = perWeek

            }

        }
    }
</script>

<style scoped>

</style>