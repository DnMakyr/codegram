<template>
    <div class="col-3">
        <div class="card">
            <div class="card-body">
                <div v-for="conversation in conservations" :key="conversation.id">
                    <p>{{ conversation.user.name }}</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            conservations: [],
        };
    },
};
</script>