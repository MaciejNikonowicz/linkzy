<template>
   <div>
        <h1 class="text-3xl text-center mb-5">Link Shortener</h1>
        <Links></Links>
    </div>
</template>

<script>
import Links from './Links.vue'
import AddLink from './AddLink.vue'
import axios from 'axios'

export default {
    props: {
        isLoggedIn: Boolean
    },
    data() {
        return {
            user: null
        }
    },
    components: {
        Links,
        AddLink
    },
    created() {
        if (!this.isLoggedIn) {
            this.$router.push({ path: "/login"}); 
        }
        if (window.Laravel.user) {
            this.user = window.Laravel.user
        }
    },
    mounted() {

        /**  !! This should be moved to user-profile once created !! **/ 

        // axios.get('/api/auth/user-profile', {
        //     headers: {
        //         Authorization: 'Bearer ' + localStorage.getItem('access_token')
        //     }
        // }).then((res) => {
        //     this.user = res.data
        // })
    }
}
</script>
