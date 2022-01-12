<template>
    <main class="form-signin">
        <form @submit.prevent="userLogin">
            <h1 class="h3 mb-3 fw-normal">Please sigin in </h1>

            <div class="form-floating">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" v-model="user.email">
                <label for="floatingInput">Email address</label>
            </div>

            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" v-model="user.password">
                <label for="floatingPassword">Password</label>
            </div>

            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" value="remember-me"> Remember me
                </label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
            <p class="mt-5 mb-3 text-muted">&copy; 2021–2022</p>
            你的token為： {{ token }}
        </form>
    </main>
</template>
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

<script>
export default {
    data() {
        return {
            user: {},
            token: null,
            loading: true
        }
    },
    methods: {
        userLogin() {
            this.axios
            .post('http://localhost:8010/api/auth/login', this.user)
            .then(response => (
                this.token = response.data.data.auth.token
            ))
            .catch(err => console.log(err))
            .finally(() => this.loading = false)
        }
    }
}
</script>
