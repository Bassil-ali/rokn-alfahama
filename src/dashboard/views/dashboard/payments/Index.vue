<template>
  <v-container id="regular-tables" fluid tag="section">
    <base-v-component heading="payments"/>
    
    <base-material-card
      icon="mdi-clipboard-text"
      title="payments_table"
      class="px-5 py-3"
    >
    <v-btn icon fab large dark color="red" to="/payments/form">
      <v-icon large> mdi-plus </v-icon>
    </v-btn>
      <v-simple-table>
        <thead>
          <tr>
            <th   v-for="(header,index) in headers" :key="index" class="primary--text">
              {{ header.text }}
            </th>
          </tr>
        </thead>

        <tbody>
          <tr v-for="(one,index) in all" :key="index">
            <td v-for="(header,index) in headers" :key="index">
              {{ one[header.value] }}
            </td>
                        <td>
              <v-btn icon @click="$store.dispatch('category/delete',one)">
                <v-icon small>
                  fas fa-times
                </v-icon>
              </v-btn>
              <v-btn icon @click="$router.push({name:`${$route.name}.form`,params:{item:one}})">
                <v-icon small>
                  fas fa-edit
                </v-icon>
              </v-btn>
            </td>
          </tr>
        </tbody>
      </v-simple-table>
      <table-pagenation module="payment" />
      
    </base-material-card>

    <div class="py-3" />

  </v-container>
</template>
<script>
import { mapState } from "vuex";
export default {
  mounted() {
    this.$store.dispatch("payment/index");
  },
  computed: {
    ...mapState({
      all: (state) => state.payment.all,
      headers: (state) => state.payment.headers,
    }),
  },
};
</script>
