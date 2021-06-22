<template>
	<div id="tkluong">
		<table class="table">
			<tr>
				<td><label for="thangbd">Thời gian bắt đầu</label></td>
				<td>
					<select name="thang" id="thangbd" v-model="thoigian.thangbd">
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
				</td>
				<td><label for="namkt">Năm</label></td>
				<td>2021</td>
			</tr>
			<tr>
				<td><label for="thangkt">Thời gian kết thúc</label></td>
				<td>
					<select name="thang" id="thangkt" v-model="thoigian.thangkt">
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
				</td>
				<td><label for="namkt">Năm</label></td>
				<td>2021</td>
			</tr>
		</table>
		<input type="submit" value="ThongKe" @click.prevent="tkLuong">

		<hr>
		<table class="table" v-if="show1">
			<tr>
				<td>STT</td>
				<td>Ten</td>
				<td>Tong tien</td>
				<td>Chi Tiet</td>
			</tr>
			<tr v-for="(phongban, index) in phongbans" :key="index">
				<td>{{index+1}}</td>
				<td>{{phongban.ten}}</td>
				<td>{{tongTien(phongban)}}</td>
				<td><button @click.prevent="handleXem(index)">Xem</button></td>
			</tr>
		</table>
		<hr>
		<table class="table" v-if="show">
			<tr>
				<td>STT</td>
				<td>Ten Nv</td>
				<td>Tong tien</td>
				<td>Chi Tiet</td>
			</tr>
			<tr v-for="(nhanvien, index) in phongbans[indexP].nhanviens" :key="index">
				<td>{{index+1}}</td>
				<td>{{nhanvien.ten}}</td>
				<td>{{detailPhong(nhanvien)}}</td>
				<td><button @click.prevent="handleDetailNv(index)">Xem</button></td>
			</tr>
		</table>
		<hr>
		<table v-if="show2" class="table">
			<tr>
				<th>STT</th>
				<th>Ten nhan vien</th>
				<th>Thang</th>
				<th>So Tien</th>
			</tr>
			<tr v-for="(phieuluong, index) in phongbans[indexP].nhanviens[indexNv].phieuluongs" :key="index">
				<td>{{index}}</td>
				<td>{{phongbans[indexP].nhanviens[indexNv].ten}}</td>
				<td>{{formatDate(phieuluong.thang)}}</td>
				<td>{{phieuluong.tongtien}}</td>
			</tr>
		</table>
	</div>
</template>

<script>
import network from '../core/network'
export default {
	data(){
		return{
			thoigian: {},
			phongbans: [],
			indexP: '',
			indexNv: '',
			show: false,
			show2: false,
			show1: false,
		}
	},
	methods: {
		tkLuong(){
			this.thoigian.nambd=2021;
			this.thoigian.namkt=2021;
			network.get('tkluong', this.thoigian)
			.then(phongbans=>{
				this.phongbans=phongbans;
			});
			this.show1=true;
		},
		tongTien(phongban){
			var sum=0;
			phongban.nhanviens.forEach(element => {
				element.phieuluongs.forEach(e=>{
					sum=sum+e.tongtien;
				});
			});
			return sum;
		},
		handleXem(index){
			this.indexP=index;
			this.show=true;
			this.show2=false;
			// console.log(this.phongbans[this.i]);
		},
		handleDetailNv(index){
			this.indexNv=index;
			this.show2=true;
		},
		detailPhong(nhanvien){
			var sum=0;
			nhanvien.phieuluongs.forEach(element=>{
				sum+=element.tongtien;
			});
			return sum;
		},
		formatDate(date){
			var token =date.split('-');
			return token[1]+"-"+token[0];
		}
	}
}
</script>

<style scoped>

</style>