import axios from "axios";

const apiClient = axios.create({
    baseURL:'/api/admin',
    headers:{
        "Content-Type": "application/json"
    }
});

export default {
    getProducts(){
        return apiClient.get('/product');
    }
};