<template>
    <div class="modal is-active" v-if="this.$parent.activeModal === 'passOn'" >
        <div class="modal-background"></div>
        <div class="modal-content box">
            Test Stuff
        </div>
        <button class="modal-close is-large" @click="toggleModal"></button>
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
                if(this.$parent.activeModal !== ''){
                    this.$parent.activeModal = ''
                }
            }
        },
        mounted() {
            console.log('Component mounted.');

            this.$parent.$on('toggleModal', function (modal) {
                this.activeModal = modal;
            });

        }
    }
</script>
