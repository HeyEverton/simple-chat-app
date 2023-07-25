<template>
    <!-- <div>
        <div class="container">
            <div class="border1"></div>
            <div class="border2"></div>
            <div class="border3"></div>
        </div>
    </div> -->
    <svg viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M11.395 44.428C4.557 40.198 0 32.632 0 24 0 10.745 10.745 0 24 0a23.891 23.891 0 0113.997 4.502c-.2 17.907-11.097 33.245-26.602 39.926z" fill="#6875F5" />
        <path d="M14.134 45.885A23.914 23.914 0 0024 48c13.255 0 24-10.745 24-24 0-3.516-.756-6.856-2.115-9.866-4.659 15.143-16.608 27.092-31.75 31.751z" fill="#6875F5" />
    </svg>
</template>

<style scoped>
.container {
    --size: 200px;
    color: rgb(239, 243, 244);
    position: relative;
    width: var(--size);
    height: var(--size);
}

.container * {
    position: absolute;
    border-style: solid;
}
.border1 {
    border-width: 13.5px;
    top: 0;
    left: calc(50% - 29px);
    width: 56px;
    transform: skew(35deg);
    height: 200px;
}

.border2,
.border3 {
    width: 0;
    border-width: 4px;
    height: 90px;
    transform: skew(-41deg);
    background-color: currentColor;
}

.border2 {
    top: 0;
    left: calc(50% + 37px);
    border-bottom-left-radius: 20px;
}
.border3 {
    left: calc(50% - 61px);
    bottom: 0;
    border-top-left-radius: 8px;
}
.small {
    --size: 10px
}
</style>
