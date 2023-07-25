<script setup>
import { ref } from "vue";
const props = defineProps(["rooms", "currentRoom"]);
const emit = defineEmits(["roomChanged"]);
const selected = ref("");
selected.value = props.currentRoom;
</script>

<template>
    <div>
        <div class="grid grid-cols-2">
            <div class="font-bold text-xl" v-if="selected">
                {{ selected.name }} Chat
            </div>
            <div>
                <select
                    @change="$emit('roomChanged', selected)"
                    class="float-right"
                    v-model="selected"
                >
                    <option
                        v-for="(room, index) of props.rooms"
                        :key="index"
                        :value="room"
                    >
                        {{ room.name }}
                    </option>
                </select>
            </div>
        </div>
    </div>
</template>
