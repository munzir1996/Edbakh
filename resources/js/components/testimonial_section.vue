<template>

    <section class="testimonial_section">
        <div class="container">
            <div class="testimonial_content_holder" :key="this.locale">

                <a @click="previous"><i class="fas fa-angle-left arrow_link"  v-if="this.locale === 'en'"></i></a>

                <a @click="next"><i class="fas fa-angle-right arrow_link"  v-if="this.locale === 'ar'"></i></a>

                <div style="display: inline-block; margin: 0 10px;" :key="this.index">

                    {{this.list[this.index]}}

                </div>

                <a @click="next"><i class="fas fa-angle-right arrow_link"  v-if="this.locale === 'en'"></i></a>

                <a @click="previous"><i class="fas fa-angle-left arrow_link"  v-if="this.locale === 'ar'"></i></a>

            </div>
        </div>
    </section>

</template>

<script>

    export default {

        name: "testimonial_section",

        props: ['locale'],

        data() {

            return {

                list: [
                    '“This might actually be the best thing that’s ever happened to me.” — @david_Ferron',
                    '“I\'d marry @blueapron if I could. We just have a good thing goin’ on.” — @kaywatt',
                    '“@blueapron has officially made me the person that takes photos of their meal #thatguy” — @QuehLbelle',
                ],

                index: 0,

            }

        },

        methods: {

            next() {

                if(this.index < this.list.length - 1){

                    this.index += 1;

                }else {

                    this.index = 0;

                }

            },

            previous(){

                if(this.index > 0){

                    this.index -= 1;

                }else {

                    this.index = this.list.length - 1;

                }

            }

        }

    }

</script>

<style scoped>

    .arrow_link:hover {
        cursor: pointer;
    }

    a {
        color: #777;
    }

</style>