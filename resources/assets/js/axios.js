import axios from 'axios';

const instance = axios.create({
    baseURL: 'http://hotelbooking.local/api/',
});

export default instance;