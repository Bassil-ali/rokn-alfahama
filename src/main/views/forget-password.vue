<template>
  <div class="entry-content page-404 position-relative">
    <div style="margin-top: -300px" class="container">
      <div class="row justify-content-center">
        <div class="col-md-10">
          <form @submit.prevent="save(item)">
            <div class="row">
              <div class="col-md-12 mb-3">
                <label>{{ $t("Enter Your Email") }}</label>
                <br><br>
                <div class="input-group">
                  <span class="input-group-text"
                    ><i class="fas fa-key"></i
                  ></span>
                  <input
                    required
                    v-model="item.email"
                    type="email"
                    class="form-control"
                    :placeholder="$t('Enter Your Email')"
                  />
                </div>
              </div>
            </div>
            <button style="color: white" type="submit" class="button">
              {{ $t("confirm") }}
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      item: { silent: true },
    };
  },
  methods: {
    save(item) {
      this.$store.dispatch("send-reset-link/store", item).then((res) => {
        if (res.status == 200) {
           this.$swal
          .fire({
            title: this.$t("success"),
            text: res.data,
            icon: "success",
            confirmButtonText: this.$t("Ok"),
            confirmButtonColor: "#41b882",
          });
          this.$router.push("/");
        }else{
          this.$swal.fire({
          title: this.$t('error'),
          text: res.data,
          icon: "error",
          confirmButtonText: this.$t("Ok"),
          confirmButtonColor: "#41b882",
           });
        }
      });
    },
  },
};
</script>
