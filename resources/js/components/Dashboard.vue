<template>
   <div>
        Dashboard <br>
        <div v-if="user">
        
        Name: {{user.name}} <br>
        Email: {{user.email}}<br><br>
        <button @click.prevent="logout">Logout</button>
        </div>

    </div>
</template>

<script>
export default {
    data() {
        return {
            user: null
        }
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
