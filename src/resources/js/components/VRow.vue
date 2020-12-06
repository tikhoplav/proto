<template>
<div class="v-row" :class="mods">
    <slot />
</div>
</template>

<script>
export default {
    name: 'VRow',
    props: {
        wrap: Boolean,
        align: String,
    },
    computed: {
        mods() {
            return [
                {
                    wrap: this.wrap,
                },
                `align-${this.align}`,
            ];  
        },
    },
};
</script>

<style lang="scss">
.v-row {
    display: flex;
	flex-flow: row nowrap;
	margin-left: -1.2rem;
    margin-right: -1.2rem;
    
    &.wrap {
        flex-wrap: wrap;
    }
    &.align-center {
        align-items: center;
    }
}
</style>