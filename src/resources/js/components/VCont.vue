<template>
<div class="v-cont">
    <slot />
</div>
</template>

<script>
export default {
    name: 'VCont',
};
</script>

<style lang="scss">
.v-cont {
    width: 100%;
	padding-left: 1.2rem;
	padding-right: 1.2rem;
	margin-right: auto;
	margin-left: auto;
}
</style>