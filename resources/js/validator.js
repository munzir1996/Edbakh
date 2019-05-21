export default {
    data() {
        return {
            errors: [],
            phone: null,
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

            if (this.$root.step == 1) {
                if (this.language === 'ar') {
                    if (!this.phone) {
                        this.errors.push('رقم الهاتف مطلوب.');                    
                    } else if (this.phone == 10) {
                        this.errors.push('يجب ان يكون رقم الهاتف 10 ارقام');
                    }
    
                    if (!this.password) {
                        this.errors.push('كلمة المرور مطلوبة.');
                    }// else if (this.password.length < 8) {
                    //     this.errors.push('يجب ان تكون كلمة المرور اكثر من 8');
                    // }
                } else {
                    if (!this.phone) {
                        this.errors.push('Phone required.');                    
                    } else if (this.phone > 10 || this.phone <= 10) {
                        this.errors.push('Phone must be at least 10 digits');
                    }
    
                    if (!this.password) {
                        this.errors.push('Password Required');
                    }// else if (this.password.length < 8) {
                    //     this.errors.push('يجب ان تكون كلمة المرور اكثر من 8');
                    // }
                }
            }

            if (this.$root.step == 3) {
                this.errors = [];
                
                if (this.language === 'ar') {
                    if (!this.first_name) {
                        this.errors.push('الاسم الاول مطلوب.');
                    }
    
                    if (!this.last_name) {
                        this.errors.push('الاسم الاخير مطلوب.');
                    }
    
                    if (!this.address) {
                        this.errors.push('العنوان مطلوب.');
                    }
    
                    if (!this.city_id) {
                        this.errors.push('المدينة مطلوب.');
                    }
    
                    // if (!this.cardNumber) {
                    //     this.errors.push('رقم البطاقة مطلوب.');
                    // }
    
                    // if (!this.security) {
                    //     this.errors.push('رمز الحماية مطلوب.');
                    // }
                    
                } else {
                    if (!this.first_name) {
                        this.errors.push('First name required');
                    }
    
                    if (!this.last_name) {
                        this.errors.push('Last name required');
                    }
    
                    if (!this.address) {
                        this.errors.push('Address Required');
                    }
    
                    if (!this.city_id) {
                        this.errors.push('City required');
                    }
    
                    // if (!this.cardNumber) {
                    //     this.errors.push('Card Number required');
                    // }
    
                    // if (!this.security) {
                    //     this.errors.push('Security required');
                    // }
                }
            }

            if (!this.errors.length) {
                return true;
            }

            e.preventDefault();
        },

        // validEmail: function (email) {
        //     var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        //     return re.test(email);
        // }
    }

}