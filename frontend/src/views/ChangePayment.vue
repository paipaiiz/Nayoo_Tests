<template>
<b-card>
    <b-row>
        <b-col md="4">
        <div class="form-label-group">
            <b-form-input v-model="money" id="money" placeholder="กรอกจำนวนเงิน" /><br>
            <b-form-input v-model="price" id="price" placeholder="กรอกราคาสินค้า" />
        </div>
        <b-button @click="changePayment()"> คำนวณ </b-button>
        </b-col>
    </b-row><br>
    <tbody v-for="change in result" :key="change">
      <tr>
        
        <td>{{ change }}</td>
      </tr>
    </tbody>
    <!-- <h1 v-if="result != null">{{result}}</h1> -->
</b-card>
</template>

<script>
import { BFormInput, BRow, BCol, BButton, BCard } from "bootstrap-vue";

export default {
  data() {
    return {
      money: null,
      price: null,
      result: null
    };
  },
  components: {
    BFormInput,
    BRow,
    BCol,
    BButton,
    BCard
  },
  methods: {
    changePayment() {
      this.$http
        .post("http://127.0.0.1:8000/api/changepayment", {
          money: this.money,
          price: this.price,
        })
        .then((response) => {
          this.result = response.data;
        //   console.log(response);
        })
        .catch((error) => {
          console.log(error);
          this.errored = true;
        })
        .finally(() => (this.loading = false));
    },
  },
};
</script>