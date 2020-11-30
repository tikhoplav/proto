<template>
<v-row class="create-transaction" :class="mods">
    <v-col fixed></v-col>
    <v-col fixed></v-col>
    <v-col fixed>
        <v-input
          v-model="trans.dr"
          @change="dirty = true"
          :disabled="loading"
        />
    </v-col>
    <v-col fixed>
        <v-input
          v-model="trans.cr"
          @change="dirty = true"
          :disabled="loading"
        />
    </v-col>
    <v-col fixed>
        <v-input
          v-model="trans.amount"
          @change="dirty = true"
          :disabled="loading"
        />
    </v-col>
    <v-col>
        <v-input
          v-model="trans.description"
          @change="attempt"
          :disabled="loading"
        />
    </v-col>
</v-row>
</template>

<script>
export default {
    name: 'CreateTransaction',
    data: () => ({
        trans: {
            dr: null,
            cr: null,
            amount: null,
            description: null,
        },        
        dirty: false,
        loading: false,
    }),
    computed: {
        mods() {
            return {
                dirty: this.dirty,
                loading: this.loading,
            };
        },
    },
    methods: {
        attempt() {
            this.loading = true;

            this.$http.post('operations/transaction', this.trans)
            .then(({status}) => {
                if (status === 200) {
                    this.$emit('created');
                    this.trans = {
                        dr: null,
                        cr: null,
                        amount: null,
                        description: null,
                    };
                    this.dirty = false;
                }
            })
            .catch(error => {
                console.error(error);
            })
            .finally(() => {
                this.loading = false;
            })
        }
    },
}
</script>

<style lang="scss">
.create-transaction {
    &.dirty {
        outline: solid #a8c9ff;
    }
    
    & .v-col {
        padding: 0 !important;
    }
}
</style>