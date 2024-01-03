<script setup>
import { ref } from "vue";
import Input from '../../Components/TextInput.vue'
const props = defineProps(["room"]);
const emit = defineEmits(['messageSent'])

const message = ref("");

function sendMessage() {
    // validation goes here
    if (
        message.value == "" ||
        message.value == undefined ||
        message.value == null
    ) {
        return;
    }
    let payload = {
        message: message.value,
        chat_room_id: props.room.id,
    };
    axios
        .post(`chat/room/${props.room.id}/message`, payload)
        .then((response) => {
            if(response.status == 201) {
                message.value = ''
                emit('messageSent')
            }
        })
        .catch((error) => {
            console.log(error);
        });
}
</script>

<template>
    <div class="relative h-10 m-1">
        <div style="border-top: 1px solid #a6a6a6" class="grid grid-cols-6 align-center">
            <input
                class="col-span-5 border-none focus:none focus:ring-indigo-500 rounded-md shadow-sm"
                type="text"
                v-model="message"
                placeholder="Diga algo..."
                @keyup.enter="sendMessage"
            />
            <button
                @click="sendMessage"
                class="place-self-end bg-gray-500 hover:bg-blue-700 p-1 mt-1 rounded text-white"
            >
                Enviar
            </button>
        </div>
    </div>
</template>
<style scoped>

</style>
