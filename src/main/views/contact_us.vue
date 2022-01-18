<template>
  <div class="entry-content contact">
    <div class="head">
      <h2>{{ $t("contact") }}</h2>
    </div>
    <div class="Csection-01">
      <div class="container position-relative">
        <div class="row align-items-center">
          <div class="col-md-6">
            <div class="content text-center">
              <form action="">
                <h4>{{ $t("do_you_have_question") }}</h4>
                <h2>{{ $t("contact") }}</h2>
                <div class="mb-3">
                  <input
                    v-model="item.name"
                    type="text"
                    class="form-control"
                    :placeholder="$t('name')"
                  />
                </div>
                <div class="mb-3">
                  <input
                    v-model="item.email"
                    type="email"
                    class="form-control"
                    :placeholder="$t('email')"
                  />
                </div>
                <div class="mb-3">
                  <input
                    v-model="item.subject"
                    type="text"
                    class="form-control"
                    :placeholder="$t('subject')"
                  />
                </div>
                <div class="mb-3">
                  <textarea
                    v-model="item.message"
                    cols="30"
                    rows="10"
                    class="form-control"
                    :placeholder="$t('message')"
                  ></textarea>
                </div>
                <button type="submit" class="button">
                  {{ $t("send_message") }}
                </button>
              </form>
            </div>
          </div>
          <div class="col-md-6 position-relative">
            <div class="information">
              <ul>
                <li><i class="fas fa-phone"></i> {{ settings.phone }}</li>
                <li><i class="fas fa-mobile-alt"></i> {{ settings.mobile }}</li>
                <li>
                  <i class="far fa-envelope"></i> {{ settings.contect_email }}
                </li>
                <li>
                  <i class="fas fa-map-marker-alt"></i>
                  {{
                    locale == "ar"
                      ? settings.address_ar
                      : settings.address_en ||
                        "  المملكة العربية السعودية - الدمام"
                  }}
                </li>
              </ul>
              <div class="socail">
                <span>{{ $t("follow_us_on") }}</span>
                <div class="links">
                   
                    <a :href="settings.instgram" target="__blank"
                      ><i class="fab fa-instagram"></i
                    ></a>
                  
                  
                    <a :href="settings.facebook" target="__blank"
                      ><i class="fab fa-facebook-f"></i
                    ></a>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import { mapState } from "vuex";
export default {
   data() {
    return {
      item: {},
    };
  },
  computed: {
    ...mapState({
      settings: (state) => state.settings,
      locale: (state) => state.locales.locale,
    }),
  },

  methods: {
    save(item) {
      this.$store.dispatch("contact/store", item);
    },
  },
};
</script>
