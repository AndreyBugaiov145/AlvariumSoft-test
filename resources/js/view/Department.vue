<template>
    <div class="row" :key="i" v-if="loader">
        <div class="row" v-if="data.data && data.data.length">
            <Tabl :data='data'
                  @page-cheng="pageCheng"
                  @count-change='countChange'
            />
            <SideBar/>
        </div>
        <div v-else><h2>Департаментов нету</h2></div>
    </div>
</template>

<script>
    import SideBar from "../components/SideBar"
    import Tabl from "../components/Table"

    export default {
        name: "department",
        components: {
            SideBar, Tabl
        },
        data() {
            return {
                data: false,
                page: 1,
                i: 0,
                loader: false
            }
        },
        methods: {
            pageCheng() {
                this.loadContent()
                this.i++
            },
            countChange(count) {
                this.$route.query.page != 1 ? this.$router.push(`${this.$route.path}?page=1`) : false;
                this.loadContent(count)
                this.i++
            },
            async loadContent(count = false) {
                this.page = +this.$route.query.page || 1
                let department_id = this.$route.params.id;
                let url = `http://alvariumsoft/api/employes/${department_id}/?page=${this.page}`
                if (count) {
                    url = url + `&count=${count}`;
                }
                let response = await fetch(url, {method: 'GET'});
                if (response.ok) {
                    this.data = await response.json();
                    console.log(this.data)
                } else {
                    alert('Some error')
                }
            },
        },
        async mounted() {
            await this.loadContent()
            this.loader = true
        },
        watch: {
            '$route.params.id': {
                handler() {
                    this.loadContent()
                    this.i++
                },
                immediate: true,
            }
        }
    }

</script>
