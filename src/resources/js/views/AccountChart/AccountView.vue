<template>
<div class="account-view">
    <v-row>
        <v-col>
            <h3>
                {{ account ? account.id : '' }}
                {{ account ? account.name : '' }}
            </h3>
        </v-col>
    </v-row>

    <v-row>
        <v-col>
            Описание счета:
        </v-col>
        <v-col>
            {{ account ? account.desc : '' }}
        </v-col>
    </v-row>

</div>
</template>

<script>
export default {
    name: 'AccountView',
    props: {
        id: String,
    },
    data: () => ({
        isLoading: false,
        account: null,
    }),
    watch: {
        id: function (value) {
            this.fetch();
        },
    },
    methods: {
        async fetch() {
            this.isLoading = true;
            const { data } = await this.$http.get(`account/${this.id}`);
            this.account = data;
            this.isLoading = false;
        },
    },
    mounted() {
        this.fetch();
    }
}
</script>

<style lang="scss">
.account-view {
    width: 36rem;
}
</style>