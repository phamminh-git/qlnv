<template>
    <div id="phongban">
        <h1>Danh sach phong ban</h1>
        <table class="table">
            <tr>
                <th>STT</th>
                <th>Ten phong</th>
                <th>Xem</th>
                <th>#</th>
            </tr>
            <tr v-for="(phongban, index) in phongbans" :key="index">
                <td>{{index+1}}</td>
                <td>{{phongban.ten}}</td>
                <td><a href="#" @click.prevent="dsNhanVien(phongban.id)">danh sach nhan vien</a></td>
                <td>
                    <button @click.prevent="editPhong(index)" >Sua</button>
                    <button @click.prevent="deletePhong(phongban.id, index)">Xoa</button>
                </td>
            </tr>
        </table>
        <a href="" v-if="!show" @click.prevent="createPhong()">Them phong ban</a>
        <table v-if="show" class="table">
            <tr>
                <td><label for="ten">Nhập tên</label></td>
                <td><input type="text" v-model="phongedit.ten"></td>
            </tr>
            <tr>
                <td><button @click.prevent="clickQuayLai">Quay Lại</button></td>
                <td><input type="submit" value="Them" @click.prevent="postPhongBan()"></td>
            </tr>
        </table>  
        <div  v-if="show1">
            <h3>Danh sách nhân viên</h3>
            <table class="table table-striped">
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Ten nhan vien</th>
                    <th scope="col">Ngày sinh</th>
                    <th scope="col">Địa chỉ</th>
                    <th scope="col">Email</th>
                    <th scope="col">Vị trí</th>
                </tr>
                <tr v-for="(nhanvien, index) in nhanviens" :key="index">
                    <th scope="row">{{index + 1}}</th>
                    <td class="nhanvien">{{nhanvien.ten}}</td>
                    <td>{{nhanvien.ngaySinh}}</td>
                    <td>{{nhanvien.diaChi}}</td>
                    <td>{{nhanvien.email}}</td>
                    <td>{{nhanvien.vaiTro}}</td>
                </tr>
            </table>
            <a href="#" @click.prevent="show1=false">Quay lại</a>
        </div>
    </div>
</template>

<script>
import network from '../core/network';
export default {
    data(){
        return{
            phongbans: [],
            idphong: '',
            phongedit: {},
            show: false,
            index: '',
            nhanviens: [],
            show1: false
        }
    },
    methods:{
        getPhongBans(){
            network.get('phong')
            .then(phongs=>{
                this.phongbans=phongs;
            })
            .catch(errors=>{
                console.log(errors);
            });
        },
        deletePhong(id, index){
            network.get('phong/'.concat(id).concat('/delete'))
            .then(message=>{
                if(message){
                    this.phongbans.splice(index,1);
                }
            });
        },
        editPhong(index){
            this.index=index;
            this.phongedit=JSON.parse(JSON.stringify(this.phongbans[index]));
            this.show=true;
        },
        createPhong(){
            this.phongedit={};
            this.show=true;
            this.show1=false;
        },
        postPhongBan(){
            this.phongbans[this.index]=this.phongedit;
            network.post('phong', this.phongedit)
            .then(message=>{
                if(message.id){
                    this.phongbans.push(message);
                }
            })
            .catch(errors=>{
                console.log(errors);
            });
            this.show=false;
        },
        clickQuayLai(){
           this.phongedit={};
           this.show=false; 
        },
        dsNhanVien(id){
            this.show1=true;
            network.get('phong/'+id+'/getnhanvien')
            .then(nhanviens=>{
                console.log(nhanviens);
                this.nhanviens=nhanviens;
            });
        }
    },
    mounted(){
        this.getPhongBans();
    }
}
</script>
<style scoped>
</style>