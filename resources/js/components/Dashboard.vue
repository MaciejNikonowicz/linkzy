<template>
   <div>
        Dashboard <br>
        <hr>
        <div v-if="user">
            <Links></Links>
            <button @click.prevent="logout">Logout</button>
        </div>

    </div>
</template>

<script>
import Links from './Links.vue'

export default {
    data() {
        return {
            user: null
        }
    },
    components: {
        Links
    },
    methods:{
        logout(){
            axios.post('/api/logout').then(()=>{
                this.$router.push({ name: "HomePage"})
            })
        }
    },
    mounted() {
        axios.get('/api/user', {
            headers: {
                Authorization: 'Bearer ' + localStorage.getItem('access_token')
            }
        }).then((res) => {
            this.user = res.data
        })
    }
}
</script>
