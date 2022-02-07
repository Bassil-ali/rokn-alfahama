import axios from 'axios';
const baseURL = `${window.location.protocol}//${window.location.host}/api`;
export default axios.create({
    baseURL,
    headers:{
        'Content-Type':'application/json',
        'locale': localStorage.getItem('locale') || 'en'
    }
});