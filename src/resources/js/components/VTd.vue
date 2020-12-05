<template>
<td class="v-td" :class="mods">
    <slot />
</td>
</template>

<script>
export default {
    name: 'VTd',
    props: {
        num: Boolean,
    },
    computed: {
        mods() {
            return [
                {
                    num: this.num,
                },
            ];  
        },
    },
};
</script>

<style lang="scss">
.v-td {
    text-align: left;
    width: fit-content;

    &.num {
        text-align: right;
    }
}
</style>