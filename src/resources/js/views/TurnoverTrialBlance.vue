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
    <template v-slot:header>
        <v-col fixed>Счет</v-col>
        <v-col>Сальдо на начало периода</v-col>
        <v-col>Обороты за период</v-col>
        <v-col>Сальдо на конец периода</v-col>
    </template>

    <template v-if="is_loading">
        <v-row>
            Loading...
        </v-row>
    </template>

    <template v-else>
    <v-row>
        <v-col fixed>Код</v-col>
        <v-col fixed>Наименование счета</v-col>
        <v-col>Дебет</v-col>
        <v-col>Кредит</v-col>
        <v-col>Дебет</v-col>
        <v-col>Кредит</v-col>
        <v-col>Дебет</v-col>
        <v-col>Кредит</v-col>
    </v-row>

    <v-row v-for="acc in items" :key="acc.id">
        <v-col fixed>{{ acc.id }}</v-col>
        <v-col fixed>{{ acc.name }}</v-col>
        <v-col>{{ normalized(acc.start.debit) }}</v-col>
        <v-col>{{ normalized(acc.start.credit) }}</v-col>
        <v-col>{{ normalized(acc.turnover.debit) }}</v-col>
        <v-col>{{ normalized(acc.turnover.credit) }} </v-col>
        <v-col>{{ normalized(acc.end.debit) }}</v-col>
        <v-col>{{ normalized(acc.end.credit) }}</v-col>
    </v-row>

    <v-row class="ttb-total">
        <v-col fixed></v-col>
        <v-col fixed></v-col>
        <v-col>{{ normalized(start.debit) }}</v-col>
        <v-col>{{ normalized(start.credit) }}</v-col>
        <v-col>{{ normalized(turnover.debit) }}</v-col>
        <v-col>{{ normalized(turnover.credit) }}</v-col>
        <v-col>{{ normalized(end.debit) }}</v-col>
        <v-col>{{ normalized(end.credit) }}</v-col>
    </v-row>
    </template>

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
        normalized: (value) => value ? (Number(value)).toFixed(2) : "",
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
            .toLocaleDateString('ru-RU');

        this.end_date = (new Date(date.getFullYear(), date.getMonth() + 1, 0))
            .toLocaleDateString('ru-RU');

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

    & .v-row .v-col {
        flex-basis: 100%;

		&:nth-child(1) {
			flex-basis: 3.2rem;
		}

		&:nth-child(2) {
			flex-basis: 30rem;
		}
	}

    & .v-row:nth-child(1) .v-col {
        flex-basis: 100%;

        &:nth-child(1) {
			flex-basis: 33.2rem;
		}
    }
}
</style>