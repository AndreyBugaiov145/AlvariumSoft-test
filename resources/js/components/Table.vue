<template>
    <div  class="">
        <h1>table</h1>
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
                  :active-class = "'active'"
                  :page-class = "'links'"
                  :disabled-classs = "'hide'"
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
                data: false
            }
        },
        computed: {
            employes() {
                return this.data.data
            }
        },
        methods: {
            pageChenge(page) {
                this.$router.push(`${this.$route.path}?page=${page}`)
                this.loadContent()
            },
            async loadContent() {
                let page = this.page
                let response = await fetch(`http://alvariumsoft/api/employes?page=${page}`, {method: 'GET'});
                if (response.ok) {
                    this.data = await response.json();
                } else {
                    alert('Some error')
                }
            },
        },
        async mounted() {
            await this.loadContent()

        }
    }
</script>

<style>
    .links > a{
        margin: 10px;
    }

    .active{
        border: 2px solid red;
    }
    .hide{
        display: none;
    }
    .table{
        width: 60%  ;
    }


</style>
