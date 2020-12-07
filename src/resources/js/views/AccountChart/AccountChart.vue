<template>
<div class="account-chart">
	<v-pop
	  v-if="false"
	  @blur="selected = null"
	  darken
	>
		<account-view
		  :id="selected"
		  @close="selected = null"
		/>
	</v-pop>

	<account-table
		@select="selected = $event"
	/>
</div>
</template>

<script>
import AccountTable from "./AccountTable";
import AccountView from "./AccountView";

export default {
	name: 'AccountChart',
	components: {
		AccountTable,
		AccountView,
	},
	data: () => ({
		selected: null,
	}),
}
</script>