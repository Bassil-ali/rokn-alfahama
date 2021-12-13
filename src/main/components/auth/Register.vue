<template>
  <v-row justify="center" dense>
    <v-col cols="6">
      <v-card outlined>
        <v-card-title> Register </v-card-title>
        <v-card-text>
          <v-form class="mx-auto col-11" ref="form">
            <v-text-field
              v-model="user.first_name"
              outlined
              rounded
              dense
              :label="$t('first_name')"
              prepend-inner-icon="fas fa-user"
              type="text"
            ></v-text-field>
            <v-text-field
              v-model="user.middle_name"
              outlined
              rounded
              dense
              :label="$t('middle_name')"
              prepend-inner-icon="fas fa-user"
              type="text"
            ></v-text-field>
            <v-text-field
              v-model="user.last_name"
              outlined
              rounded
              dense
              :label="$t('last_name')"
              prepend-inner-icon="fas fa-user"
              type="text"
            ></v-text-field>
            <v-text-field
              v-model="user.mobile"
              outlined
              rounded
              dense
              :label="$t('mobile')"
              prepend-inner-icon="fas fa-phone"
              type="phone"
            ></v-text-field>
            <v-text-field
              v-model="user.email"
              outlined
              rounded
              dense
              :label="$t('email')"
              prepend-inner-icon="mdi-email"
              type="email"
            ></v-text-field>
            <v-text-field
              v-model="user.password"
              outlined
              rounded
              dense
              :label="$t('password')"
              prepend-inner-icon="mdi-lock"
              type="password"
            ></v-text-field>
            <v-text-field
              v-model="confirmation_password"
              outlined
              rounded
              dense
              :label="$t('confirmation_password')"
              prepend-inner-icon="mdi-lock"
              type="password"
              :rules="[(v)=>v==user.password || $t('passwords_dont_match')]"
            ></v-text-field>

            <div class="col-12 text-center">
              <v-btn text class="text-justify" to="/login">{{
                $t("already_have_account")
              }}</v-btn>
            </div>
            <v-btn block color="green" @click="store(user)">
              {{ $t("register") }}
            </v-btn>
            <!-- <v-row align="center" justify="space-around" class="pa-5">
              <v-btn class="pr-5 pl-5" icon>
                <v-icon size="36"> fab fa-facebook-f </v-icon>
              </v-btn>
              <v-btn class="pr-5 pl-5" icon>
                <v-icon size="36"> fab fa-twitter </v-icon>
              </v-btn>
              <v-btn class="pr-5 pl-5" icon>
                <v-icon size="36"> mdi-google </v-icon>
              </v-btn>
            </v-row> -->
          </v-form>
        </v-card-text>
      </v-card>
    </v-col>
  </v-row>
</template>
<script>
import { mapActions } from "vuex";
export default {
  data() {
    return {
      menu: false,
      date: null,
      user: {
      },
      rules: {
        required: (value) => !!value || this.$t("required"),
        counter: (value) => value.length <= 20 || this.$t("min_8_characters"),
        email: () => {
          // const pattern = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
          // this.$axios.post("/user/registerd",value).then(()=>{
          //     return pattern.test(value) || this.$t("invalid_email");
          // })
        },
        user_name: () => {
          
          // return pattern.test(value) || this.$t("invalid_email");
        },
      },
      errors:{
          
      },
      confirmation_password:""
    };
  },
  methods: {
    ...mapActions("customer",["store"]),
    save(date) {
      this.$refs.menu.save(date);
    },
  },
};
</script>