<template>
   <div>
        Dashboard <br>
        <hr>
        <Links></Links>
        <div v-if="user">
            <button @click.prevent="logout">Logout</button>
        </div>

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
    methods:{
        logout(){
            const config = {
                headers: { Authorization: `Bearer ${localStorage.getItem('access_token')}` }
            };
            const bodyParameters = {
                key: ""
            };
            axios.post('/api/auth/logout', bodyParameters, config).then(()=>{
                localStorage.removeItem('access_token');
                localStorage.removeItem('token_type');
                localStorage.removeItem('user');
                this.$router.push({ name: "LoginPage"})
            }).catch((error) =>{
                 console.log("ERRRR:: ",error.response.data);
            })
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
