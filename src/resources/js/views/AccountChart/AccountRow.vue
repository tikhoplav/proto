<template>
<tr class="account-row">
    <td>
        <i-check
            v-if="isDirty"
            @click="update"
        />
        <i-close-box
            v-if="isDirty"
            @click="reset"
        />
    </td>
    <td>{{ item.id }}</td>
    <td><input v-model="item.name"></td>
    <td><input v-model="item.desc"></td>
</tr>
</template>

<script>
export default {
    name: 'AccountRow',
    props: {
        account: Object,
    },
    data: () => ({
        item: {
            id: '',
            name: '',
            desc: '',
        },
    }),
    computed: {
        isDirty: function () {
            return ! Array.from(['name', 'desc']).reduce((res, key) => {
                return res && this.item[key] === this.account[key];
            }, true);
        },
    },
    methods: {
        reset: function () {
            this.item = {...this.account};
        },
        update() {
            this.$http.patch(`account/${this.account.id}`, this.item)
                .then(({ data }) => {
                    this.$emit('updated', data);
                })
                .catch(error => {
                    console.log(error);
                })
        },
    },
    mounted() {
        this.reset();
    },
}
</script>

<style lang="scss">
.account-row {
    &:hover {
        background-color: #bfd3ff;
    }
}
</style>