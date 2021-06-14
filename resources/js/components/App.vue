<template>
    <div class="" :key="i">
        <router-link
            to="/">Главная
        </router-link>
        <div class="form-xml" v-if="$route.name != 'abort'">
            <form @submit.prevent="submitHandler">
                <label>выберете xml файл<input type="file" ref="file"></label>
                <input type="submit">
            </form>
        </div>
        <router-view></router-view>
    </div>
</template>

<script>
    export default {
        name: "app",
        data() {
            return {
                i: 0
            }
        },
        methods: {
            submitHandler(e) {
                let files = this.$refs.file.files[0];
                this.readFile(files)
            },
            readFile(file) {
                let reader = new FileReader();
                let xmlStr = 'asdsa'
                reader.readAsText(file);
                reader.onload = () => {
                    this.submitXmlText(reader.result);
                };
                reader.onerror = function () {
                    alert('не вверный формат файла')
                };
                return xmlStr
            },
            async submitXmlText(text) {
                let url = `http://alvariumsoft/api/xml`
                let formData = new FormData();
                formData.append('text', text)
                let response = await fetch(url, {method: 'POST', body: formData});
                if (response.ok) {
                    alert('Данные добавлены')
                    this.i++
                } else {
                    alert('Some error')
                }
            }
        },

    }
</script>

<style>
    *{
        margin: 3px !important;
    }
</style>
