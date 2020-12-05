<template>
<th class="v-th">
    <slot />
</th>
</template>

<script>
export default {
    name: 'VTh',
};
</script>

<style lang="scss">
.v-th {
    text-align: left;
    font-weight: bold;
}
</style>