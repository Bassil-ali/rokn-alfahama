<template>
  <v-row
    justify="center"
    dense
    style="justify-content: center; margin-bottom: 20px"
  >
    <v-col cols="12" md="6">
      <v-card class="elevation-0" outlined>
        <v-card-title class="text-center" style="text-align: center">
          Login
        </v-card-title>
        <v-card-text>
          <v-form class="mx-auto col-11" ref="form">
            <v-text-field
              v-model="user.email"
              outlined
              dense
              :label="email.label"
              prepend-inner-icon="mdi-email"
              type="email"
            ></v-text-field>
            <v-text-field
              v-model="user.password"
              outlined
              dense
              :label="password.label"
              prepend-inner-icon="mdi-lock"
              type="password"
            ></v-text-field>
            <div class="col-12 text-center">
              <v-btn text class="text-justify" to="/reset_password"
                >Forgot Password ?</v-btn
              >
            </div>
             <fb:login-button
                  scope="public_profile,email"
                >
                </fb:login-button>
            <v-row>
              <v-col cols="12">
                <v-btn
                  block
                  color="green"
                  dark
                  @click="login(user).then(() => $router.push('/'))"
                >
                  Login
                </v-btn>
              </v-col>
            </v-row>
            <v-row>
              <v-col cols="12">
                <v-btn
                  color="#4294FF"
                  dark
                  block
                  depressed
                  @click="AuthProvider('facebook')"
                >
                  <v-icon size="30"> fab fa-facebook-f </v-icon>
                </v-btn>
               
              </v-col>
            </v-row>
            <v-row>
              <v-col cols="12">
                <v-btn
                  color="#EA4335"
                  dark
                  block
                  depressed
                  @click="AuthProvider('google')"
                >
                  <v-icon size="30"> mdi-google </v-icon>
                </v-btn>
              </v-col>
            </v-row>
            <v-row>
              <div class="text-justify col-12">
                <div class="text-center">Or</div>
              </div>
              <v-divider></v-divider>
              <v-row>
                <v-col cols="12">
                  <v-btn
                    dark
                    class="text-justify"
                    block
                    depressed
                    to="/register"
                    >Register</v-btn
                  >
                </v-col>
              </v-row>
            </v-row>
          </v-form>
        </v-card-text>
      </v-card>
    </v-col>
  </v-row>
</template>
<script>
import { mapActions, mapState } from "vuex";
export default {
  data() {
    return {
      user: {
        email: "",
        password: "",
      },
      email: {
        label: "Email",
      },
      password: {
        label: "Password",
      },
      FB:window.FB
    };
  },
  methods: {
    ...mapActions("auth", ["login"]),
    AuthProvider(provider) {
      var self = this;

      this.$auth
        .authenticate(provider)
        .then((response) => {
          self.SocialLogin(provider, response);
        })
        .catch((err) => {
          console.log({ err: err });
        });
    },

    SocialLogin(provider, response) {
      this.$http
        .post("/sociallogin/" + provider, response)
        .then((response) => {
          console.log(response.data);
        })
        .catch((err) => {
          console.log({ err: err });
        });
    },
 
    checkLoginState() {
      // console.log(window.FB);
      // this.FB.getLoginStatus(function (response) {
      //   console.log(response);
      // });
    },
  },
  computed: {
    ...mapState({
      loggedIn: (state) => state.auth.user != null,
    }),
  },
  watch: {
    loggedIn: function (val) {
      if (val) {
        this.$router.push("/");
      }
    },
  },
};
</script>