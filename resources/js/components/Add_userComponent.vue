<template>
      <div class="container2">
        <div class="main2">
            <ul>
              <li v-for='user in users'>{{user.table_number}} &nbsp &nbsp {{user.client_tel}} &nbsp &nbsp {{user.client_mail}} &nbsp &nbsp {{user.client_name}} &nbsp &nbsp {{user.date_res}} &nbsp &nbsp<a :href="'del_res/'+user.table_number"><img src="img/Close_Square.svg" alt=""></a></li>
            </ul>
        </div>
      </div>

</template>

<script>
    export default {
      data(){
        return{
            users:[],
        }
      },
        methods: {
          get_users(){
              return axios.get('/api/get_users').then((users)=>this.users = users.data)
          },
        },
        async  beforeMount()  {
              await this.get_users();
            },
      }

</script>
