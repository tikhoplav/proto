<template>
<v-table class="people" clickable>
    <template v-slot:head>
        <v-th>id</v-th>
        <v-th>created</v-th>
        <v-th>name</v-th>
        <v-th>gender</v-th>
        <v-th>birthday</v-th>
    </template>

    <v-tr v-for="row in rows" :key="row.id">
        <v-td>{{ row.id }}</v-td>
        <v-td>{{ row.created_at }}</v-td>
        <v-td>{{ row.full_name }}</v-td>
        <v-td>{{ row.gender }}</v-td>
        <v-td>{{ row.birthday }}</v-td>
    </v-tr>
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