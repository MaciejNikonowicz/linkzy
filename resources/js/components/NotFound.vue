<template>
    <div class="absolute inset-0 bg-gray-200 flex items-center justify-center">
        <div class="text-3xl text-center">Page Not Found! <br>404 ERROR<br><br>
            <router-link router-link :to="{ name: 'HomePage' }" class="mt-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                Home Page
            </router-link>
        </div>
    </div>
</template>

<script>
export default {

}
</script>
