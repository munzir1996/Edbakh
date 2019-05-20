<script>

    import family_plan from './family_plan';

    import row_person_plan from './tow_person_plan';

    import validator from '../validator';

    export default {

        name: "sign_up",

        mixins: [validator],

        data() {

            return {
                step: 1,
            }

        },

        methods: {

            next(){
                this.checkForm();

                this.step = this.step + 1;
            },

            prev(){

                this.step = this.step - 1;
            },

            setStep(newStep){

                this.step = newStep

            },
        }

    }
</script>

<style scoped>



</style>