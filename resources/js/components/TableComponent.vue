<template>
  <div class="main" :key="componentKey">
      <div  v-for='table in tables' :class="table.status" :key='table.id' @click='table.status === "open" ? $emit("table",table.number): null'>
          <p>Номер столика {{table.number}}</p>
          <p>Кол-во мест {{table.number_seats}}</p>
      </div>

  </div>
</template>
<script>
  export default {
      data(){
        return {
            tables:[],
            open_tables:0,
            componentKey: 0,
        }
      },
      methods: {
          get_tables: function () {
            return axios.get('/api/get_tables').then((tables)=>this.tables = tables.data)

          },
          get_open_tables(){
             for (var i = 0; i < this.tables.length; i++) {
               if (this.tables[i].status === 'open') {
                  this.open_tables++
               }
             }

          },
          forceRerender() {
              this.componentKey += 1;
              console.log(this.componentKey);
            },



      },
    async  beforeMount()  {

          await this.get_tables();


          this.get_open_tables();


          this.$emit('open-table',this.open_tables);
      }

  }
</script>
<style scoped="true">
    p{
      font-size: 15px;
    }
</style>
