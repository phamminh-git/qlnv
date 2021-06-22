import DanhSachLopDaoTao from './components/DanhSachLopDaoTao'
import DanhSachPhongBan from './components/DanhSachPhongBan'
import ThemHopDong from './components/ThemHopDong'
import DanhSachNhanVien from './components/DanhSachNhanVien'
import DanhSachPhuCap from './components/DanhSachPhuCap'
import ThongTinCaNhan from './components/ThongTinCaNhan'
import DanhSachNgayCong from './components/DanhSachNgayCong'
import DanhSachThuongPhat from './components/DanhSachThuongPhat'
import ThongKeLuong from './components/ThongKeLuong'
import DiemDanh from './components/DiemDanh'
import TinhLuong from './components/TinhLuong'
const routes=[
	{path: '/danhsachphongban', 
	component: DanhSachPhongBan, 
	name: 'danh sach phong ban'},
	{path: '/danhsachlopdaotao', 
	component: DanhSachLopDaoTao, 
	name: 'danh sach lop dao tao'},
	{path: '/themhopdong',
	component: ThemHopDong,
	name: 'them hop dong'
	},
	{path: '/danhsachnhanvien',
	component: DanhSachNhanVien,
	name: 'danh sach nhan vien'
	},
	{path: '/danhsachphucap',
	component: DanhSachPhuCap,
	name: 'danh sach phu cap'
	},
	{
	path: '/thongtincanhan',
	component: ThongTinCaNhan,
	name: 'thong tin ca nhan'
	},
	{
		path: '/danhsachngaycong',
		component: DanhSachNgayCong,
		name: 'danh sach ngay cong'
	},
	{
		path: '/danhsachthuongphat',
		component: DanhSachThuongPhat,
		name: 'danh sach thuong phat'
	},
	{
		path: '/thongkeluong',
		component: ThongKeLuong,
		name: 'thong ke luong'
	},
	{
		path: '/diemdanh',
		component: DiemDanh,
		name: 'diem danh'
	},
	{
		path: '/tinhluong',
		component: TinhLuong,
		name: 'tinh luong'
	}
];

export default routes;