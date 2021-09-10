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
    }
}
