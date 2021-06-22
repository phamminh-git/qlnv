const baseUrl='http://127.0.0.1:8000/';
const axios=require('axios');
export default{
    get(url, params){
        return new Promise((resolve, reject)=>{
            axios.get(baseUrl + url, {params})
            .then((response)=>{
                resolve(response.data);
            })
            .catch(function(error){
                reject(error);
            })
        });
    },
    post(url, object){
        return new Promise((resolve, reject)=>{
            axios.post(baseUrl + url, object)
            .then((response)=>{
                resolve(response.data);
            })
            .catch(function(error){
                reject(error);
            })
        });
    }
}