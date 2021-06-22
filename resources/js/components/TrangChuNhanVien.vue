<template>
    <div id="app" v-cloak>
		<div class="container-fluid">
			<ul id="menu">
				<li><a href="#/thongtincanhan">Thong Tin Ca Nhan</a></li>
				<li><a href="#/danhsachngaycong">Xem danh sach ngay cong</a></li>
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
		position: sticky;
		top: 0;
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