<template>
<div class="v-badge">
    <slot />
</div>
</template>

<script>
export default {
    name: 'VBadge',
};
</script>

<style lang="scss">
.v-badge {
    margin: -.4rem .2rem;
    padding: .4rem;
    display: inline-block;
    background-color: #ffffff;
    border-radius: .4rem;
    width: fit-content;
    box-shadow: 0px 0px 0px 1px #e0e0e0;
}
</style>