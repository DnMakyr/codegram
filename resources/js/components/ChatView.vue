<template>
    <div class="col-3">
        <div class="card">
            <div class="card-body">
                <div
                    v-for="conversation in conversations"
                    :key="conversation.id"
                >
                    <p>{{ conversation.id }}</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ["conversations"],
    data() {
        return {
           
        };
    },
};
</script>
