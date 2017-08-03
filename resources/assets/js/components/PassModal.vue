<template>
    <div class="modal is-active" v-show="showModal" >
        <div class="modal-background"></div>
        <div class="modal-content">
            Test Stuff
        </div>
        <button class="modal-close is-large"></button>
    </div>
</template>

<script>
    export default {
        props: {
            active: { default: false }
        },
        data() {
            return {
                showModal: this.active
            }
        },
        methods: {
            toggleModal(){
                this.showModal = !this.showModal;
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        created: function() {
            this.$on('toggleModal', function(value){
                toggleModal();
            });
        }
    }
</script>
