<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
defineProps({
    user: {
        type: Object,
        required: true,
    },
})
</script>

<template>
    <Head :title="$page.props.auth.user.name" />
    <AuthenticatedLayout>
    <div class="container pt-4" style="padding-left: 150px; padding-right: 110px">
        <div class="row">
            <!-- <div class="col-3 p-5">
                <img src="" alt="" class="w-100 rounded-circle"
                    style="max-width: 150px; max-height: 150px; object-fit: cover">
            </div> -->
            <div class="col-9 pt-5">
                <div class="flex justify-content-between align-baseline"></div>
            </div>
        </div>
    </div>
    </AuthenticatedLayout>
</template>