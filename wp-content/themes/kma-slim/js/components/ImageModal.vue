<template>
    <div class="image-wrapper">
        <img :src="this.imageUrl" />
    </div>
</template>

<script>
    export default {
        props: {
            imageUrl: ''
        }
    }
</script>