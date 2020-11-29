<template>
<div class="v_sidebar">
	<div class="v_sidebar-container">
		<div class="v_sidebar-group">
			1. Отчеты
		</div>
		<div
		 class="v_sidebar-link"
		 @click="$emit('input', 'operations-chart')"
		 :class="{active: value === 'operations-chart'}"
		>
			1.1. Книга учета операций
		</div>
		<div class="v_sidebar-group">
			2. Регистры
		</div>
		<div
		 class="v_sidebar-link"
		 @click="$emit('input', 'accounts-chart')"
		 :class="{active: value === 'accounts-chart'}"
		>
			2.1 Расписание счетов
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
.v_sidebar {
	flex-grow: 0;
	flex-shrink: 0;
	width: 260px;

	&-container {
		position: fixed;
		top: 0;
		left: 0;
		bottom: 0;
		width: 260px;
		padding: 16px;
		border-right: 1px solid #e0e0e0;
	}

	&-link, &-group {
		padding: 8px 16px;
		margin: 0 -16px;
		line-height: 1.6rem;
	}

	&-group {
		padding-top: 32px;
		color: #505050;
	}

	&-link {
		&.active {
			font-weight: 600;
			background-color: #A8C9FF;
		}
	}
}
</style>