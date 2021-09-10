// let peopleCounting = {
//     smallBox:{
//         sBox:null,
//         option:null,
//         init:function(el,option){
//             this.sBox = new _AdminLTE_SmallBox(el);
//             this.sBox.update(option);
//         }
//     }
// }

let monitorSuhu = {
    liveChart:{
        addData:function(){
            this.ctx.addData('kancut 01',100);
        },
        chartNya:function(){
            this.ctx = new _liveChart('crot');
            this.ctx.init({
                label:"kancut chart",
                data:[12, 19, 3, 5, 50],
                dataLabel:['Sensor 01', 'Sensor 02', 'Sensor 03', 'Sensor 04', 'Sensor 05']
            });
            return this.ctx;
            // console.log(myChart.myChart);
        },
        init:function(){
            this.chartNya();
        }
    }
}
