export default {
    data() {
        return {
            errors: [],
            email: null,
            password: null,
            fristName: null,
            lastName: null,
            address: null,
            city: null,
            cardNumber: null,
            security: null,
        }
    }, 

    methods: {
        checkForm: function (e) {
            this.errors = [];

            if (this.step == 1) {
                if (!this.email) {
                    this.errors.push('البريد الالكتروني مطلوب.');                    
                } else if (!this.validEmail(this.email)) {
                    this.errors.push('الايميل غير صحيح');
                }

                if (!this.password) {
                    this.errors.push('كلمة المرور مطلوبة.');
                } else if (this.password.length < 8) {
                    this.errors.push('يجب ان تكون كلمة المرور اكثر من 8');
                }
            }

            if (this.step == 3) {
                this.errors = [];

                if (!this.fristName) {
                    this.errors.push('الاسم الاول مطلوب.');
                }

                if (!this.lastName) {
                    this.errors.push('الاسم الاخير مطلوب.');
                }

                if (!this.address) {
                    this.errors.push('العنوان مطلوب.');
                }

                if (!this.city) {
                    this.errors.push('المدينة مطلوب.');
                }

                if (!this.cardNumber) {
                    this.errors.push('رقم البطاقة مطلوب.');
                }

                if (!this.security) {
                    this.errors.push('رمز الحماية مطلوب.');
                }
            }

            if (!this.errors.length) {
                return true;
            }

            e.preventDefault();
        },

        validEmail: function (email) {
            var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(email);
        }
    }

}
