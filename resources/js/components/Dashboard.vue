<template>
   <div>
        <h1 class="text-3xl text-center mb-2">Link Shortener</h1>
        <Links></Links>
    </div>
</template>

<script>
import Links from './Links.vue'
import AddLink from './AddLink.vue'
import axios from 'axios'

export default {
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
        if (window.Laravel.user) {
            this.user = window.Laravel.user
        }
    },
    mounted() {
        axios.get('/api/auth/user-profile', {
            headers: {
                Authorization: 'Bearer ' + localStorage.getItem('access_token')
            }
        }).then((res) => {
            this.user = res.data
        })
    }
}
</script>
