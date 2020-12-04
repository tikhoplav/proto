<template>
<v-table class="people" clickable>
    <template v-slot:header>
        <v-col fixed>id</v-col>
        <v-col fixed>created</v-col>
        <v-col>name</v-col>
        <v-col fixed>gender</v-col>
        <v-col fixed>birthday</v-col>
    </template>

    <v-row v-for="row in rows" :key="row.id">
        <v-col fixed>{{ row.id }}</v-col>
        <v-col fixed>{{ row.created_at }}</v-col>
        <v-col>{{ row.full_name }}</v-col>
        <v-col fixed>{{ row.gender }}</v-col>
        <v-col fixed>{{ row.birthday }}</v-col>
    </v-row>
</v-table>
</template>

<script>
export default {
    name: 'PeopleChart',
    data: () => ({
        rows: [],
    }),
    methods: {
		async fetch() {
			const { data } = await this.$http.get('person');
			this.rows = data;
		},
	},
	mounted() {
		this.fetch();
	},
}
</script>

<style lang="scss">
.people {
    & .v-row .v-col {
		&:nth-child(1) {
			flex-basis: 3.2rem;
		}

        &:nth-child(2) {
			flex-basis: 9.6rem;
		}

		&:nth-child(3) {
			flex-basis: 100%;
		}

		&:nth-child(4), &:nth-child(5) {
			flex-basis: 6.8rem;
		}
	}
}
</style>