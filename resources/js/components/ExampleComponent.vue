<template>
  <div class="content">
      <table-component @table='get_table' @open-table='get_open_table'></table-component>
      <reservation-component :table='table' :open_tables='open_table'></reservation-component>
    </div>
</template>

<script>
    import ReservationComponent from './ReservationComponent.vue'
    import TableComponent from './TableComponent.vue'
    export default {
      data(){
        return{
            table:0,
            open_table:0,
        }
      },
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            get_table(table){
                this.table = table;
                console.log(table);
            },
            get_open_table(open_table){
              this.open_table = open_table;
            }
        },

    }
</script>
