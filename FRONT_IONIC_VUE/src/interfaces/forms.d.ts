export interface UpdatePersonalForm {
    name: string | null;
    lastname: string | null;
    email: string | null;
    city: string | null;
    country: string | null;
    summary: string | null;
};

export interface HobbyForm{
    name: string | null;
    description: string | null;
}

export interface FrameworkForm{
    name: string | null;
    level: string | null;
    year: string | null;
}