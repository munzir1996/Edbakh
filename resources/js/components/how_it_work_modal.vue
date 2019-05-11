<template>

    <div>

        <div class="read_more_btn_container" >
            <a @click="this.show_modal" style="color: #4AA047 !important;">{{this.btn}}</a>
        </div>

        <div v-if="this.show" class="how_it_work_modal_background">

            <div class="how_it_work_modal">

                <span class="my_close" @click="hide_modal">x</span>

                <slot></slot>

            </div>

        </div>

    </div>

</template>

<script>

    export default {
        name: "how_it_work_modal",

        props: ['btn'],

        data(){
            return {

                show: false,

            }
        },

        methods:{

            show_modal(){

                this.show = true

            },

            hide_modal(){

                this.show = false

            }

        }
    }
</script>

<style scoped>

    @media (max-width: 767px) {

        .read_more_btn_container {
            text-align: center !important;
        }

    }

</style>