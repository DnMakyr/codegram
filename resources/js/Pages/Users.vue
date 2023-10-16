<template>
    <Layout>
        <h1 class="mt-4">
            <b>Users</b>
        </h1>
        <p style="margin-top: 600px">The current time is {{ time }}.</p>
        <Link href="users" class="text-blue-500" preserve-scroll>Refresh</Link>
    </Layout>
</template>

<script setup>
import Layout from "../Shared/Layout.vue";
import { Link } from "@inertiajs/vue3";
defineProps({
    time: String,
});
</script>
