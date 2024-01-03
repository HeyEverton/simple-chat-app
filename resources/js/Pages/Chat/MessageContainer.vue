<script setup>
import MessageItem from './MessageItem.vue';

const props = defineProps(["messages"]);
</script>
<template>
    <div class="h-96 w-full">
        <div class="h-full p-2 flex flex-col-reverse overflow-scroll">
            <div v-for="(message, index) of messages" :key="index">
                <MessageItem :message="message" />
            </div>
        </div>
    </div>
</template>
