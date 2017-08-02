<template>
    <div class="modal is-active">
        <div class="modal-background"></div>
        <div class="modal-content">
            Test Stuff
        </div>
        <button class="modal-close is-large"></button>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                showModal: false
            }
        },
        mounted()
        {
            console.log('Component mounted.')
        }
    }
</script>
