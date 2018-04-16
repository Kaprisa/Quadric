<template>
    <div v-html="props.text">
    </div>
</template>

<script>
    export default {
        name: 'v-text',
        props: {
            props: Object
        }
    }
</script>