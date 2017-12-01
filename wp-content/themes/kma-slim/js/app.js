window.Vue = require('vue');

import message from './components/message.vue';
import modal from './components/modal.vue';
import tabs from './components/tabs.vue';
import tab from './components/tab.vue';
import slider from './components/slider.vue';
import slide from './components/slide.vue';
import GoogleMap from './components/GoogleMap.vue';
import GoogleMapPin from './components/GoogleMapPin.vue';
import VueParallaxJs from 'vue-parallax-js';

window.Vue.use(VueParallaxJs, {
    minWidth: 1000,
});

var app = new Vue({

    el: '#app',

    components: {
        'message': message,
        'modal': modal,
        'tabs': tabs,
        'tab': tab,
        'bulma-slider': slider,
        'bulma-slide': slide,
        'google-map': GoogleMap,
        'pin': GoogleMapPin,
    },

    data: {
        isOpen: false,
        isScrolling: false,
        modalOpen: false,
        modalContent: '',
        scrollPosition: 0,
        footerStuck: false,
        clientHeight: 0,
        windowHeight: 0,
        windowWidth: 0,
        menuItems: []
    },

    methods: {

        toggleMenu(){
            this.isOpen = !this.isOpen;
        },

        handleScroll(){
            this.scrollPosition = window.scrollY;
            this.isScrolling = this.scrollPosition > 0;
        },

        handleMobileSubMenu(){
            this.menuItems.forEach(menuItem => {
                let menuLink = menuItem.querySelector('.mobile-expand');
                menuLink.addEventListener('click', function(e){
                    let menu = menuItem.querySelector('.navbar-dropdown');
                    if(menu.classList.contains('is-open')){
                        menu.classList.remove('is-open');
                    } else {
                        menu.classList.add('is-open');
                    }
                });
            });
        }

    },

    mounted() {
        this.footerStuck = window.innerHeight > this.$root.$el.clientHeight;
        this.clientHeight = this.$root.$el.clientHeight;
        this.windowHeight = window.innerHeight;
        this.windowWidth = window.innerWidth;
        this.handleScroll();
        this.menuItems = this.$el.querySelectorAll('#MobileNavMenu .has-dropdown');
        this.handleMobileSubMenu();
    },

    created() {
        window.addEventListener('scroll', this.handleScroll);
    },

    destroyed() {
        window.removeEventListener('scroll', this.handleScroll);
    }

});

