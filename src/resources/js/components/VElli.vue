<template>
<span class="v-elli">
    <slot />
</span>
</template>

<script>
export default {
    name: 'VElli',
};
</script>

<style lang="scss">
.v-elli {
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}
</style>