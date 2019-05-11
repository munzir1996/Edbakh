<template>

    <div class="week-header__wrapper">
        <div class="container">

            <div class="week-header">
<!-- Weeks -->
                <div v-if="language == 'ar'" class="week-header-content__wrapper">
                    <div class="week-header-content">
                        <div class="week-header-content__container">
                            <div class="week-header-content__date">
                                <span>{{this.title_ar}}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div v-if="language == 'en'" class="week-header-content__wrapper">
                    <div class="week-header-content">
                        <div class="week-header-content__container">
                            <div class="week-header-content__date">
                                <span>{{this.title_en}}</span>
                            </div>
                        </div>
                    </div>
                </div>
<!-- Weeks -->
<!-- ابدأ الطبخ -->
                <div class="sign-up-cta">
                    <div class="sign-up-cta__btn-container">
                        <a v-if="language == 'ar'" href="/ar/cookbook" class="get-cooking-btn-blue">{{this.btn_title}}</a>
                        <a v-if="language == 'en'" href="/en/cookbook" class="get-cooking-btn-blue">{{this.btn_title}}</a>
                    </div>
                </div>
<!-- ابدأ الطبخ -->
            </div>

        </div>
    </div>

</template>

<script>

    export default {

        name: "meal-header",

        props: {

            title_ar: {required: true},
            title_en: {required: true},

            btn_title: {required: true},
            language: {required: false},

        },

    }
</script>

<style scoped>

</style>