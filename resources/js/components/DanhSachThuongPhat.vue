<template>
    <div id="thuongphat">
        <h1>Danh sach thuong phat</h1>
        <table class="table">
            <tr>
                <th>STT</th>
                <th>Ten</th>
                <th>Loai</th>
                <th>Muc tiền</th>
                <th>#</th>
            </tr>
            <tr v-for="(thuongphat, index) in thuongphats" :key="index">
                <td>{{index+1}}</td>
                <td>{{thuongphat.ten}}</td>
                <td v-if="thuongphat.loai==1">Thuong</td>
                <td v-if="thuongphat.loai==0">Phat</td>
                <td>{{thuongphat.mucThuongPhat}}</td>
                <td>
                    <button @click.prevent="editThuongPhat(index)">Sửa</button>
                    <button @click.prevent="deleteThuongPhat(thuongphat.id, index)">Xóa</button>    
                </td>
            </tr>
        </table>
        <a href="#" @click.prevent="show=!show" v-if="!show">Thêm</a>
        <div v-if="show">
            <h3>Thêm chính sách</h3>
            <table class="table">
                <tr>
                    <td><label for="ten">Nhập tên</label></td>
                    <td><input type="text" v-model="thuongphat.ten"></td>
                </tr>
                <tr>
                    <td><label for="ten">Nhập loai</label></td>
                    <td><input type="radio" v-model="thuongphat.loai" name="loai" value="1" id="thuong"> <label for="thuong">Thưởng</label>
                        <input type="radio" v-model="thuongphat.loai" name="loai" value="0" id="phat"> <label for="phat">Phạt</label>
                    </td>
                </tr>
                <tr>
                    <td><label for="ten">Nhập so tien</label></td>
                    <td><input type="text" v-model="thuongphat.mucThuongPhat"></td>
                </tr>
                <tr>
                    <td><button @click.prevent="show=false">Tro ve</button></td>
                    <td><button @click.prevent="postthuongphat()">Them</button></td>
                </tr>
        </table>  
        </div>
    </div>
</template>

<script>
import network from '../core/network';
export default {
    data(){
        return{
            thuongphats: [],
            thuongphat: {},
            show: false, 
            index: ''
        }
    },
    methods:{
        getthuongphats(){
            network.get('thuongphat')
            .then(thuongphats=>{
                this.thuongphats=thuongphats;
            })
            .catch(errors=>{
                console.log(errors);
            });
        },
        postthuongphat(){
            this.thuongphats[this.index]=this.thuongphat;
            network.post('thuongphat', this.thuongphat)
            .then(thuongphat=>{
                if(thuongphat!='thanh cong'){
                    this.thuongphats.push(thuongphat);
                }
            })
            .catch(errors=>{
                console.log(errors);
            });
            this.show=false;
            this.thuongphat={}
        },
        editThuongPhat(index){
            this.index=index;
            this.thuongphat=JSON.parse(JSON.stringify(this.thuongphats[index]));
            this.show=true;
        },
        deleteThuongPhat(id, index){
            network.get('thuongphat/'.concat(id).concat('/delete'))
            .then(message=>{
                this.thuongphats.splice(index,1);
            });
        }
    },
    mounted(){
        this.getthuongphats();
    }
}
</script>
<style scoped>

</style>