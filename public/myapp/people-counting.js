let peopleCounting = {
    card:{
        el:null,
        init:function(option){
            let myInfoBox = new _AdminLTE_InfoBox(this.el);
            return myInfoBox.update(option);
        }
    },
    smallBox:{
        sBox:null,
        option:null,
        init:function(el,option){
            this.sBox = new _AdminLTE_SmallBox(el);
            this.sBox.update(option);
        }
    },
    liveChart:{
        removeData:function(){
            this.ctx.removeData(0,1);
        },
        updateData:function(data,option){
            this.ctx.updateData(data,option);
        },
        addData:function(label,data){
            this.ctx.addData(label,data);
        },
        chartNya:function(){
            this.ctx = new _liveChart('crot');
            this.ctx.init({
                type:'bar',
                label:'Gate Chart',
                data:[88,67,100],
                dataLabel:['Gate 1','Gate 2','Gate 3'],
            });
            return this.ctx;
            // console.log(myChart.myChart);
        },
        init:function(){
            this.chartNya();
        }
    }
}
