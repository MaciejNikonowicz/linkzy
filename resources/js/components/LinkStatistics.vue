<template>
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                    <th scope="col" class="px-6 py-5 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Id
                    </th>
                    <th scope="col" class="px-6 py-5 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Visit Date
                    </th>
                    <th scope="col" class="px-6 py-5 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Visit IP
                    </th>
                    <th scope="col" class="px-6 py-5 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Visit Referer
                    </th>
                    <th scope="col" class="relative px-6 py-5">
                        <router-link :to="{name: 'DashboardPage'}" class="btn bg-blue-800 hover:bg-blue-300 text-white font-semibold py-2 px-4 border border-gray-400 rounded shadow">Back</router-link>
                    </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr v-for="stat in link_stats" :key="stat.id">
                        <td class="px-6 py-5 whitespace-nowrap">
                            <div class="text-sm text-gray-500">{{stat.id}}</div>
                        </td>
                        <td class="px-6 py-5 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">
                                    {{stat.visit_date}}
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-5 whitespace-nowrap">
                            <div class="text-sm text-gray-500">{{stat.visit_ip}}</div>
                        </td>
                        <td class="px-6 py-5 whitespace-nowrap">
                            <div class="text-sm text-gray-500">
                                {{stat.visit_referer}}
                            </div>
                        </td>
                    </tr>
                </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        isLoggedIn: Boolean
    },
    data() {
        return {
            link_stats: [],
            id: null
        }
    },
    created() {
        if (!this.isLoggedIn) {
            this.$router.push({ path: "/login"}); 
        }
        this.id = this.$route.params.id;
    },
    mounted() {
        axios.get('/api/links/' + this.id + '/statistics').then((res) => {
            this.link_stats = res.data;
        })
    }
}
</script>