<template>
    <div class="video-wrapper">
        <iframe :src="'https://player.vimeo.com/video/' + this.vimeoCode + '?autoplay=1&portrait=0'" width="1024" height="768" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
    </div>
</template>

<script>
    export default {
        props: {
            vimeoCode: false
        }
    }
</script>