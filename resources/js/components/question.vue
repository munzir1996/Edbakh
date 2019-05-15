<template>

    <div>

        <div>
            <li>
            <a @click="this.show_modal" style="color: #4AA047 !important;">{{this.question}}</a>
            </li>
        </div>

        <div v-if="this.show">
            {{this.answer}}
        </div>

    </div>

</template>

<script>

    export default {
        name: "question",

        props: ['question', 'answer'],

        data(){
            return {

                show: false,

            }
        },

        methods:{

            show_modal(){

                this.show = !this.show

            },

            hide_modal(){

                this.show = false

            }

        }
    }
</script>

<style scoped>
</style>