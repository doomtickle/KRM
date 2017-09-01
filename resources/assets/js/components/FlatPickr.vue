<template>
  <div>
    <flat-pickr v-model="date" name="due_date"></flat-pickr>
  </div>
</template>

<script>
  import flatPickr from 'vue-flatpickr-component';
  export default {
    data () {
      return {
        date: null,
      }
    },
    components: {
      flatPickr
    }
  }
</script>
