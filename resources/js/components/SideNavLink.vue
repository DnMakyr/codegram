<script setup>
import { Link } from "@inertiajs/vue3";
defineProps({
    href: {
        type: String,
        required: true,
    },
    src: {
        type: String,
        required: true,
    },
    class: {
        type: String,
        required: false,
    },
    style: {
        type: String,
        required: false,
    },
});
</script>

<template>
    <nav>
        <Link class="items" :href="href">
            <img :src="src" :class="class" :style="style" /> <slot />
        </Link>
    </nav>
</template>

<style scoped>
.items {
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    align-items: center;
    margin-left: 23px;
    margin-top: 10px;
    width: 167px;
    height: 48px;
    padding: 12px;
    background-color: #f8fafc;
    text-align: center;
    font-size: 16px;
}

.items:hover {
    filter: brightness(92%);
    color: rgb(212, 65, 65) !important;
    border-style: initial;
    border-radius: 5px;
    transition: 0.3s;
    transform: scale(1.05);
}
</style>
