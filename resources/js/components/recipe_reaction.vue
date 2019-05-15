<template>

    <div class="recipe_title_icon_container">

        <div  class="recipe_title_icon text-center" role="button">

            <!--<svg class="fela-15vm6u fela-1rtnddl" width="25.333333333333332" height="24" viewBox="0 0 38 36" preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg" aria-labelledby="a11y&#45;&#45;id a11y&#45;&#45;id-desc"><title id="a11y&#45;&#45;id"></title><desc id="a11y&#45;&#45;id-desc">Rate this recipe</desc><path d="M19.022 29.348L7.577 35.394l2.186-12.806-9.26-9.069L13.3 11.651 19.022 0l5.723 11.65 12.796 1.87-9.26 9.068 2.186 12.806z" fill="#91c11e" stroke="#91c11e" stroke-width="2" fill-rule="evenodd"></path></svg>
            <svg class="fela-15vm6u fela-1rtnddl" width="25.333333333333332" height="24" viewBox="0 0 38 36" preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg" aria-labelledby="a11y&#45;&#45;id a11y&#45;&#45;id-desc"><title id="a11y&#45;&#45;id"></title><desc id="a11y&#45;&#45;id-desc">Rate this recipe</desc><path d="M19.022 29.348L7.577 35.394l2.186-12.806-9.26-9.069L13.3 11.651 19.022 0l5.723 11.65 12.796 1.87-9.26 9.068 2.186 12.806z" fill="#fff" stroke="#91c11e" stroke-width="2" fill-rule="evenodd"></path></svg>-->

            <i class="far fa-star"></i>

        </div>


        <div class="recipe_title_icon text-center" role="button">

            <!--<svg class="fela-15vm6u fela-1rtnddl" width="28.8" height="24" viewBox="0 0 24 20" preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg" aria-labelledby="a11y&#45;&#45;id a11y&#45;&#45;id-desc"><title id="a11y&#45;&#45;id"></title><desc id="a11y&#45;&#45;id-desc"></desc><path d="M12.2204462,6.73523319 C12.1365545,6.90041775 12.0637047,7.10799331 11.9999269,7.34869081 C11.9361948,7.10799331 11.8632076,6.90041775 11.7793159,6.73523319 C10.5709724,4.35444956 7.51174163,3.33400439 4.9463771,4.45560119 C2.38247872,5.57685784 1.28240188,8.4150135 2.49069953,10.7956696 C3.69885972,13.1762406 11.9979109,20 11.9979109,20 C12.0018054,20 20.3009482,13.1762406 21.5090167,10.7956696 C22.7173602,8.4150135 21.6188411,5.57685784 19.0532933,4.45560119 C16.4887077,3.33400439 13.428698,4.35444956 12.2204462,6.73523319 Z" fill="#91c11e" stroke="#91c11e" stroke-width="1" fill-rule="evenodd"></path></svg>

           <svg class="fela-15vm6u fela-1rtnddl" width="28.8" height="24" viewBox="0 0 24 20" preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg" aria-labelledby="a11y&#45;&#45;id a11y&#45;&#45;id-desc"><title id="a11y&#45;&#45;id"></title><desc id="a11y&#45;&#45;id-desc"></desc><path d="M12.2204462,6.73523319 C12.1365545,6.90041775 12.0637047,7.10799331 11.9999269,7.34869081 C11.9361948,7.10799331 11.8632076,6.90041775 11.7793159,6.73523319 C10.5709724,4.35444956 7.51174163,3.33400439 4.9463771,4.45560119 C2.38247872,5.57685784 1.28240188,8.4150135 2.49069953,10.7956696 C3.69885972,13.1762406 11.9979109,20 11.9979109,20 C12.0018054,20 20.3009482,13.1762406 21.5090167,10.7956696 C22.7173602,8.4150135 21.6188411,5.57685784 19.0532933,4.45560119 C16.4887077,3.33400439 13.428698,4.35444956 12.2204462,6.73523319 Z" fill="#fff" stroke="#91c11e" stroke-width="1" fill-rule="evenodd"></path></svg>-->

            <i class="far fa-heart"></i>

        </div>

        <div class="recipe_title_icon text-center" role="button" @click="pdf">

            <!--<svg class="fela-15vm6u fela-1rtnddl" width="22.857142857142858" height="20" viewBox="0 0 16 14" preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg" aria-labelledby="a11y&#45;&#45;id a11y&#45;&#45;id-desc"><title id="a11y&#45;&#45;id"></title><desc id="a11y&#45;&#45;id-desc">Download the recipe</desc><g fill="none" fill-rule="evenodd"><path d="M-4-5h24v24H-4z"></path><path d="M11.98 6a.494.494 0 0 0-.363.14L8.526 9.226V.518a.53.53 0 0 0-.144-.375A.534.534 0 0 0 8.006 0a.509.509 0 0 0-.52.518v8.72L4.384 6.142a.526.526 0 0 0-.364-.142.47.47 0 0 0-.363.156.494.494 0 0 0-.156.363.47.47 0 0 0 .156.363l3.935 3.912a.142.142 0 0 0 .051.052c.043.031.087.06.13.09a.433.433 0 0 0 .234.065l.079-.012h.025a.4.4 0 0 0 .142-.053c.044-.03.087-.059.13-.09l3.974-3.964a.494.494 0 0 0 .144-.363.54.54 0 0 0-.144-.377.54.54 0 0 0-.375-.142zm3.873 7.85A.46.46 0 0 0 16 13.5a.502.502 0 0 0-.147-.362.466.466 0 0 0-.343-.138H.49a.507.507 0 0 0-.355.138A.523.523 0 0 0 0 13.5a.478.478 0 0 0 .135.35c.101.102.219.151.355.15h15.02a.439.439 0 0 0 .343-.15z" fill="#91c11e"></path></g></svg>-->
        <i class="fas fa-arrow-down"></i>       
            
        </div>

    </div>

</template>

<script>

    export default {

        name: "recipe_reaction",

        props: {
            language: {required: false},
            recipe_id: {required: false},
        },
        data(){

            return {



            }

        },

        methods: {

            change_star() {




            },

            change_love() {



            },
            pdf(){

                if (this.language == 'ar') {
                    axios.get('/ar/generate-pdf/'+this.recipe_id)
                    .then(response => {
                        console.log("response");
                    })
                    .catch(error => {
                        console.log("error");
                        console.log(error.data);
                    });
                    
                }else{
                    axios.post('/en/generate-pdf/'+this.recipe_id)
                    .then(response => {
                        console.log("response");
                        
                    })
                    .catch(error => {
                        console.log("error");
                    });
                }


        }

        }

    }

</script>

<style scoped>

    .hide {
        display: none;
    }

</style>