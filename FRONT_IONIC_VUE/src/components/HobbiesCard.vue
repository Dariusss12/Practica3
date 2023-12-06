<template>
    <AddHobbyModal v-if="showAddModal" @close="showAddModal = false, hobbyId = ''"></AddHobbyModal>
    <EditHobbyModal v-if="showEditModal" @close="showEditModal = false" :id=hobbyId></EditHobbyModal>
    <div class="block p-5 m-5 rounded-2xl bg-white shadow-lg sm:w-2/4 justify-items-center h-[500px]">
      <div class="flex">
        <h1 class="text-2xl italic font-bold text-[#8C52FF]">INTERESES</h1>
        <div class="flex justify-end w-full items-center">
          <button @click="openAddModal" class="text-xl hover:text-[#8C52FF] font-bold text-[#5E17EB] mr-2">+</button>
        </div>
      </div>
      <div class="flex flex-no-wrap overflow-x-scroll scrolling-touch items-start mt-[30px]">
        <div v-for="(hobby, index) in props.hobbies" :key="index" class="flex-none w-[100%] sm:w-1/2 px-2 sm:my-[50px] text-black">
          <img src="/img/ucnLogo.png" class="max-h-[200px] rounded-2xl mx-auto">
          <h1 class="text-2xl text-center font-bold text-[#8C52FF]">{{ hobby.name }}</h1>
          <h2 class="italic text-center">{{ hobby.description }}</h2>
          
          <div class="flex justify-center">
            <button @click="openEditModal(hobby.id)" class="text-gray-400 hover:text-green-400 m-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                </svg>
  
            </button>
            <button @click="deleteHobby(hobby.id)" class="text-red-500 hover:text-red-400 m-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                </svg>
            </button>
          </div>


        </div>
      </div>

    </div>
</template>

<script setup lang="ts">
import { ref } from 'vue';
import AddHobbyModal from './modals/AddHobbyModal.vue';
import EditHobbyModal from './modals/EditHobbyModal.vue';
import { deleteHobby as deleteDB } from '@/backend/info';

const props = defineProps({
  hobbies: Array
})

let hobbyId = ''


let showAddModal = ref(false);
let showEditModal = ref(false);

function openAddModal() {
  showAddModal.value = true
}

function openEditModal(id: string) {
  hobbyId = id;
  showEditModal.value = true
}

async function deleteHobby(id: string){
  try {
    await deleteDB(id);
    window.location.reload();

  } catch (error: any) {
    console.log('hubo un error')
  }
}

</script>