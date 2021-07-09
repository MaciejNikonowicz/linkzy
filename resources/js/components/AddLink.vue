<template>
    <div class="flex flex-wrap w-full justify-center items-center pt-56">
        <div class="flex flex-wrap max-w-xl">
            <div class="p-2 w-full mt-4">
                <router-link v-if="user" :to="{name: 'DashboardPage'}" class="btn bg-blue-800 hover:bg-blue-300 text-white font-semibold py-2 px-4 border border-gray-400 rounded shadow">Back</router-link>
            </div>
            <div class="p-2 text-2xl text-gray-800 font-semibold"><h1>Shorten Link</h1></div>
            <div class="p-2 w-full">
                <label for="original_link">URL</label>
                <input class="w-full bg-gray-100 rounded border border-gray-400 focus:outline-none focus:border-indigo-500 text-base px-4 py-2" placeholder="Original Link" type="url" v-model="form.original_link">
            </div>
            <div class="p-2 w-full">
                <label for="slug">Slug</label>
                <input class="w-full bg-gray-100 rounded border border-gray-400 focus:outline-none focus:border-indigo-500 text-base px-4 py-2" placeholder="Slug" type="text" v-model="form.slug" name="slug">
            </div>
            <div class="p-2 w-full mt-4">
                <button @click.prevent="shortenLink" type="submit" class="flex text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Shorten</button>
            </div>
            <div class="mt-6 border-solid border-4 border-light-blue-500 p-4" v-if="unregistered">
                <p>Your shorten link is: <a class="text-2xl text-blue-800" :href="form.original_link">{{ short_link }}</a></p>
                <p>You can use it for 48h - after then it's going to be deleted!</p>
            </div>
        </div> 
    </div>
</template>

<script>
export default {
    data() {
        return {
            form: {
                original_link: '',
                slug: ''
            },
            errors: [],
            unregistered: false,
            short_link: '',
            user: null
        }
    },
    methods:{
        shortenLink(){
            axios.post('/api/links/', this.form, {
                headers: {
                    Authorization: 'Bearer ' + localStorage.getItem('access_token')
                }
        }).then((res) =>{
            console.log(res);
                if (localStorage.getItem('user')) {
                    this.$router.push({ name: "DashboardPage"}); 
                } else {
                    this.unregistered = true;
                    this.short_link = res.data.data.attributes.short_link
                }
             }).catch((error) =>{
                 console.log("ERRRR:: ",error.response.data);
                this.errors = error.response.data.errors;
            })
         }
    },
    created() {
        this.user = localStorage.getItem('user')
    }
}
</script>