<template>
    <div class="main-wrapper">
        <h1>
            I am an example vue component!
        </h1>
        <div>
            <p>
                Input sample value here:
                <input type="text" v-model="sampleValue">
            </p>
        </div>
        <div class="">
            <p>
                Sample value is: <span v-text="sampleValue" style="font-weight: bold;"></span>
            </p>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            sampleValue: 0,
        }
    },
    mounted() {
        console.log('Example component is mounted!');
    }
}
</script>
