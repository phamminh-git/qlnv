<template>
    <div class="container">
        <form action="">
            <label for="thang">Nhập tháng</label>
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
            <button @click.prevent="tinhLuong">Xem</button>
        </form>
        <div v-if="!show1">{{message}}</div>
        <table class="table" v-if="show1">
            <tr>
                <th>STT</th>
                <th>Mã NV</th>
                <th>Tên NV</th>
                <th>Phòng ban</th>
                <th>Chức vụ</th>
                <th>Tổng tiền</th>
            </tr>
            <tr v-for="(phieuluong, index) in phieuluongs" :key="index">
                <td>{{index+1}}</td>
                <td>{{phieuluong.nhanvien.ten}}</td>
                <td>{{phieuluong.nhanvien.username}}</td>
                <td>{{phieuluong.nhanvien.phongban.ten}}</td>
                <td>{{phieuluong.nhanvien.vaiTro}}</td>
                <td><a href="#" @click.prevent="detailPhieuLuong(index)">{{phieuluong.tongtien}}</a></td>
            </tr>
        </table>
        <div v-if="show">
            <a href="#" @click.prevent="show=false">Quay lại</a>
            <table  class="table">
                <tr>
                    <th>Tên</th>
                    <th>Số tiền</th>
                </tr>
                <tr>
                    <th>Lương cơ bản</th>
                    <td>{{phieuluong.nhanvien.hopdongs[0].luong.mucluong}}</td>
                </tr>
                <tr v-for="(phucap, index) in phieuluong.nhanvien.hopdongs[0].phucaps" :key="index">
                    <th>{{phucap.ten}}</th>
                    <td>{{phucap.pivot.mucphucap}}</td>
                </tr>
                <tr v-if="phieuluong.nhanvien.songaycong<23">
                    <th>Trừ</th>
                    <td>-{{phieuluong.thuongphats[0].mucThuongPhat}}</td>
                </tr>
            </table>
        </div>
    </div>
</template>

<script>
import network from '../core/network'
export default {
    data(){
        return {
            thoigian:{},
            phieuluongs: [],
            phieuluong: {},
            show: false,
            show1: false,
            message: ''
        }
    },
    methods:{
        // getPhieuLuong(){
        //     network.get('phieuluong')
        //     .then(phieuluongs=>{
        //         this.phieuluongs=phieuluongs;
        //     })
        // },
        detailPhieuLuong(index){
            this.show=true;
            this.phieuluong=this.phieuluongs[index];
        },
        tinhLuong(){
            this.show1=false;
            network.get('phieuluong', this.thoigian)
            .then(data=>{
                if(data=='Chưa tính được lương'){
                    this.message=data;
                }
                else{
                    this.phieuluongs=data;
                    this.show1=true;
                }
            });
        }
    },
    mounted(){
        // this.getPhieuLuong();
    }
}
</script>

<style scoped>

</style>