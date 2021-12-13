<template>
  <v-dialog width="800" v-model="open" persistent>
    <v-card>
      <v-card-title>
        {{ $t("location_picker") }}
      </v-card-title>
      <v-card-text>
        <v-row>
          <v-col cols="12">
            <GmapMap
              :center="center"
              :zoom="18"
              map-style-id="roadmap"
              :options="mapOptions"
              style="width: 100%; height: 50vmin"
              ref="mapRef"
              @click="handleMapClick"
            >
              <GmapMarker
                :position="marker.position"
                :clickable="true"
                :draggable="true"
                @drag="handleMarkerDrag"
                @click="panToMarker"
              />
            </GmapMap>
          </v-col>
        </v-row>
        <!-- <v-row>
          <v-col cols="6">
            <v-radio-group v-model="marker.position.type">
              <v-radio value="private" :label="$t('private')"> </v-radio>
              <v-radio value="public" :label="$t('public')"> </v-radio>
            </v-radio-group>
          </v-col>
        </v-row> -->
        <v-row>
          <v-col cols="12">
            {{ $t("tree_will_be_planted_at_nearest_location") }}
          </v-col> 
        </v-row>
      </v-card-text>
      <v-card-actions>
        <v-btn @click="$emit('closed')" dark color="red">
          {{ $t("close") }}
        </v-btn>
      </v-card-actions>
    </v-card>
  </v-dialog>
</template>
<script>
export default {
  props: ["open"],
  data() {
    return {
      item: {},
      images: [],
      marker: {
        position: { lat: 31.776488733539026, lng: 35.234707318589045 },
      },
      center: { lat: 31.776488733539026, lng: 35.234707318589045 },

      mapOptions: {
        disableDefaultUI: true,
      },
      location_type: "private",
    };
  },
  mounted() {},
  methods: {
    handleMarkerDrag(e) {
      this.marker.position = {
        lat: e.latLng.lat(),
        lng: e.latLng.lng(),
      };
    },
    panToMarker() {
      this.$refs.mapRef.panTo(this.marker.position);
      this.$refs.mapRef.setZoom(18);
    },
    handleMapClick(e) {
      this.marker.position = {
        lat: e.latLng.lat(),
        lng: e.latLng.lng(),
      };
    },
  },
  watch: {
    marker: {
      handler: function (val) {
        this.$emit("input", val.position);
      },
      deep: true,
    },
  },
};
</script>