<template>
<div class="v-col" :class="mods">
    <slot />
</div>
</template>

<script>
export default {
    name: 'VCol',
    props: {
        wrap: Boolean,
        fixed: Boolean,
    },
    computed: {
        mods() {
            return {
                wrap: this.wrap,
                fixed: this.fixed,
            };
        },
    },
};
</script>

<style lang="scss">
.v-col {
    display: flex;
	flex-flow: column nowrap;
	padding-left: 1.2rem;
    padding-right: 1.2rem;
    min-width: 0;
    
    &.wrap {
        flex-wrap: wrap;
    }
    &.fixed {
        flex-shrink: 0;
        flex-grow: 0;
    }
}
</style>