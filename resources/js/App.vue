<template>
    <div>
        <div class="flex bg-gray-100 border-b border-gray-300 py-4 mb-5">
            <div class="container mx-auto">
                <router-link v-if="!isLoggedIn" class="mr-4" :to="{ name: 'HomePage' }" exact>Home</router-link>
                <router-link v-else class="mr-4" :to="{ name: 'DashboardPage' }" exact>Home</router-link>
            </div>
            <div class="flex mx-auto" v-if="isLoggedIn">
                <p class="mr-5 text-2xl">Logged as: <b>{{ user.name }}</b></p>
                <a v-if="user" class="nav-item nav-link btn bg-red-800 hover:bg-red-300 text-white font-semibold py-2 px-4 border border-gray-400 rounded shadow" style="cursor: pointer;" @click="logout">Logout</a>
            </div>
            <div class="flex mx-auto" v-else>
                <router-link class="mr-4" :to="{name: 'LoginPage'}" exact>Login</router-link>
                <router-link :to="{name: 'RegisterPage'}">Register</router-link>
            </div>
        </div>
        <div class="container mx-auto py-2">
            <div v-if="loggedOut" class="text-3xl text-red-500 text-bold text-center">Session expired. You've been logged out.</div>
            <router-view @logged="checkIfLogged" @user="setUser" :isLoggedIn="isLoggedIn"></router-view>
        </div>
    </div>
</template>

<script>
import axios from './axios';
import moment from 'moment'

export default {
    name: "App",
    data() {
        return {
            isLoggedIn: false,
            user: null,
            loggedOut: false
        }
    },
    created() {
        if (window.Laravel.isLoggedin && localStorage.getItem('access_token')) {
            this.isLoggedIn = true
            this.user = window.Laravel.user
        } else {
            this.isLoggedIn = false
            this.user = null
        }
    },
    beforeUpdate() {
        if(moment(new Date()).format('MMMM Do YYYY, HH:mm:ss') > localStorage.getItem('expires_in')) {
            localStorage.clear();
            this.isLoggedIn = false;
            this.user = null;
            this.loggedOut = true;
        }
    },
    methods: {
        checkIfLogged(value) {
            this.isLoggedIn = value;
        },
        setUser(value) {
            this.user = value;
        },
        logout(e) {
            e.preventDefault()
            axios.post('/api/auth/logout').then(()=>{
                this.isLoggedIn = false;
                this.user = null;
                localStorage.clear();
                this.$router.push({ name: "LoginPage"})
            }).catch((error) =>{
                 console.log("ERRRR:: ",error.response.data);
            })
        }
    }
}
</script>