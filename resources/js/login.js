import { required, email } from "vuelidate/lib/validators";

new Vue({
    el: "#login",
    data: {
        email: "",
        password: "",
        messages: {
            email: {
                required: "Email field is required",
                email: "Email should be in format ###@##.###"
            },
            password: {
                required: "Password field is required"
            }
        }
    },
    validations: {
        email: {
            required,
            email
        },
        password: {
            required
        }
    },
    methods: {
        async login() {
            try {
                this.$v.$touch();
                if (this.$v.$invalid) {
                    alert("Please enter your email and password correctly!");
                    return;
                }

                const response = await this.$axios.post(
                    this.$refs.form.getAttribute("action"),
                    _.pick(this.$data, ["email", "password"])
                );

                if (response.status === 200 && response.data.redirect) {
                    window.location.replace(response.data.redirect);
                }
            } catch (e) {
                if (e.response.status === 422) {
                    alert(e.response.data.message);
                    return;
                }

                alert(e.message);
            }
        }
    }
});
