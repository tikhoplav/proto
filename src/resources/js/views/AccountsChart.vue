<template>
<v-table class="accounts" clickable>
	<template v-slot:header>
		<v-col fixed>№</v-col>
		<v-col>Наименование счета</v-col>
	</template>

	<v-row v-for="row in rows" :key="row.id">
		<v-col fixed>{{ row.id }}</v-col>
		<v-col>{{ row.name }}</v-col>
	</v-row>
	
</v-table>
</template>

<script>
export default {
	name: 'AccountsChart',
	data: () => ({
		rows: [],
	}),
	methods: {
		async fetch() {
			const { data } = await this.$http.get('registries/accounts');
			const reducer = (acc, { accounts }) => [...acc, ...accounts];
			this.rows = data.reduce(reducer, []);
		},
	},
	mounted() {
		this.fetch();
	},
};
</script>

<style lang="scss">
.accounts {
	& .v-row .v-col {
		&:nth-child(1) {
			flex-basis: 3.2rem;
		}

		&:nth-child(2) {
			flex-basis: 100%;
		}
	}
}
</style>