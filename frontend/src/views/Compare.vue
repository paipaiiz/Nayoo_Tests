<template>
<b-card>
    <b-row>
        <b-col md="4">
        <div class="form-label-group">
            <b-form-input v-model="buyPrice" id="buyPrice" placeholder="กรอกจำนวนเงิน" /><br>
        </div>
        <b-button @click="comparision()"> เปรียบเทียบ </b-button>
        </b-col>
    </b-row><br>
    <h3>{{ result }}</h3>
    <!-- <h1 v-if="result != null">{{result}}</h1> -->
</b-card>
</template>

<script>
import { BFormInput, BRow, BCol, BButton, BCard } from "bootstrap-vue";

export default {
  data() {
    return {
      buyPrice: null,
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
    comparision() {
      this.$http
        .post("http://127.0.0.1:8000/api/comparsion", {
          buyPrice: this.buyPrice,
        })
        .then((response) => {
          this.result = response.data;
        //   console.log(response.data);
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