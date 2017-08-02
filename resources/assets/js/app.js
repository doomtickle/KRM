/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */


require('./bootstrap');

window.Vue = require('vue');
const flatpickr = require("flatpickr");

Vue.component(
    'pass-modal',
    require('./components/PassModal.vue')
);

const app = new Vue({
    el: '#app',

    data: {
        notes: [],
        body: '',
    },

    methods: {
        addNote(userId, clientId, taskId) {
            axios.post('/note', {
                user_id: userId,
                client_id: clientId,
                task_id: taskId,
                body: this.body
            })
                .then(response => {
                    this.notes.push(response.data);
                    this.body = '';
                })
        },
        getTaskId() {
            var url = window.location.href.split('/');
            return url.pop();
        }
    },
    mounted() {
        axios.get('/task/' + this.getTaskId() + '/notes/').then(response => this.notes = response.data);
    }
});


flatpickr(".open-calendar", {
    altInput: true,
    allowInput: true,
    enableTime: true,
    inline:true
});
