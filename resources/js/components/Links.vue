<template>
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Id
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Original Link
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Slug
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Short Link
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Visits counter
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Created At
                    </th>
                    <th scope="col" class="relative px-6 py-3">
                        <router-link :to="{name: 'AddLinkPage'}" class="btn bg-blue-800 hover:bg-blue-300 text-white font-semibold py-2 px-4 border border-gray-400 rounded shadow">Add New</router-link>
                    </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr v-for="link in links" :key="link.id">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-500">{{link.id}}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900 couponcode">
                                        {{link.original_link.substring(0,50)}}....
                                        <span class="coupontooltip">{{link.original_link}}</span>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-500">{{link.slug}}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-500">
                                <a @click="linkEnter(link.id)" :href="link.original_link" target="_blank">{{link.short_link}}</a>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{link.visits_counter}}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{timeFormat(link.created_at)}}
                        </td>
                         <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <router-link :to="{name: 'LinkStatisticsPage', params: {id: link.id}, props: {test:'test'}}" class="btn bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Statistics</router-link>
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
import moment from 'moment';

export default {
    data() {
        return {
           links: [],
        }
    },
    methods: {
        linkEnter(id) {
            axios.get('/api/links/' + id).then((res) => {
                window.location.reload();
            })
        },
        timeFormat(time) {
            return moment(time).format('MM/DD/YYYY hh:mm');
        }
    },
    mounted() {
        axios.get('/api/links').then((res) => {
            this.links = res.data.filter(link => link.user_id == localStorage.getItem('user'))
        })
    }
}
</script>

<style scoped>
.couponcode:hover .coupontooltip {
  display: block;
}

.coupontooltip {
  display: none;
  background-color:black;
  color: white;
  margin-left: 28px;
  margin-top: 20px;
  padding: 10px;
  position: absolute;
  z-index: 1000;
  width: auto;
  height: auto;
}
</style>