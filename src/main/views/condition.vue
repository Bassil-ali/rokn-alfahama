    <template>
  <div class="entry-content terms-and-conditions">
    <div class="head">
      <h2>{{ $t("Terms_of_use") }}</h2>
    </div>
    <div  v-if="!settings.conditions">
<center><h1>no conditions found</h1></center>
    </div>
    <div class="Tsection-01 position-relative" v-if="settings.conditions">
      
      <div class="container">
        <div class="content">
          <h4
            v-text="
              locale == 'ar'
                ? settings.conditions[0].title_ar
                : settings.conditions[0].title_en
            "
          ></h4>
          <p
            v-text="
              locale == 'ar'
                ? settings.conditions[0].paragraph_ar
                : settings.conditions[0].paragraph_en
            "
          ></p>
          <h4
            v-text="
              locale == 'ar'
                ? settings.conditions[1].title_ar
                : settings.conditions[1].title_en
            "
          ></h4>
          <p
            v-text="
              locale == 'ar'
                ? settings.conditions[1].paragraph_ar
                : settings.conditions[1].paragraph_en
            "
          ></p>
        </div>
      </div>
    </div>
    <div class="Tsection-02 position-relative" v-if="settings.conditions">
      <div class="decor"></div>
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div
              :key="index"
              v-for="(condition, index) in settings.conditions.slice(
                2,
                settings.conditions.length
              )"
              class="item"
            >
              <h3
                v-text="
                  locale == 'ar' ? condition.title_ar : condition.title_en
                "
              ></h3>
              <p
                v-text="
                  locale == 'ar'
                    ? condition.paragraph_ar
                    : condition.paragraph_en
                "
              ></p>
            </div>
          </div>
          <div class="col-md-6">
            <figure>
              <img
                src="@/main/assets/images/54c5989ec7bc8b192c60f9e9a0dae937.jpg"
                alt=""
              />
            </figure>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
    <script>
import { mapState } from "vuex";
export default {
  computed: {
    ...mapState({
      settings: (state) => state.settings,
      locale: (state) => state.locales.locale,
    }),
  },
};
</script>
