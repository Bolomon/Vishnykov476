<template>
<div class="sidebar">
    <p class="sidebar-text">Свободных столиков - {{open_tables}}</p>
    <form class="sidebar-form">
        <div class="form__group">
            <input v-model='table_number = table' type="number" min="0" max="6"id="table" name="table_number" class="form__group-input" placeholder="Выбрать столик"  disabled="disabled">
        </div>
        <div class="form__group">
            <label for="phone" class="form__group-label">Телефон</label>

            <input v-model='client_tel' v-mask="'+7(999)999-99-99'"  type="tel" id="phone" name="client_tel" class="form__group-input" maxlength="16" placeholder="+7(___)___-__-__">
        </div>
        <div class="form__group">
            <label for="email" class="form__group-label">E-mail</label>
            <input v-model='client_mail' type="email" id="email" name="client_mail" class="form__group-input" placeholder="Электронная почта">
        </div>
        <div class="form__group">
            <label for="name" class="form__group-label">Имя бронирующего</label>
            <input  v-model='client_name' type="text" id="name" name="client_name" class="form__group-input" placeholder="Имя">
        </div>
        <div class="form__group">
            <label for="name" class="form__group-label">Даты брони</label>
            <input  v-model='date_res' type="datetime-local"  :min = 'datetime[0]+"T"+datetime[1]' id="date_res" name="date_res" class="form__group-input" placeholder="Даты брони">

        </div>
        <a v-on:click="add_reservation" :href='"/send/"+client_mail+"/"+table_number+"/"+client_name' class="btn">Забронировать</a>

    </form>
</div>
</template>

<script>
import Vue from 'vue'
const VueInputMask = require('vue-inputmask').default

Vue.use(VueInputMask)

    export default {
      data() {
          return {
                  table_number: '',
                  client_tel: '',
                  client_mail: '',
                  client_name: '',
                  error_chek:'',
                  date_res:0,
                  datetime:[],
          }
      },
      props:['open_tables', 'table'],
      methods: {


          get_data(){
            axios.get('/api/get_data').then((datetime)=>this.datetime = datetime.data)
          },

          add_reservation: function () {
            axios.post('/api/reservation', {table_number:this.table_number,client_tel: this.client_tel,client_mail: this.client_mail,client_name: this.client_name,date_res: this.date_res})
            .catch((error)=>this.error_chek=error);

          },



      },
      mounted()  {
          this.get_data();
      },
    }
</script>


<style>

</style>
