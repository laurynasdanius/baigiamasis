<script setup>
import { ref, computed } from 'vue';
import axios from 'axios';
import { useI18n } from 'vue-i18n';

const { locale } = useI18n();  
const responsiveSettingsLanguage = ref(false);

const languages = ref([
  { code: 'en', flag: 'images/flags/united-kingdom.png' },
  { code: 'lt', flag: 'images/flags/lithuania.png' }
]);

const filteredLanguages = computed(() => {
  return languages.value.filter(lang => lang.code !== locale.value);
});

const setLocale = async (selectedLocale) => {
  try {
    await axios.post('/api/locale', {
      language: selectedLocale,
    });
    locale.value = selectedLocale;
    responsiveSettingsLanguage.value = false;
  } catch (error) {
    console.error(error);
  }
};
</script>

<template>
  <div class="relative inline-block text-left">
    <div class="pt-0">
      <button @click="responsiveSettingsLanguage = !responsiveSettingsLanguage" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
        <img class="h-6 w-auto" :src="$t(`nav.language_full`)" alt="Current language" />
        <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
          <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
        </svg>
      </button>
    </div>
    <div v-if="responsiveSettingsLanguage" class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">
      <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
        <button v-for="lang in filteredLanguages" :key="lang.code" @click="setLocale(lang.code)" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 inline-flex justify-center" role="menuitem">
          <img class="h-6 w-auto" :src="lang.flag" :alt="lang.code + ' flag'" /><p class="px-1 py-1"> {{ $t('nav.language_name') }} </p>
        </button>
      </div>
    </div>
  </div>
</template>
