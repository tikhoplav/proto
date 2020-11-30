<template>
	<v-cont class="app">
		<v-row>
			<v-col fixed class="app-sidebar">
				<v-row>
					<v-sidebar v-model="path"/>
				</v-row>
			</v-col>
			<v-col class="app-content">
				<v-row>
					<keep-alive>
						<component :is="path" />
					</keep-alive>
				</v-row>
			</v-col>
		</v-row>
	</v-cont>
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
		path: "operations-chart",
	}),
	mounted() {
		window.axios = this.$http;
	},
};
</script>

<style lang="scss">
@import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');

html {
	font-size: 12px;
}

body {
	margin: 0;
	padding: 0;
	line-height: 1rem;
}

.app {
	min-height: 100vh;
	overflow-x: hidden;

	&, & * {
		box-sizing: border-box;
		font-family: 'Roboto', sans-serif;
	}

	&-sidebar {
		width: fit-content;
	}

	&-content {
		width: 100%;
	}
}
</style>