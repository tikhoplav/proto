<template>
<div class="v-table" :class="mods">
    <v-row class="v-header">
        <slot name="header"></slot>
    </v-row>
    
    <slot></slot>
</div>
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
    padding-left: 1.2rem;
    padding-right: 1.2rem;
    border-top: $border;
    border-left: $border;
    text-align: left;

    & .v-header {
        font-weight: 500;
    }

    & .v-col {
        padding: .6rem;
        border-right: $border;
        border-bottom: $border;
    }

    &.clickable {
        & .v-row:not(.v-header):hover {
            background-color: #d5e5ff;
            cursor: pointer;
        }
    }
}
</style>