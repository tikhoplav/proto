<template>
<v-table class="operations" clickable>
	<template v-slot:head>
		<v-th>№</v-th>
		<v-th>Время/Дата</v-th>
		<v-th>Дебит</v-th>
		<v-th>Кредит</v-th>
		<v-th>Сумма</v-th>
		<v-th>Примечание</v-th>
		<v-th>Субконто</v-th>
	</template>

	<v-tr v-for="row in rows" :key="row.id">
		<v-td>{{ row.id }}</v-td>
		<v-td>{{ row.created_at }}</v-td>
		<v-td>{{ row.dr }}</v-td>
		<v-td>{{ row.cr }}</v-td>
		<v-td num>{{ row.amount }}</v-td>
		<v-td><v-elli>{{ row.description }}</v-elli></v-td>
		<v-td>
			<v-badger>
				<v-badge v-for="sub in row.subconto" :key="sub.uid">
					{{ sub.uid }}
				</v-badge>
			</v-badger>
		</v-td>
	</v-tr>
</v-table>
</template>

<script>
import VBadge from '../components/VBadge.vue';

export default {
	name: 'OperationsChart',
	components: {
		VBadge,
	},
	data: () => ({
		rows: [],
	}),
	methods: {
		async fetch() {
			const { data } = await this.$http.get('registries/operations');
			this.rows = data;
		},
	},
	mounted() {
		this.fetch();
	},
};
</script>