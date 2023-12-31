import { defineStore } from 'pinia';
import { User, Song, StoreUser, DecodedToken, Playlist} from '@/interfaces';
import router from '@/router';
import jwtDecode from "jwt-decode";

export const useMainStore = defineStore({
    id: 'main',

    state: (): {
        user: User | null;
        token: string;
        mySongs: Song[];
        myPlaylists: Playlist[];
        systemSongs: Song[];
        systemPlaylists: Playlist[];
    } => ({
        user: null,
        token: "",
        mySongs: [],
        myPlaylists: [],
        systemSongs: [],
        systemPlaylists: [],
    }),

    actions: {
        loginUser(data: StoreUser) {
            this.user = data.user;
            this.token = data.token;
            router.push('/');
        },

        logoutUser() {
            this.user = null;
            this.token = "";
            this.mySongs = [];
            this.myPlaylists = [];
            router.push('/');
        },
        verifyTokenValidity() {
            if (!this.token) {
                return false;
            }
    
            const decodedToken: DecodedToken = jwtDecode(this.token);
    
            // Si el token ha expirado
            if (decodedToken.exp * 1000 < Date.now()) {
                this.logoutUser();
                return false;
            }
    
            return true;
        },
        
        loadMySongs(songs: Song[]) {
            this.mySongs = songs;
        },
        loadSongs(songs: Song[]) {
            this.systemSongs = songs;
        },
        addSystemSong(song: Song) {
            this.systemSongs.push(song);
            this.mySongs.push(song);
        },
        clearSystemSongs() {
            this.systemSongs = [];
        },
        clearMySongs() {
            this.mySongs = [];
        },
        deleteSystemSong(song: Song) {
            this.systemSongs = this.systemSongs.filter(s => s.id !== song.id);
            this.mySongs = this.mySongs.filter(s => s.id !== song.id);
        },
        loadMyPlaylists(playlists: Playlist[]) {
            this.myPlaylists = playlists;
        },
        loadSystemPlaylists(playlists: Playlist[]) {
            this.systemPlaylists = playlists;
        },
        clearMyPlaylists() {
            this.myPlaylists = [];
        }
    },
    persist: true
});