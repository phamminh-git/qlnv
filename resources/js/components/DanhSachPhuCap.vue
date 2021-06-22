<template>
    <div id="phucap">
        <h1>Danh sach phu cap</h1>
        <table class="table">
            <tr>
                <th>STT</th>
                <th>Ten</th>
                <th>Muc phu cap</th>
                <th>Chức năng</th>
            </tr>
            <tr v-for="(phucap, index) in phucaps" :key="index">
                <td>{{index+1}}</td>
                <td>{{phucap.ten}}</td>
                <td>{{phucap.mucphucap}}</td>
                <td>
                    <button @click.prevent="deletePhuCap(index)">Xóa</button>
                    <button @click.prevent="editPhuCap(index)">Sửa</button>
                </td>
            </tr>
        </table>
        <a href="#" @click.prevent="show=!show" v-if="!show">Thêm phụ cấp</a>
        <div v-if="show">
            <h3>Thêm phụ cấp</h3>
            <table class="table">
                <tr>
                    <td><label for="ten">Nhập tên</label></td>
                    <td><input type="text" v-model="phucap.ten"></td>
                </tr>
                <tr>
                    <td><label for="ten">Nhập so tien</label></td>
                    <td><input type="number" v-model="phucap.mucphucap"></td>
                </tr>
                <tr>
                    <td><button @click.prevent="show=false">Tro ve</button></td>
                    <td><button @click.prevent="postphucap()">Them</button></td>
                </tr>
            </table>
            
            
        </div>
    </div>
</template>

<script>
import network from '../core/network';
export default {
    data(){
        return{
            phucaps: [],
            phucap: {},
            show: false,
            index: ''
        }
    },
    methods:{
        getphucaps(){
            network.get('phucap')
            .then(phongs=>{
                this.phucaps=phongs;
            })
            .catch(errors=>{
                console.log(errors);
            });
        },
        postphucap(){
            this.phucaps[this.index]=this.phucap;
            network.post('phucap', this.phucap)
            .then(phucap=>{
                if(phucap!='thanh cong'){
                    this.phucaps.push(phucap);
                }
            })
            .catch(errors=>{
                console.log(errors);
            });
            this.show=!this.show;
            this.phucap={};
        },
        editPhuCap(index){
            this.index=index;
            this.phucap=JSON.parse(JSON.stringify(this.phucaps[index]));
            this.show=true;
        },
        deletePhuCap(index){
            network.get('phucap/'+this.phucaps[index].id+ '/delete');
            this.phucaps.splice(index,1);
        }
    },
    mounted(){
        this.getphucaps();
    }
}
</script>
<style scoped>

</style>