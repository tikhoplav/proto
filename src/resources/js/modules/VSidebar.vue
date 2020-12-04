<template>
<div class="v-sidebar">
	<div class="v-sidebar-container">
		<h2 class="v-sidebar-header">Bookkeeper</h2>
		<div class="v-sidebar-group">
			1. Отчеты
		</div>
		<div
		 class="v-sidebar-link"
		 @click="$emit('input', 'turnover-trial-balance')"
		 :class="{active: value === 'turnover-trial-balance'}"
		>
			1.1. Оборотно-сальдовая ведомость
		</div>
		<div
		 class="v-sidebar-link"
		 @click="$emit('input', 'operations-chart')"
		 :class="{active: value === 'operations-chart'}"
		>
			1.2. Книга учета операций
		</div>
		<div class="v-sidebar-group">
			2. Регистры
		</div>
		<div
		 class="v-sidebar-link"
		 @click="$emit('input', 'accounts-chart')"
		 :class="{active: value === 'accounts-chart'}"
		>
			2.1 План счетов
		</div>
		<div
		 class="v-sidebar-link"
		 @click="$emit('input', 'people-chart')"
		 :class="{active: value === 'people-chart'}"
		>
			2.2 Физ. лица
		</div>
	</div>
</div>
</template>

<script>
export default {
	name: 'VSidebar',
	props: ['value'],
};
</script>

<style lang="scss">
.v-sidebar {
	flex-grow: 0;
	flex-shrink: 0;
	width: 260px;

	&-container {
		position: fixed;
		top: 0;
		left: 0;
		bottom: 0;
		width: 260px;
		padding: 1.6rem;
		border-right: 1px solid #e0e0e0;
	}

	&-header {
		border-bottom: 1px solid #e0e0e0;
		padding-bottom: 1.6rem;
		margin: 0;
		line-height: 2.4rem;
	}

	&-link, &-group {
		padding: .8rem 1.6rem;
		margin: 0 -1.6rem;
		line-height: 1.6rem;
	}

	&-group {
		padding-top: 3.2rem;
		color: #505050;
	}

	&-link {
		cursor: pointer;

		&:hover {
			background-color: #d5e5ff;
		}

		&.active {
			font-weight: 600;
			background-color: #A8C9FF;
		}
	}
}
</style>