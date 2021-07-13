import axios from 'axios'

axios.defaults.baseURL = 'http://localhost:8000/';
axios.defaults.headers.common['Authorization'] = "Bearer " + localStorage.getItem('access_token');

export default axios;

// export default {
//     config: {
//         headers: { 
//             Accept: 'application/json',
//             Authorization: `Bearer ${localStorage.getItem('access_token')}` 
//         }
//     },
//     bodyParameters: {
//         key: ''
//     }
// };