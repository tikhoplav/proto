<template>
<table class="v-table" :class="mods">
    <thead>
        <slot name="head"/>
    </thead>
    <tbody>
        <slot />
    </tbody>    
</table>
</template>

<script>
export default {
    name: 'VTable',
    props: {
        clickable: Boolean,
    },
    computed: {
        mods() {
            return {
                clickable: this.clickable,
            };
        },
    },
};
</script>

<style lang="scss">
.v-table {
    $border: 1px solid #e0e0e0;

    width: 100%;
    text-align: left;
    border-collapse: collapse;

    & thead {
        border-top: $border;
    }

    & td, & th {
        padding: .6rem;
        border-right: $border;
        border-bottom: $border;
    }

    &.clickable {
        & tbody tr:hover {
            background-color: #d5e5ff;
            cursor: pointer;
        }
    }
}
</style>