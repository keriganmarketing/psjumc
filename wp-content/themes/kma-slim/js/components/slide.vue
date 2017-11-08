<template>
    <div :id=" 'slide-' + id " :class="['slide',{ 'active' :isActive }]" :style="{ 'background-image': 'url(' + image + ')', 'z-index': zindex }">
        <slot></slot>
    </div>
</template>

<script>
    export default {

        props: {
            active: { default: false },
            image: { required: true },
            id: { type: Number }
        },

        data(){
            return {
                isActive: false
            };
        },

        created(){
            if(this.active === true){ this.isActive = true }
        },

        computed: {
            zindex: function(){
                return (this.active === true ? 20 - this.id : 0);
            }
        }

    }
</script>