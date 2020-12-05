<template>
<div class="ttb-cont">

<v-cont>
    <h2>Оборотно-сальдовая ведомость</h2>

    <v-row align="center">
        <v-col>
            За период:
        </v-col>
        <v-col>
            <v-input v-model="start_date"/>
        </v-col>
        <v-col>
            <v-input v-model="end_date"/>
        </v-col>
        <v-col>
            <v-btn @click="fetch()">
                Рассчитать
            </v-btn>
        </v-col>
    </v-row>
    
    <v-row style="margin:24px 0;" align="center">
        <v-col>
            <v-input
             :checked="hide_inactive"
             @change="hide_inactive = !hide_inactive"
             type="checkbox"
             style="width:auto;"
            />
        </v-col>
        <v-col>
            скрыть неактивные счета
        </v-col>
    </v-row>
    
</v-cont>

<v-table class="ttb">
    <template v-slot:head>
        <v-tr>
            <v-th colspan="2">Счет</v-th>
            <v-th colspan="2">Сальдо на начало периода</v-th>
            <v-th colspan="2">Обороты за период</v-th>
            <v-th colspan="2">Сальдо на конец периода</v-th>
        </v-tr>

        <v-tr>
            <v-th>Код</v-th>
            <v-th>Наименование счета</v-th>
            <v-th>Дебет</v-th>
            <v-th>Кредит</v-th>
            <v-th>Дебет</v-th>
            <v-th>Кредит</v-th>
            <v-th>Дебет</v-th>
            <v-th>Кредит</v-th>
        </v-tr>
    </template>

    <v-tr v-for="acc in items" :key="acc.id">
        <v-td>{{ acc.id }}</v-td>
        <v-td>{{ acc.name }}</v-td>
        <v-td num>{{ format(acc.start.debit) }}</v-td>
        <v-td num>{{ format(acc.start.credit) }}</v-td>
        <v-td num>{{ format(acc.turnover.debit) }}</v-td>
        <v-td num>{{ format(acc.turnover.credit) }}</v-td>
        <v-td num>{{ format(acc.end.debit) }}</v-td>
        <v-td num>{{ format(acc.end.credit) }}</v-td>
    </v-tr>

    <v-tr class="ttb-total">
        <v-td colspan="2"></v-td>
        <v-td num>{{ format(start.debit) }}</v-td>
        <v-td num>{{ format(start.credit) }}</v-td>
        <v-td num>{{ format(turnover.debit) }}</v-td>
        <v-td num>{{ format(turnover.credit) }}</v-td>
        <v-td num>{{ format(end.debit) }}</v-td>
        <v-td num>{{ format(end.credit) }}</v-td>
    </v-tr>

</v-table>
</div>
</template>

<script>
import VCol from '../components/VCol.vue';
export default {
  components: { VCol },
    name: 'TurnoverTrialBalance',
    data: () => ({
        accounts: [],
        start: {
            debit: '',
            credit: '',
        },
        turnover: {
            debit: '',
            credit: '',
        },
        end: {
            debit: '',
            credit: '',
        },
        start_date: null,
        end_date: null,
        is_loading: false,
        hide_inactive: true,
    }),
    computed: {
        items() {
            return this.hide_inactive
                ? this.accounts.filter(acc => {
                    return !!acc.start.debit || !!acc.start.credit
                        || !!acc.turnover.debit || !!acc.turnover.credit
                        || !!acc.end.debit || !!acc.end.credit
                    ;
                })
                : this.accounts
            ;
        },
    },
    methods: {
        async fetch() {
            this.is_loading = true;
            const url = 'reports/trial_balance?';

            const beforeReq = this.$http.get(url, {
                params: {
                    before: this.start_date,
                    subtracted: true,
                },
            });

            const turoverReq = this.$http.get(url, {
                params: {
                    after: this.start_date,
                    before: this.end_date,
                },
            });

            const endReq = this.$http.get(url, {
                params: {
                    before: this.end_date,
                    subtracted: true,
                },
            });

            const start = (await beforeReq).data;
            this.start.debit = start.debit;
            this.start.credit = start.credit;

            const turnover = (await turoverReq).data;
            this.turnover.debit = turnover.debit;
            this.turnover.credit = turnover.credit;

            const end = (await endReq).data;
            this.end.debit = end.debit;
            this.end.credit = end.credit;

            this.accounts = start.accounts.map((acc, i) => {
                return {
                    id: acc.id,
                    name: acc.name,
                    start: {
                        debit: acc.debit,
                        credit: acc.credit,
                    },
                    turnover: {
                        debit: turnover.accounts[i].debit,
                        credit: turnover.accounts[i].credit,
                    },
                    end: {
                        debit: end.accounts[i].debit,
                        credit: end.accounts[i].credit,
                    },
                };
            });

            this.is_loading = false;
        },
    },
    mounted() {
        const date = new Date();        

        this.start_date = (new Date(date.getFullYear(), date.getMonth(), 1))
            .toISOString().slice(0,10);

        this.end_date = (new Date(date.getFullYear(), date.getMonth() + 1, 0))
            .toISOString().slice(0,10);

        this.fetch();
    },
};
</script>

<style lang="scss">
.ttb {
    &-total {
        font-weight: bold;
    }

    &-cont {
        width: 100%;
    }
}
</style>