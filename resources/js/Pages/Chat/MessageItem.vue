<script setup>
const props = defineProps(['message'])

</script>
<template>
    <div v-if="message">
        {{ message.user.name }}: {{ message.message }}
    </div>

</template>
