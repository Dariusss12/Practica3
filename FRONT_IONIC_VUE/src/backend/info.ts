import type { HobbyForm, UpdatePersonalForm, FrameworkForm } from '@/interfaces';
import api from '../services/api';

export async function getInfo() {
    const response = await api.get('/profile');
    return response.data[0];
}

export async function updatePersonaInfo(data: UpdatePersonalForm) {
    const response = await api.put('/profile',data);
    return response.data;
}

export async function addHobby(data: HobbyForm) {
    const response = await api.post('/profile/hobbies',data);
    return response.data;
}

export async function addFramework(data: FrameworkForm) {
    const response = await api.post('/profile/frameworks',data);
    return response.data;
}

export async function updateFramework(data: FrameworkForm, id: string) {
    const response = await api.put(`/profile/frameworks/${id}`,data);
    return response.data;
}

export async function updateHobby(data: HobbyForm, id: string) {
    const response = await api.put(`/profile/hobbies/${id}`,data);
    return response.data;
}

export async function deleteFramework(id: string) {
    const response = await api.delete(`/profile/frameworks/${id}`);
    return response.data;
}

export async function deleteHobby(id: string) {
    const response = await api.delete(`/profile/hobbies/${id}`);
    return response.data;
}
