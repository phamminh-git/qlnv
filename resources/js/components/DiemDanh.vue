<template>
    <div>
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
                    <th scope="col">Ten nhan vien</th>
                    <th scope="col">Ngày sinh</th>
                    <th scope="col">Địa chỉ</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phòng</th>
                    <th scope="col">Vị trí</th>
                    <th scope="col">#</th>
                </tr>
                <tr v-for="(nhanvien, index) in nhanviens" :key="index">
                    <th scope="row">{{index + 1}}</th>
                    <td >{{nhanvien.ten}}</td>
                    <td>{{nhanvien.ngaySinh}}</td>
                    <td>{{nhanvien.diaChi}}</td>
                    <td>{{nhanvien.email}}</td>
                    <td>{{nhanvien.phongban.ten}}</td>
                    <td>{{nhanvien.vaiTro}}</td>
                    <td><input type="checkbox" name="idnhanvien" id="" v-model="idnhanviens" :value="nhanvien.id"></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><button @click.prevent="postNhanVien()">Điểm danh</button></td>
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
</template>

<script>
import network from '../core/network'
export default {
    data(){
        return{
            nhanviens: [],
            idnhanviens: new Array(),
            indexNhanVien: [],
            idnhanvien: {},
            currentPage: 1,
            totalPage: 0,
            ten: {}
        }
    },
    methods:{
        getNhanViens(){
            this.currentPage=1;
            network.get('ngaycong/diemdanh?page='+this.currentPage)
            .then(nhanviens=>{
                this.nhanviens=nhanviens.data;
                this.totalPage=nhanviens.last_page;
            })
            .catch(errors=>{
                console.log(errors);
            })
        },
        postNhanVien(){
            this.idnhanvien.idnhanvien=this.idnhanviens;
            network.post('ngaycong/diemdanh', this.idnhanvien)
            .then(message=>{
            });
            this.idnhanviens=[];
            this.getNhanViens();
        },
        handleSearch(){
            this.ten.page=this.currentPage;
            network.get('ngaycong/searchnhanvien', this.ten)
            .then(nhanviens=>{
                this.nhanviens=nhanviens.data;
                this.totalPage=nhanviens.last_page;
            });
        }
    },
    mounted(){
        this.getNhanViens();
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
    p{
        font-weight: bold;
    }
</style>