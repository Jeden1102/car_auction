<template>
  <div class="current__filters">
    <template v-for="filter in filledFilters">
      <template v-if="filter.value !== ''">
        <button @click="removeFilter(filter.field)">
          <span :class="{ upper: filter.field === 'vin' }"
            >{{ filter.value }}
          </span>
          <img src="img/icon_close.png" alt="" />
        </button>
      </template>
    </template>
  </div>
</template>

<script>
import store from "../Store";

export default {
  computed: {
    filledFilters() {
      return this.$store.getters.filledFilters;
    },
  },
  methods: {
    removeFilter(field) {
      const filterObj = { key: field, value: null };
      store.commit("SET_FILTER", filterObj);
    },
  },
};
</script>

<style lang="scss" scoped>
.current__filters {
  display: flex;
  gap: 14px;
  margin: 22px 0;
  flex-wrap: wrap;
  button {
    border: none;
    outline: none;
    display: flex;
    justify-content: center;
    min-width: 82px;
    padding: 8px;
    width: unset !important;
    align-items: center;
    background: #d9d9d9;
    border-radius: 50px;
    gap: 16px;
    span {
      font-weight: 400;
      font-size: 13px;
      line-height: 17px;
      color: #000000;
      text-transform: lowercase;
      &.upper {
        text-transform: uppercase;
      }
    }
    img {
      background: black;
      border-radius: 50%;
      transform: scale(1.5);
    }
  }
}
</style>