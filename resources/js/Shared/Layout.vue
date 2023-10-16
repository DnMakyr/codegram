<template>
    <section class="p-6 bg-gray-300">
        <header class="flex justify-between">
            <div class="flex flex-row items-center">
                <h1 class="font-bold text-xl">CodeGram Inertia</h1>
                <p class="font-light ml-4">Welcome Back, {{ name }}!!</p>
            </div>

            <Nav />
        </header>
    </section>

    <section class="flex flex-column align-items-center mt-2">
        <slot />
    </section>

    <footer class="mt-6 flex justify-center">Footer</footer>
</template>

<script setup>
import Nav from "./Nav.vue";

defineProps({
    name: String,
});
</script>
