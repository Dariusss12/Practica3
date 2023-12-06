<template>
  <TransitionRoot appear :show="isOpen" as="template">
    <Dialog as="div" @close="closeModal" class="relative z-[50]">
      <TransitionChild
        as="template"
        enter="duration-300 ease-out"
        enter-from="opacity-0"
        enter-to="opacity-100"
        leave="duration-200 ease-in"
        leave-from="opacity-100"
        leave-to="opacity-0"
      >
      <div class="fixed inset-0 bg-black bg-opacity-80" />
      </TransitionChild>

      <div class="fixed inset-0 overflow-y-auto">
        <div class="flex min-h-full items-center justify-center p-4">
          <TransitionChild
            as="template"
            enter="duration-300 ease-out"
            enter-from="opacity-0 scale-95"
            enter-to="opacity-100 scale-100"
            leave="duration-200 ease-in"
            leave-from="opacity-100 scale-100"
            leave-to="opacity-0 scale-95"
          >
            <DialogPanel class="flex w-full max-w-2xl transform overflow-hidden rounded-2xl bg-white p-6 shadow-xl transition-all">
                            
              <form @submit.prevent="submitForm" class="mx-auto w-full">
                <div class="mb-5 ">
                  <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nombre</label>
                  <input type="text" id="name" v-model="formData.name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 ">
                </div>
                <div class="mb-5">
                  <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Descripción</label>
                  <textarea rows="3" type="text" id="description" v-model="formData.description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 resize-none"></textarea>
                </div>

                <div class="flex justify-center w-full">
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm sm:w-auto px-5 py-2.5">Guardar</button>
                </div>
              </form>
              
            </DialogPanel>
          </TransitionChild>
        </div>
      </div>
    </Dialog>
  </TransitionRoot>
</template>

<script setup lang="ts">
import { ref } from 'vue';
import { TransitionRoot, TransitionChild, Dialog, DialogPanel } from '@headlessui/vue';
import type { HobbyForm } from '@/interfaces';
import { updateHobby } from '@/backend/info';

const isOpen = ref<boolean>(true);
function closeModal(): void {
isOpen.value = false;
}

const props = defineProps({
  id: String,
})

const formData = ref<HobbyForm>({
name: '',
description: ''
});

async function submitForm(): Promise<void> {
try {
  if(props.id){
    await updateHobby(formData.value, props.id);
    window.location.reload();
    closeModal();
  }

} catch (error: any) {
  console.log('hubo un error')
}
}

</script>