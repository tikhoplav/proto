<template>
<v-table class="operations">
	<template v-slot:header>
		<v-col fixed>№</v-col>
		<v-col fixed>Время/Дата</v-col>
		<v-col fixed>Дебит</v-col>
		<v-col fixed>Кредит</v-col>
		<v-col fixed>Сумма</v-col>
		<v-col>Примечание</v-col>
	</template>

	<v-row v-for="row in rows" :key="row.id">
		<v-col fixed>{{ row.id }}</v-col>
		<v-col fixed>{{ row.created_at }}</v-col>
		<v-col fixed>{{ row.dr }}</v-col>
		<v-col fixed>{{ row.cr }}</v-col>
		<v-col fixed>{{ row.amount }}</v-col>
		<v-col>{{ row.description }}</v-col>
	</v-row>

	<create-transaction @created="fetch"/>
</v-table>
</template>

<script>
import CreateTransaction from "../modules/CreateTransaction.vue";

export default {
	name: 'OperationsChart',
	components: {
		CreateTransaction,
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

<style lang="scss">
.operations {
	& .v-row .v-col {
		&:nth-child(1) {
			flex-basis: 3.2rem;
		}

		&:nth-child(2) {
			flex-basis: 10rem;
		}

		&:nth-child(3), &:nth-child(4) {
			flex-basis: 5.2rem;
		}

		&:nth-child(5) {
			flex-basis: 6.4rem;
		}

		&:nth-child(6) {
			flex-basis: 100%;
		}
	}
}
</style>