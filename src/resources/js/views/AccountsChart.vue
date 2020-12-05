<template>
<v-table class="accounts" clickable>
	<template v-slot:head>
		<v-tr>
			<v-th>№</v-th>
			<v-th>Наименование счета</v-th>
		</v-tr>
	</template>

	<v-tr v-for="row in rows" :key="row.id">
		<v-td>{{ row.id }}</v-td>
		<v-td>{{ row.name }}</v-td>
	</v-tr>
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