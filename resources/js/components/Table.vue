<template>
    <div class="col-8" :key="i">
        <label for="count">Количестов элементов в списке</label>
        <select name="count" id="count" v-model="count" @change="$emit('count-change',count)">
            <option value="10">10</option>
            <option value="25">25</option>
            <option value="50">50</option>
            <option value="100">100</option>
        </select>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Имя</th>
                <th scope="col">Отчество</th>
                <th scope="col">Фамилия</th>
                <th scope="col">Дата рождения</th>
                <th scope="col">должностьсотрудника</th>
                <th scope="col">тип отдел</th>
                <th scope="col">оплата за месяц</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="employe in employes" :key="employe.id">
                <th scope="row">{{employe.id}}</th>
                <td>{{employe.name}}</td>
                <td>{{employe.patronymic}}</td>
                <td>{{employe.surname}}</td>
                <td>{{employe.birthday}}</td>
                <td>{{employe.position}}</td>
                <td>{{employe.department}}</td>
                <td>{{employe.salary}}</td>
            </tr>
            </tbody>
        </table>
        <paginate v-if="data"
                  v-model="page"
                  :page-count="data.meta.last_page"
                  :click-handler="pageChenge"
                  :prev-text=" 'Предыдущая' "
                  :next-text=" 'Далее' "
                  :container-class="'pagination'"
                  :active-class="'active'"
                  :page-class="'links'"
        />
    </div>
</template>

<script>
    export default {
        name: "tabl",
        data() {
            return {
                page: +this.$route.query.page || 1,
                pageSize: 5,
                i: 0,
                count: false
            }
        },
        props: ['data'],
        computed: {
            employes() {
                return this.data.data
            }
        },
        methods: {
            pageChenge(page) {
                this.$router.push(`${this.$route.path}?page=${page}`)
                this.$emit('page-cheng')
            },
        }
    }
</script>

<style>
    .links > a {
        margin: 10px;
    }

    .active {
        border: 2px solid red;
    }

    .table {

        margin: 20px !important;
    }

    .disabled {
        display: none;
    }
</style>
