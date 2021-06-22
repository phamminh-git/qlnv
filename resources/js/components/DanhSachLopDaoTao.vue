<template>
    <div id="lop dao tao">
        <div v-if="showDS">
            <h1>Danh sach lop dao tao</h1>
            <table class="table">
                <tr>
                    <th>STT</th>
                    <th>Ten lop</th>
                    <th>Ngay bat dau</th>
                    <th>Mo ta</th>
                    <th>#</th>
                </tr>
                <tr v-for="(lopdaotao, index) in lopdaotaos" :key="index">
                    <td>{{index+1}}</td>
                    <td>{{lopdaotao.ten}}</td>
                    <td>{{lopdaotao.ngaybatdau}}</td>
                    <td>{{lopdaotao.mota}}</td>
                    <td>
                        <a href="#" @click.prevent="editLop(index)">Sửa</a>
                        <a href="#" @click.prevent="deleteLop(lopdaotao.id, index)">Xóa</a>
                    </td>
                </tr>
            </table>
        </div>
        <a href="#" @click.prevent="show=!show; show1=true; getNhanVien(); showDS=false;editLop" v-if="!show">Thêm lớp đào tạo</a>
        <div v-if="show">
            <table  class="table">
                <tr>
                    <td><label for="ten">Nhập tên</label></td>
                    <td><input type="text" v-model="lop.ten"></td>
                </tr>
                <tr>
                    <td><label for="ngaybatdau">Nhập ngay bat dau</label></td>
                    <td><input type="date" v-model="lop.ngaybatdau"></td>
                </tr>
                <tr>
                    <td><label for="mota">Nhập mo ta</label></td>
                    <td><input type="text" v-model="lop.mota"></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                </tr>
            </table>
            <a href="#" @click.prevent="themnhanvien=true" v-if="!themnhanvien">Thêm nhân viên</a>
            <div v-if="themnhanvien">
                <h3>Danh sách nhân viên</h3>
                <table class="table">
                    <tr>
                        <th>STT</th>
                        <th>Mã NV</th>
                        <th>Tên</th>
                        <th>Giới tính</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                        <th>Email</th>
                        <th>#</th>
                    </tr>
                    <tr v-for="(nhanvien, index) in nhanviens" :key="index">
                        <td>{{index+1}}</td>
                        <td>{{nhanvien.username}}</td>
                        <td>{{nhanvien.ten}}</td>
                        <td>{{nhanvien.gioiTinh}}</td>
                        <td>{{nhanvien.diaChi}}</td>
                        <td>{{nhanvien.sdt}}</td>
                        <td>{{nhanvien.email}}</td>
                        <td><input type="checkbox" name="idnhanviens[]" v-bind:value="nhanvien.id" v-model="idnhanvien"></td>
                    </tr>
                </table>
                <div v-if="show1">
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
        </div>
        <input type="submit" value="Xác nhận" v-if="show" @click.prevent="postLopDaoTao()">
        <button @click="huy" v-if="show">Quay lại</button>
    </div>
</template>

<script>
import network from '../core/network';
export default {
    data(){
        return{
            lopdaotaos: [],
            idlop: '',
            lop: {},
            nhanviens: [],
            show: false,
            idnhanvien: [],
            currentPage: 1,
			totalPage: 0,
            show1: false,
            themnhanvien: false,
            showDS: true,
            index: ''
        }
    },
    methods:{
        getLopDaoTaos(){
            network.get('lopdaotao')
            .then(lopdaotaos=>{
                this.lopdaotaos=lopdaotaos;
            })
            .catch(errors=>{
                console.log(errors);
            }); 
        },
        getNhanVien(){
			network.get('ngaycong/diemdanh?page=' + this.currentPage)
			.then(nhanviens=>{
				this.nhanviens=nhanviens.data;
				this.totalPage=nhanviens.last_page;
			})
			.catch(errors=>{
				console.log(errors);
			});
		},
        editLop(index){
            this.lop=JSON.parse(JSON.stringify(this.lopdaotaos[index]));
            this.index=index;
            network.get('lopdaotao/'.concat(this.lop.id).concat('/getnhanvien'))
            .then(nhanviens=>{
                this.nhanviens=nhanviens;
            });
            this.show=true;
            this.show1=false;
            this.themnhanvien=true;
            this.showDS=false;
        },
        postLopDaoTao(){
            this.lop.idnhanvien=this.idnhanvien;
            this.lopdaotaos[this.index]=this.lop;
            network.post('lopdaotao', this.lop)
            .then(message=>{
                if(message.id){
                    this.lopdaotaos.push(message);
                }
            })
            .catch(errors=>{
                console.log(errors);
            });
            this.show=false;
            this.showDS=true;
            this.themnhanvien=false;
            this.lop={};
            this.idnhanvien=[];
        },
        addLopDaoTao(){
            this.show=!this.show;           
        },
        huy(){
            this.show=false;
            this.themnhanvien=false;
            this.lop={};
            this.idnhanvien=[];
            this.showDS=true;
        },
        deleteLop(id, index){
            network.get('lopdaotao/'.concat(id).concat('/delete'))
            .then(message=>{
                this.lopdaotaos.splice(index,1);          
            });
        }
    },
    mounted(){
        this.getLopDaoTaos();
        this.getNhanVien();
    },
    watch:{
		currentPage: function(){
			this.getNhanVien();
		}
	}
}
</script>
<style scoped>

</style>