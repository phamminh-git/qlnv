<template>
    <div v-cloak>
        <form action="" @submit.prevent="postData">
            <select name="thang" id="thang" v-model="thoigian.thang">
                <option value="1">Thang 1</option>
                <option value="2">Thang 2</option>
                <option value="3">Thang 3</option>
                <option value="4">Thang 4</option>
                <option value="5">Thang 5</option>
                <option value="6">Thang 6</option>
                <option value="7">Thang 7</option>
                <option value="8">Thang 8</option>
                <option value="9">Thang 9</option>
                <option value="10">Thang 10</option>
                <option value="11">Thang 11</option>
                <option value="12">Thang 12</option>
            </select>
            <select name="nam" id="nam"  v-model="thoigian.nam">
                <option v-for=" i in currentYear" :key="i"  v-if="i >= namKy" v-bind:value="i">{{i}}
                </option>
            </select>
            <input type="submit" value="Xem">
        </form>

        <table class="table">
            <tr>
                <th>STT</th>
                <th>Ngay</th>
                <th>Gio den</th>
            </tr>
            <tr v-for="(ngaycong, index) in ngaycongs" :key="index">
                <td>{{index+1}}</td>
                <td>{{ngaycong.ngay}}</td>
                <td>{{ngaycong.gioDen}}</td>
            </tr>
        </table>
    </div>
</template>

<script>
import network from '../core/network'
export default {
    data(){
        return {
            namKy: '',
            thoigian: {},
            currentYear: '',
            nhanvien: window.nhanvien,
            ngaycongs: [],
            idnhanvien: ''
        }
    }
    ,
    methods:{
        getData(){
            this.currentYear=new Date().getFullYear();
            network.get('ngayky')
            .then(nam=>{
                this.namKy=nam;
            })
            .catch(errors=>{
                console.log(errors);
            });
            // network.get('authuser')
            // .then(nhanvien=>{
            //     this.nhanvien=nhanvien;
            // })
            // .catch(errors=>{
            //     console.log(errors);
            // });
        },
        postData(){
            this.thoigian.idnhanvien=this.nhanvien.id;
            axios.post('ngaycong/getngaycong',this.thoigian)
            .then(ngaycongs=>{
                this.ngaycongs=ngaycongs.data;
            })
            .catch(errors=>{
                console.log(errors);
            });
        }
    },
    mounted(){
        this.getData();
    }
}
</script>

<style scoped>

</style>