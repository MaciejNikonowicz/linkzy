<template>
    <div class="flex flex-wrap w-full justify-center items-center pt-56">
        <div class="flex flex-wrap max-w-xl">
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
            errors: []
        }
    },
    methods:{
        async shortenLink(){
            const response = await axios.post('/api/auth/links/', this.form, {
                headers: {
                    Authorization: 'Bearer ' + localStorage.getItem('access_token')
                }
        }).then((res) =>{
                console.log(res);
                this.$router.push({ name: "DashboardPage"}); 
             }).catch((error) =>{
                 console.log("ERRRR:: ",error.response.data);
                this.errors = error.response.data.errors;
            })
         }
    }
}
</script>