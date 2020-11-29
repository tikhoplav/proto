<template>
	<div class="container">
		<div class="row">
			<div class="col" style="width:fit-content;">
				<div class="row">
					<v-sidebar v-model="path"/>
				</div>
			</div>
			<div class="col">
				<div class="row">
					<keep-alive>
						<component :is="path" />
					</keep-alive>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
import VSidebar from "./modules/VSidebar.vue";
import AccountsChart from "./views/AccountsChart.vue";
import OperationsChart from "./views/OperationsChart.vue";

export default {
	name: 'App',
	components: {
		VSidebar,
		AccountsChart,
		OperationsChart,
	},
	data: () => ({
		path: "accounts-chart",
	}),
	mounted() {
		window.axios = this.$http;
	},
};
</script>