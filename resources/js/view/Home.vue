<template>
    <div class="row" :key="i" v-if="loader">
        <Tabl v-if="data.data && data.data.length" :data='data'
              @page-cheng="pageCheng"
              @count-change='countChange'
        />
        <div v-else><h2>Сотрудников нету</h2></div>
        <SideBar/>
    </div>
</template>

<script>
    import SideBar from "../components/SideBar"
    import Tabl from "../components/Table"

    export default {
        name: "home",
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
            countChange(count) {
                this.$route.query.page != 1 ? this.$router.push(`${this.$route.path}?page=1`) : false;
                this.loadContent(count)
                this.i++
            },
            pageCheng() {
                this.loadContent()
                this.i++
            },
            async loadContent(count = false) {

                let url = `http://alvariumsoft/api/employes/?page=${this.page}`
                if (count) {
                    url = url + `&count=${count}`;
                }
                let response = await fetch(url, {method: 'GET'});
                if (response.ok) {
                    this.data = await response.json();
                } else {
                    alert('Some error')
                }
            },
        },
        async mounted() {
            this.page = +this.$route.query.page || 1
            await this.loadContent()
            this.loader = true
        },
    }
</script>
