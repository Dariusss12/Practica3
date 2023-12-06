export interface Info {
    id: number;
    name: string;
    lastname: string;
    email: string;
    city: string;
    country: string;
    summary: string;
    frameworks: Framework[];
    hobbies: Hobby[];
    created_at: string;
    updated_at: string;
  }