import axios from 'axios';
// const baseURL = 'http://localhost/api'

//  const baseURL =process.env.URL || `${window.location.protocol}//${window.location.host}/api`;
const baseURL = 'http://127.0.0.1:80/api';
export default axios.create({
    baseURL,
    headers: {
        'Content-Type': 'application/json',
        'locale': localStorage.getItem('locale') || 'en'
    }
});