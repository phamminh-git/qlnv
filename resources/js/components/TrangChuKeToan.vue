<template>
    <div id="app" v-cloak>
		<div class="container-fluid">
			<ul id="menu">
				<li><a href="#/danhsachphucap">Danh sách phụ cấp</a></li>
				<li><a href="#/danhsachthuongphat">Danh sách thưởng phạt</a></li>
				<li><a href="#/thongtincanhan">Thông tin cá nhân</a></li>
				<li><a href="#/danhsachngaycong">DS ngày công</a></li>
				<li><a href="#/tinhluong">Tính lương</a></li>
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
		padding: 0px 50px;
	}
	ul#menu>li:hover>a{
		background-color: #008000;
	}
</style>