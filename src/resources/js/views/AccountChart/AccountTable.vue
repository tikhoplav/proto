<template>
<table class="account-table">
    <thead>
        <tr>
			<th></th>
            <th>id</th>
            <th>Наименование счета</th>
            <th>Описание</th>
        </tr>
    </thead>

    <tbody>
        <account-row
            v-for="(account, i) in accounts"
            :key="account.id"
            :account="account"
			@updated="hydrate(i, $event)"
        />
    </tbody>
</table>
</template>

<script>
import AccountRow from './AccountRow';

export default {
	name: 'AccountTable',
	components: {
		AccountRow,
	},
	data: () => ({
		accounts: [],
	}),
	methods: {
		async fetch() {
			const { data } = await this.$http.get('account');
			this.accounts = data;
		},
		hydrate(i, account) {
			this.accounts.splice(i, 1, account);
		}
	},
	created() {
		this.fetch();
	},
};
</script>

<style lang="scss">
.account-table {
	& tr {
		& td:nth-child(1), & th:nth-child(1) {
			width: 3.8rem;
		}

		& td:nth-child(2), & th:nth-child(2) {
			width: 1.2rem;
		}
	}
}
</style>