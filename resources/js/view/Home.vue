<template>
        <div class=" row">
            <Tabl/>
            <SideBar />
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


    }
</script>
