
let monitorSuhu = {
    knob:{
        _between:function(x,min,max){
            return x >= min && x <= max;
        },
        updatePropColor:function(data){
            console.log(data);
            let color = null;
            if (this._between(data, 1, 50)) {
                color = '#28a745';
            }
            if (this._between(data, 51, 80)) {
                color = '#ffc107';
            }
            if (this._between(data, 81, 100)) {
                color = '#dc3545';
            }
            $(this.el).trigger(
                'configure',
                {
                    "fgColor":color,
                }
            );
        },
        updateData:function(data){
            this.updatePropColor(data);
            $(this.el).val(data).trigger('change');
        },
        init:function(el,option){
            this.el = document.getElementById(el);
            return $(this.el).knob(option);
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
                label:'bar chart',
                data:[0,0,0,0,0],
                dataLabel:['S1','S2','S3','S4','S5'],
            });
            return this.ctx;
        },
        init:function(){
            this.chartNya();
        }
    }
}
