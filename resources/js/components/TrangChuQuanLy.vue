<template>
    <div id="app" v-cloak>
		<div class="container-fluid">
			<ul id="menu">
				<!-- <li><router-link :to="{name: 'danh sach phong ban'}">Quan Ly Phong Ban</router-link></li>
				<li><router-link :to="{name: 'them phong ban'}">Them Phong Ban</router-link></li>
				<li><router-link :to="{name: 'danh sach lop dao tao'}" >Quan Ly Lop Dao Tao</router-link></li>
				<li><router-link :to="{name: 'them lop dao tao'}" >Them Lop Dao Tao</router-link></li>
				<li><router-link :to="{name: 'them hop dong'}" >Them Hop Dong</router-link></li>
				<li><router-link :to="{name: 'danh sach nhan vien'}" >Danh sach nhan vien</router-link></li> -->
				<li><a href="#/danhsachphongban">QL Phòng</a></li>
				<li>
					<a href="#/danhsachlopdaotao">QL lớp ĐT</a>
				</li>
				<li><a href="#/themhopdong">Thêm hợp đồng</a></li>
				<li><a href="#/danhsachnhanvien">QL nhân viên</a></li>
				<li><a href="#/diemdanh">Diem Danh</a></li>
				<li><a href="#/thongtincanhan">TTCN</a></li>
				<li><a href="#/danhsachngaycong">DS ngày công</a></li>
				<li><a href="#/thongkeluong">TK lương</a></li>
			</ul>
			<div style="margin: 50px">
				<router-view></router-view>
			</div>
		</div>
  </div>
</template>
<script>
export default {
    
}
</script>

<style scoped>
	*{
		list-style-type: none;
		box-sizing: border-box;
	}
	a{
		text-decoration: none;
	}
	li{
		list-style: none;
	}
	ul#menu{
		background-color: #008080;
		height: 50px;
		text-align: center;
	}
	ul#menu > li{
		display: inline-block;
	}
	ul#menu>li>a{
		color: white;
		display: inline-block;
		height: 50px;
		line-height: 50px;
		padding: 0px 40px;
	}
	ul#menu>li:hover>a{
		background-color: #008000;
	}
</style>