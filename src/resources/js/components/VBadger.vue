<template>
<div class="v-badger">
    <slot />
</div>
</template>

<script>
export default {
    name: 'VBadger',
};
</script>

<style lang="scss">
.v-badger {
    margin: -.5rem -.4rem;
    display: flex;
    flex-flow: row wrap;

    & .v-badge {
        margin-top: .1rem;
        margin-bottom: .1rem;
    }
}
</style>