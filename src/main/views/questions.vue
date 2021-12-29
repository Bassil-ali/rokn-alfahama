<template>
  <div class="entry-content faq">
    <div class="head">
      <h2>{{ $t("common_questions") }}</h2>
    </div>
    <div class="Fsection-01 position-relative">
      <div class="decor"></div>
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6">
            <div class="accordion" id="accordionExample">
              <div
                v-for="(question, index) in settings.questions"
                class="accordion-item"
                :key="index"
              >
                <h2 class="accordion-header" :id="`heading${index}`">
                  <button
                    class="accordion-button"
                    type="button"
                    data-bs-toggle="collapse"
                    :data-bs-target="`#collapse${index}`"
                    aria-expanded="true"
                    :aria-controls="`collapse${index}`"
                  >
                    {{ locale == "ar" ? question.title_ar : question.title_en }}
                  </button>
                </h2>
                <div
                  :id="`collapse${index}`"
                  class="accordion-collapse collapse show"
                  :aria-labelledby="`heading${index}`"
                  data-bs-parent="#accordionExample"
                >
                  <div class="accordion-body">
                    <p>
                      {{
                        locale == "ar" ? question.answer_ar : question.answer_en
                      }}
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 position-relative">
            <figure class="m-0">
              <img src="@/main/assets/images/faq.svg" alt="" />
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
