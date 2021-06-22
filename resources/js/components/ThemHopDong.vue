<template>
	<div id="themhopdong">
		<div class="container">
			<form action="" enctype="multipart/form-data" @submit.prevent="postHopDong()">
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
						<td><label for="tennhanvien">Nhập nhân viên</label></td>
						<td><input type="text" v-model="hopdong.ten" id="tennhanvien"></td>
					</tr>
					<tr>
						<td><label for="ngaysinh">Nhập ngày sinh</label></td>
						<td><input type="date" v-model="hopdong.ngaySinh" id="ngaysinh"></td>
					</tr>
					<tr>
						<td><label for="gioitinh">Nhập giới tính</label></td>
						<td><input type="radio" v-model="hopdong.gioiTinh" name="gioitinh" value="nam"> Nam
							<input type="radio" v-model="hopdong.gioiTinh" name="gioitinh" value="nu"> Nu
						</td>
					</tr>
					<tr>
						<td><label for="diachi">Nhập địa chỉ</label></td>
						<td><input type="text" v-model="hopdong.diaChi" id="diachi"></td>
					</tr>
					<tr>
						<td><label for="email">Nhập email</label></td>
						<td><input type="email" v-model="hopdong.email" id="email"></td>
					</tr>
					<tr>
						<td><label for="sdt">Nhập số điện thoại</label></td>
						<td><input type="text" v-model="hopdong.sdt" id="sdt"></td>
					</tr>
					<tr>
						<td><label for="vaitro">Nhập chức vụ</label></td>
						<td>
							<input type="radio" v-model="hopdong.vaiTro" value="nhan vien" name="vitri"> nhan vien
							<input type="radio" v-model="hopdong.vaiTro" value="truong phong" name="vitri"> truong phong
						</td>
					</tr>
					<tr>
						<td><label>Nhập phòng</label></td>
						<td>
							<span v-for="(phongban,index) in phongbans" :key="index">
								<input type="radio" :value="phongban.id" v-model="hopdong.idphongban">{{phongban.ten}}
							</span>                
						</td>
					</tr>
					<tr>
						<td><label for="avatar">Thêm ảnh</label></td>
						<td><input type="file"  id="avatar" ref="file" v-on:change="onFileChange"></td>
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
						<td><input type="submit" value="Them"></td>
					</tr>
				</table>
			</form>
			<div>{{message}}</div>
		</div>
	</div>
</template>

<script>
import network from '../core/network'
export default {
	data(){
		return{
			hopdong: {},
			phucaps: {},
			idphucap: new Array,
			message: '',
			file: '',
			phongbans: []
		}
	},
	methods:{
		getPhuCap(){
			network.get('phucap')
			.then(phucaps=>{
				this.phucaps=phucaps;
			})
			.catch(errors=>{
				console.log(errors);
			});
		},
		postHopDong(){
			this.hopdong.avatar=this.file;
			this.hopdong.idphucap=this.idphucap;
			const config = {
					headers: {
						'content-type': 'multipart/form-data',
						'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
					}
				}
			let formData = new FormData();
			formData.append('ngayKy', this.hopdong.ngayKy);
			formData.append('ngayHetHan', this.hopdong.ngayHetHan);
			formData.append('ten', this.hopdong.ten);
			formData.append('ngaySinh', this.hopdong.ngaySinh);
			formData.append('gioiTinh', this.hopdong.gioiTinh);
			formData.append('diaChi', this.hopdong.diaChi);
			formData.append('email', this.hopdong.email);
			formData.append('sdt', this.hopdong.sdt);
			formData.append('vaiTro', this.hopdong.vaiTro);
			formData.append('avatar', this.hopdong.avatar);
			formData.append('luong', this.hopdong.luong);
			formData.append('idphucap[]', this.hopdong.idphucap);
			formData.append('idphongban', this.hopdong.idphongban);
			network.post('hopdong/create', formData, config)
			.then(message=>{
				this.message=message;
			})
			.catch(errors=>{
				console.log(errors);
			});
		},
		onFileChange(e){
			this.file = e.target.files[0];
		},
		getPhongBan(){
			network.get('phong')
			.then(phongbans=>{
				this.phongbans=phongbans;
			})
			.catch(errors=>{

			});
		}
	},
	mounted(){
		this.getPhuCap();
		this.getPhongBan();
	}
}
</script>

<style scoped>

</style>