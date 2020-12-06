<template>
	<keep-alive>
		<component :is="path" />
	</keep-alive>
</template>

<script>
import AccountChart from "./views/AccountChart.vue";

export default {
	name: 'App',
	components: {
		AccountChart,
	},
	data: () => ({
		path: "account-chart",
	}),
};
</script>
