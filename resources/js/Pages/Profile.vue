<template>
    <div class="container">
        <div class="profile">
            <h1>Profile</h1>
            <p>My name is {{ user.username }}</p>
        </div>
    </div>
</template>

<script setup>
defineProps({
    user: {
        type: Object,
    },
})
</script>