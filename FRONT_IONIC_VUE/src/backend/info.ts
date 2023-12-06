import type { HobbyForm, UpdatePersonalForm, FrameworkForm } from '@/interfaces';
import api from '../services/api';

export async function getInfo() {
    const response = await api.get('/portfolio');
    return response.data[0];
}

export async function updatePersonaInfo(data: UpdatePersonalForm) {
    const response = await api.put('/portfolio',data);
    return response.data;
}

export async function addHobby(data: HobbyForm) {
    const response = await api.post('/portfolio/hobbies',data);
    return response.data;
}

export async function addFramework(data: FrameworkForm) {
    const response = await api.post('/portfolio/frameworks',data);
    return response.data;
}

export async function updateFramework(data: FrameworkForm, id: string) {
    const response = await api.put(`/portfolio/frameworks/${id}`,data);
    return response.data;
}

export async function updateHobby(data: HobbyForm, id: string) {
    const response = await api.put(`/portfolio/hobbies/${id}`,data);
    return response.data;
}

export async function deleteFramework(id: string) {
    const response = await api.delete(`/portfolio/frameworks/${id}`);
    return response.data;
}

export async function deleteHobby(id: string) {
    const response = await api.delete(`/portfolio/hobbies/${id}`);
    return response.data;
}
