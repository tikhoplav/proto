<template>
<table class="table">
	<tr class="table-headers">
		<th class="table-header">№</th>
		<th class="table-header">Наименование счета</th>
	</tr>
	<tr class="table-row" v-for="row in rows" :key="row.id">
		<td class="table-cell">{{ row.id }}</td>
		<td class="table-cell">{{ row.name }}</td>
	</tr>
</table>
</template>

<script>
export default {
	name: 'AccountsChart',
	data: () => ({
		rows: [],
	}),
	methods: {
		async fetch() {
			const { data } = await this.$http.get('/registries/accounts');
			const reducer = (acc, { accounts }) => [...acc, ...accounts];
			this.rows = data.reduce(reducer, []);
		},
	},
	mounted() {
		this.fetch();
	},
};
</script>