<template>
    <main class="form-signin">
        <form @submit.prevent="userRegister">
            <h1 class="h3 mb-3 fw-normal">Welcome Join Us </h1>

            <div class="form-floating">
                <label for="floatingName">name</label>
                <input type="text" class="form-control" id="floatingName" placeholder="name@example.com" v-model="user.name">
            </div>

            <div class="form-floating">
                <label for="floatingEmail">Email address</label>
                <input type="email" class="form-control" id="floatingEmail" placeholder="name@example.com" v-model="user.email">
            </div>

            <div class="form-floating">
                <label for="floatingPassword">Password</label>
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" v-model="user.password">
            </div>

            <div class="form-floating">
                <label for="floatingPasswordConfirm">PasswordConfirm</label>
                <input type="password" class="form-control" id ="floatingPasswordConfirm" placeholder="PasswordConfirm" v-model="user.passwordconfirm">
            </div>

            <button class="w-100 btn btn-lg btn-primary" type="submit">Sign Up</button>
            <p class="mt-5 mb-3 text-muted">&copy; 2021–2022</p>
        </form>
    </main>
</template>

<script>
export default {
    data() {
        return {
            user: {},
            loading: true
        }
    },
    methods: {
        userRegister() {
            this.axios
            .post('http://localhost:8010/api/auth/register', this.user)
            .then(response => (alert('註冊成功')))
            .catch(response => (console.log(response)))
            .finally(() => this.loading = false)
        }
    }
}
</script>

<style scoped>
        .form-signin {
            width: 100%;
            max-width: 330px;
            padding: 15px;
            margin: auto;
        }

        .form-signin .checkbox {
            font-weight: 400;
        }

        .form-signin .form-floating:focus-within {
            z-index: 2;
        }

        .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }

        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
</style>
