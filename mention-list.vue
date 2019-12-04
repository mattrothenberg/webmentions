<template>
  <div class="p-4">
    <h1 class="text-2xl tracking-tighter font-semibold mb-2">{{ numMentions }}</h1>
    <ul class="p-8 mention-grid list max-w-2xl border border-gray-300">
      <li v-for="(mention, index) in mentions" :key="index">
        <v-popover>
          <button>
            <img class="rounded-full w-16 h-16" :src="mention.author.photo" />
          </button>
          <div class="p-3 text-sm max-w-2xl" slot="popover">
            <div class="text-center mb-2 font-bold text-xl tracking-tighter">
              <h2>
                <a
                  class="no-underline text-green-400"
                  :href="mention.author.url"
                >{{ mention.author.name }}</a>
              </h2>
            </div>
            <div class="text-lg leading-normal" v-html="mention.content.html"></div>
          </div>
        </v-popover>
      </li>
    </ul>
  </div>
</template>

<script>
const maybePluralize = (count, noun, suffix = "s") =>
  `${count} ${noun}${count !== 1 ? suffix : ""}`;

export default {
  name: "MentionList",
  props: ["mentions"],
  computed: {
    numMentions() {
      return maybePluralize(this.mentions.length, "mention");
    }
  },
  mounted() {
    console.log(this.mentions);
  }
};
</script>

<style>
.mention-grid {
  display: grid;
  grid-gap: 16px;
  grid-template-columns: repeat(auto-fill, minmax(64px, 1fr));
  grid-auto-rows: 1fr;
}

.tooltip {
  display: block !important;
  z-index: 10000;
}

.tooltip .tooltip-inner {
  background: black;
  color: white;
  border-radius: 16px;
  padding: 5px 10px 4px;
}

.tooltip .tooltip-arrow {
  width: 0;
  height: 0;
  border-style: solid;
  position: absolute;
  margin: 5px;
  border-color: black;
  z-index: 1;
}

.tooltip[x-placement^="top"] {
  margin-bottom: 5px;
}

.tooltip[x-placement^="top"] .tooltip-arrow {
  border-width: 5px 5px 0 5px;
  border-left-color: transparent !important;
  border-right-color: transparent !important;
  border-bottom-color: transparent !important;
  bottom: -5px;
  left: calc(50% - 5px);
  margin-top: 0;
  margin-bottom: 0;
}

.tooltip[x-placement^="bottom"] {
  margin-top: 5px;
}

.tooltip[x-placement^="bottom"] .tooltip-arrow {
  border-width: 0 5px 5px 5px;
  border-left-color: transparent !important;
  border-right-color: transparent !important;
  border-top-color: transparent !important;
  top: -5px;
  left: calc(50% - 5px);
  margin-top: 0;
  margin-bottom: 0;
}

.tooltip[x-placement^="right"] {
  margin-left: 5px;
}

.tooltip[x-placement^="right"] .tooltip-arrow {
  border-width: 5px 5px 5px 0;
  border-left-color: transparent !important;
  border-top-color: transparent !important;
  border-bottom-color: transparent !important;
  left: -5px;
  top: calc(50% - 5px);
  margin-left: 0;
  margin-right: 0;
}

.tooltip[x-placement^="left"] {
  margin-right: 5px;
}

.tooltip[x-placement^="left"] .tooltip-arrow {
  border-width: 5px 0 5px 5px;
  border-top-color: transparent !important;
  border-right-color: transparent !important;
  border-bottom-color: transparent !important;
  right: -5px;
  top: calc(50% - 5px);
  margin-left: 0;
  margin-right: 0;
}

.tooltip.popover .popover-inner {
  background: #2d3748;
  color: white;
  border-radius: 5px;
  box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1),
    0 10px 10px -5px rgba(0, 0, 0, 0.04);
}

.tooltip.popover .popover-arrow {
  border-color: #2d3748;
}

.tooltip[aria-hidden="true"] {
  visibility: hidden;
  opacity: 0;
  transition: opacity 0.15s, visibility 0.15s;
}

.tooltip[aria-hidden="false"] {
  visibility: visible;
  opacity: 1;
  transition: opacity 0.15s;
}
</style>