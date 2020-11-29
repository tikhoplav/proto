<template>
<table class="table">
	<tr class="table-headers">
		<th class="table-header">№</th>
		<th class="table-header">Время/Дата</th>
		<th class="table-header">Дебет</th>
		<th class="table-header">Кредит</th>
		<th class="table-header">Сумма</th>
		<th class="table-header">Примечание</th>
	</tr>
	<tr class="table-row" v-for="row in rows" :key="row.id">
		<td class="table-cell">{{ row.id }}</td>
		<td class="table-cell">{{ row.created_at }}</td>
		<td class="table-cell">{{ row.dr }}</td>
		<td class="table-cell">{{ row.cr }}</td>
		<td class="table-cell">{{ row.amount }}</td>
		<td class="table-cell">{{ row.description }}</td>
	</tr>
</table>
</template>

<script>
export default {
	name: 'OperationsChart',
	data: () => ({
		rows: [],
	}),
	methods: {
		async fetch() {
			const { data } = await this.$http.get('/registries/operations');
			this.rows = data;
		},
	},
	mounted() {
		this.fetch();
	},
};
</script>