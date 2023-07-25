<script setup>
import { ref } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import MessageContainer from "./MessageContainer.vue";
import InputMessage from "./InputMessage.vue";
import ChatRoomSelection from "./ChatRoomSelection.vue";
// import { IRoom } from './interfaces/interfaces';

const rooms = ref([]);
// const rooms = ref<IRoom>([])
const currentRoom = ref([]);
const messages = ref([]);

function getRoom() {
    axios
        .get("/chat/rooms")
        .then((response) => {
            rooms.value = response.data;
            setRoom(response.data[0]);
        })
        .catch((error) => {
            console.log(error);
        });
}
function setRoom(room) {
    currentRoom.value = room;
    getMessages();
}

function getMessages() {
    axios
        .get(`chat/room/${currentRoom.value.id}/messages`)
        .then((response) => {
            messages.value = response.data;
        })
        .catch((error) => {
            console.log(error);
        });
}

getRoom();
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <ChatRoomSelection
                    v-if="currentRoom.id"
                    :rooms="rooms"
                    :current-room="currentRoom"
                    @room-changed="setRoom($event)"
                />
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <MessageContainer :messages="messages" />
                    <InputMessage
                        :room="currentRoom"
                        @message-sent="getMessages"
                    />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
