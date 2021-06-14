<template>
    <div class="" v-if="departments">
        <h3>Департаменты</h3>
       <p v-for="department in departments"
          :key="department.id">
           <router-link
             :to="'/department/'+department.id">{{department.name}}</router-link>
       </p>
    </div>
</template>

<script>

    export default {
        name: "side-bar",
        data() {
            return {
                departments : true
            }
        },
        async mounted() {
            let response = await fetch('http://alvariumsoft/api/departments', {method: 'GET'});
            if (response.ok) {
                this.departments = await response.json();
            }else{
                alert('Some error')
            }

        }

    }
</script>
