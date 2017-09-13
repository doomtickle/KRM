/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */


require('./bootstrap');

window.Vue = require('vue');
require("sweetalert");

import flatPickr from 'vue-flatpickr-component';

const flatpickr = require("flatpickr");

import PassModal from './components/PassModal.vue';
import AddNote from './components/AddNote.vue';
import FlatPickr from './components/FlatPickr.vue';
import BulmaSelect from './components/Select.vue';

const app = new Vue({
    el: '#app',

    components: {
        'passmodal': PassModal,
        'addnote': AddNote,
        'flatPickr': FlatPickr,
        'v-select': BulmaSelect
    },

    data: {
        activeModal: ''
    },

    methods: {
        getTaskId() {
            return window.location.href.split('/').pop()
        }
    }

});


flatpickr(".open-calendar", {
    altInput: true,
    allowInput: true,
    enableTime: false,
    inline:true
});

