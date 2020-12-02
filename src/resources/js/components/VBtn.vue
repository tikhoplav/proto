<template>
<div class="v-btn"
 @click="$emit('click')"
>
    <slot />
</div>
</template>

<script>
export default {
    name: 'VBtn',
};
</script>

<style lang="scss">
.v-btn {
    width: fit-content;
    border-radius: 3px;
    background-color: #A8C9FF;
    cursor: pointer;
    padding: .6rem;
    font-weight: bold;
}
</style>