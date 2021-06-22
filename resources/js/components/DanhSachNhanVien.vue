<template>
	<div id="quanlynhanvien">
		<div  v-if="!show &&!showGH&&!showEdit">
			<div id="title">
				<p>Danh sách nhân viên</p>
				<div>
					<input type="text" name="ten" id="" placeholder="nhap ten nhan vien" v-model="ten.ten">
					<input type="submit" value="Tim kiem" @click.prevent="handleSearch">
				</div>
			</div>
			<table class="table table-striped">
				<tr>
					<th scope="col">STT</th>
					<th scope="col">Mã NV</th>
					<th scope="col">Tên nhân viên</th>
					<th scope="col">Ngày sinh</th>
					<th scope="col">Địa chỉ</th>
					<th scope="col">Email</th>
					<th scope="col">Phòng</th>
					<th scope="col">Vị trí</th>
					<th scope="col">Trạng thái</th>
					<th scope="col">#</th>
				</tr>
				<tr v-for="(nhanvien, index) in nhanviens" :key="index">
					<th scope="row">{{index + 1}}</th>
					<td class="nhanvien" @click.prevent="detailNhanVien(index)">{{nhanvien.username}}</td>
					<td>{{nhanvien.ten}}</td>
					<td>{{nhanvien.ngaySinh}}</td>
					<td>{{nhanvien.diaChi}}</td>
					<td>{{nhanvien.email}}</td>
					<td>{{nhanvien.phongban.ten}}</td>
					<td>{{nhanvien.vaiTro}}</td>
					<td>{{check(nhanvien.hopdongs[0].ngayHetHan)}}</td>
					<td>
						<div v-if="check(nhanvien.hopdongs[0].ngayHetHan)=='Hết hợp đồng'">
							<button  @click.prevent="deleteNhanVien(nhanvien.id,index)">Xoa</button>
							<button  @click.prevent="giaHan(nhanvien.id,index)">Gia hạn hợp đồng</button>
						</div>
						

						<button @click.prevent="editNhanVien(index)">Sửa</button>
					</td>
				</tr>
			</table>
			<div>
				<!-- <a href="#" v-for="pageNumber in totalPage" :key="pageNumber" @click="currentPage=PageNumber">{{pageNumber}}</a> -->
				<nav aria-label="Page navigation example">
					<ul class="pagination">
						<li class="page-item"><a href="#" class="page-link" @click.prevent="currentPage=currentPage-1">
							Previous
						</a></li>
						<li class="page-item" v-for="pageNumber in totalPage" :key="pageNumber" :class="{active:currentPage==pageNumber}">
							<a href="#" class="page-link" @click.prevent="currentPage=pageNumber"> {{pageNumber}}</a>
						</li>
						<li class="page-item"><a href="#" @click.prevent="currentPage=currentPage+1" class="page-link">Next</a></li>
					</ul>
				</nav>
				<!-- <paginate :page-count="totalPage" :click-hanler="changePage" :prev-text="'Prev'" :next-text="'next'" :container-class="'className'"></paginate> -->
			</div>
		</div>

		<div class="container" >
			<div v-if="show&&!showGH&&!showEdit">
				<a href="#" @click.prevent="show=!show">Quay lại</a>
				<div id="profile" class="row">
						<div class="col-10">
							<h3>Thông tin nhân viên</h3>
							<table class="table" >
								<tr>
									<th>Mã nhân viên</th>
									<td>{{nhanvien.username}}</td>
								</tr>
								<tr>
									<th>Tên nhân viên</th>
									<td>{{nhanvien.ten}}</td>
								</tr>
								<tr>
									<th>Ngày sinh</th>
									<td>{{nhanvien.ngaySinh}}</td>
								</tr>
								<tr>
									<th>Địa chỉ</th>
									<td>{{nhanvien.diaChi}}</td>
								</tr>
								<tr>
									<th>Số điện thoại</th>
									<td>{{nhanvien.sdt}}</td>
								</tr>
								<tr>
									<th>Email</th>
									<td>{{nhanvien.email}}</td>
								</tr>
								<tr>
									<th>Phòng</th>
									<td>{{tenphong}}</td>
								</tr>
								<tr>
									<th>Vị trí</th>
									<td>{{nhanvien.vaiTro}}</td>
								</tr>
								<tr>
									<th>Lương</th>
									<td>{{luong}}</td>
								</tr>
								<tr>
									<th>Ngày ký hợp đồng</th>
									<td>{{ngayKy}}</td>
								</tr>
								<tr>
									<th>Ngày hết hạn hợp đồng</th>
									<td>{{ngayHetHan}}</td>
								</tr>
							</table>
						</div>
						<div class="col-2">
							<h3>Ảnh</h3>
							<img :src="nhanvien.avatar" class="" alt="...">
						</div>
			</div>

			</div>
			<form action="" enctype="multipart/form-data" @submit.prevent="postNhanVien()" v-if="showEdit&&!show&&!showGH">
				<a @click.prevent="showEdit=false; show=false" href="#">Quay lại</a>
				<table class="table">
					<tr>
						<td><label for="tennhanvien">Nhập nhân viên</label></td>
						<td><input type="text" v-model="nhanvienedit.ten" id="tennhanvien"></td>
					</tr>
					<tr>
						<td><label for="ngaysinh">Nhập ngày sinh</label></td>
						<td><input type="date" v-model="nhanvienedit.ngaySinh" id="ngaysinh"></td>
					</tr>
					<tr>
						<td><label for="gioitinh">Nhập giới tính</label></td>
						<td><input type="radio" v-model="nhanvienedit.gioiTinh" name="gioitinh" value="nam"> Nam
							<input type="radio" v-model="nhanvienedit.gioiTinh" name="gioitinh" value="nu"> Nu
						</td>
					</tr>
					<tr>
						<td><label for="diachi">Nhập địa chỉ</label></td>
						<td><input type="text" v-model="nhanvienedit.diaChi" id="diachi"></td>
					</tr>
					<tr>
						<td><label for="email">Nhập email</label></td>
						<td><input type="email" v-model="nhanvienedit.email" id="email"></td>
					</tr>
					<tr>
						<td><label for="sdt">Nhập số điện thoại</label></td>
						<td><input type="text" v-model="nhanvienedit.sdt" id="sdt"></td>
					</tr>
					<tr>
						<td></td>
						<td><input type="submit" value="Cập nhật"></td>
					</tr>
				</table>
			</form>

			<div class="giaHan" v-if="!show&&showGH&&!showEdit">
				<a href="#" @click.prevent="showGH=false; show=false">Quay lai</a>
				<table class="table">
					<tr>
						<td><label for="ngayky">Nhập ngày ký</label></td>
						<td><input type="date" v-model="hopdong.ngayKy" id="ngayky"></td>
					</tr>
					<tr>
						<td><label for="ngayHetHan">Nhập ngày hết hạn</label></td>
						<td><input type="date" v-model="hopdong.ngayHetHan"></td>
					</tr>
					<tr>
						<td><label for="luong">Nhập lương</label></td>
						<td><input type="number" v-model="hopdong.luong"></td>
					</tr>
					<tr>
						<td><label for="phucap">Them phu cap</label></td>
						<td>
							<table>
								<tr v-for="(phucap,index) in phucaps" :key="index">
									<td><label for="" >{{phucap.ten}}</label></td>
									<td><input  type="checkbox" name="phucap[]" v-bind:value="phucap.id" v-model="idphucap"></td>
								</tr>
							</table>
							
						</td>
					</tr>
					<tr>
						<td></td>
						<td><button @click.prevent="postHDGH">Gia hạn</button></td>
					</tr>
				</table>
				<div>{{message}}</div>
			</div>
		</div>
	</div>
</template>

<script>
import network from '../core/network'
export default {
	data(){
		return {
			nhanviens: [],
			ten: {ten: ''},
			nhanvien: {},
			tenphong: '',
			luong: '',
			ngayKy: '',
			ngayHetHan: '',
			show: false,
			index: '',
			nhanvienedit: {},
			showEdit: false,
			currentPage: 1,
			totalPage: 0,
			showGH: false,
			hopdong: {},
			phucaps: [],
			idphucap: [],
			message: ''
		}
	},
	methods:{
		changePage: function(page){
			this.currentPage=page;
			this.getPosts();
		},
		getNhanVien(){
			network.get('nhanvien?page=' + this.currentPage)
			.then(nhanviens=>{
				// console.log(nhanviens);
				this.nhanviens=nhanviens.data;
				this.totalPage=nhanviens.last_page;
			})
			.catch(errors=>{
				console.log(errors);
			});
		},
		handleSearch(){
			this.ten.page=this.currentPage;
			network.get('nhanvien/search', this.ten)
			.then(nhanviens=>{
				this.nhanviens=nhanviens.data;
				this.totalPage=nhanviens.last_page;
			})
			.catch(errors=>{
				console.log(errors);
			});
		},
		check(date){
			var s1=new Date(date).getTime();
			var today=new Date();
			var s2=new Date(today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate()).getTime();
			if(s1>=s2){
				return 'Đang làm việc';
			}
			else{
				return "Hết hợp đồng";
			}
		},
		deleteNhanVien(id,index){
			network.get('nhanvien/'.concat(id).concat('/delete'))
			.then(message=>{
				if(message){  
				}
			});
			this.nhanviens.splice(index);
		},
		detailNhanVien(index){
			this.nhanvien=this.nhanviens[index];
			this.tenphong=this.nhanvien.phongban.ten;
			this.luong=this.nhanvien.hopdongs[0].luong.mucluong;
			this.ngayKy=this.nhanvien.hopdongs[0].ngayKy;
			this.ngayHetHan=this.nhanvien.hopdongs[0].ngayHetHan;
			this.show=true;
			this.showGH=false;
			this.showEdit=false;
		},
		editNhanVien(index){
			this.index=index;
			this.nhanvienedit=JSON.parse(JSON.stringify(this.nhanviens[index]));
			this.showEdit=true;
			this.show=false;
			this.showGH=false;
		},
		postNhanVien(){
			this.nhanviens[this.index]=this.nhanvienedit;
			network.post('nhanvien', this.nhanvienedit)
			.then(message=>{
				console.log(message);
			});
			this.showEdit=false;
		},
		giaHan(id, index){
			console.log('abc');
			this.showGH=true;
			this.show=false;
			this.showEdit=false;
			this.hopdong.idnhanvien=id;
			this.message='';
			console.log(this.checkdk(!this.show, this.showGH));
		},
		postHDGH(){
			this.hopdong.idphucap=this.idphucap;
			console.log(this.hopdong);
			network.post('hopdong/giahan', this.hopdong)
			.then(message=>{
				this.message=message;
			});
		}
	},
	mounted(){
		this.getNhanVien();
		network.get('phucap')
		.then(phucaps=>{
			this.phucaps=phucaps;
		});
	},
	watch:{
		currentPage: function(){
			this.handleSearch();
		}
	}
}
</script>

<style scoped>
	#title{
		display: flex;
		justify-content: space-between;
	}
	.nhanvien{
		cursor: pointer;
		color: blue;
	}
	img{
		height: 200px;
		width: 200px;
	}
	p{
		font-weight: bold;
	}
</style>