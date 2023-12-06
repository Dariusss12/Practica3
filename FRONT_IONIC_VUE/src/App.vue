<script setup lang="ts">
import PresentationCard from './components/PresentationCard.vue';
import HobbiesCard from './components/HobbiesCard.vue';
import FrameworksCard from './components/FrameworksCard.vue';

import { getInfo } from './backend/info';
import { ref, onMounted } from 'vue';

import type { Framework, Hobby, Info } from '@/interfaces';

import { IonContent } from '@ionic/vue';



const name = ref('');
const lastname = ref('');
const country = ref('');
const city = ref('');
const summary = ref('');
const email = ref('');
const hobbies = ref<Hobby[]>([]);
const frameworks = ref<Framework[]>([]);

onMounted(async () => {
  const info: Info = await getInfo();
  name.value = info.name;
  lastname.value = info.lastname;
  country.value = info.country;
  city.value = info.city;
  summary.value = info.summary;
  email.value = info.email;
  hobbies.value = info.hobbies;
  frameworks.value = info.frameworks;

});
</script>



<template>
      <PresentationCard :name=name :lastname=lastname :summary=summary :city=city :country=country :email=email></PresentationCard>
      <div class="block sm:flex">
        <template v-if="Array.isArray(hobbies)">
          <HobbiesCard :hobbies=hobbies></HobbiesCard>
        </template>
        <template v-if="Array.isArray(frameworks)">
          <FrameworksCard :frameworks=frameworks :percent1=30 :percent2=15 ></FrameworksCard>
        </template>
      </div>
</template>



<style>

body {
  background: rgb(107,1,161);
  background: linear-gradient(45deg, rgba(107,1,161,1) 0%, rgba(49,72,176,0.7382412437631303) 50%, rgba(0,212,255,1) 100%);
  background-size: 200% 200%;
  background-position: center;
}

</style>