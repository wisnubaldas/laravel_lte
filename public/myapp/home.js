
// Gauge option
let apps = {
    gaugeOptions:function() {
        return {
                    angle: 0, // The span of the gauge arc
                    lineWidth: 0.40, // The line thickness
                    radiusScale: 1, // Relative radius
                    generateGradient:true,
                    highDpiSupport:true,
                    animationSpeed:32,
                    pointer: {
                        length: 0.53, // // Relative to gauge radius
                        strokeWidth: 0.082, // The thickness
                        color: '#000000' // Fill color
                    },
                    staticLabels: {
                        font: "10px sans-serif",  // Specifies font
                        labels: [16.66,33.26,49.92,66.58,83.24,99.99],  // Print labels at these values
                        color: "#000000",  // Optional: Label text color
                        fractionDigits: 1  // Optional: Numerical precision. 0=round off.
                    },
                    staticZones: [
                        {strokeStyle: "#30B32D", min: 0, max: 33.33}, // Green
                        {strokeStyle: "#FFDD00", min: 33.33, max: 66.66}, // Yellow
                        {strokeStyle: "#F03E3E", min: 66.66, max: 99.99}  // Red
                    ],
                    limitMax:false,
                    limitMin:false,
                    renderTicks: {
                                    divisions: 16,
                                    divWidth: 1.1,
                                    divLength: 0.7,
                                    divColor: '#333333',
                                    subDivisions: 6,
                                    subLength: 0.5,
                                    subWidth: 0.6,
                                    subColor: '#666666'
                                }
                };
    },
    chartLevelAir:function(jmlAlat)
    {
        Chart.defaults.set('plugins.streaming', {
            duration: 20000
        });

        const onRefresh = chart => {
                const now = Date.now();
                $.get('/get_data',function(xhr){
                    for (let i = 0; i < xhr.length; i++) {
                        const elm = xhr[i];
                        chart.data.datasets[i].data.push({
                                        x: now,
                                        y: elm.nilai
                        })
                        chart.data.datasets[i].backgroundColor.push(`rgba(${elm.pengukur_air.warna_label}, 0.2)`);
                        chart.data.datasets[i].borderColor.push(`rgba(${elm.pengukur_air.warna_label}, 1)`);
                        chart.data.datasets[i].label = elm.pengukur_air.id_alat;
                    }
                });
        };
        var ctx = document.getElementById('myChart');
        // bikin default dataset
            dSet = [];
            for (let i = 0; i < jmlAlat; i++) {
                dSet.push({
                    label: '',
                    data: [],
                    backgroundColor: [],
                    borderColor: [],
                    borderWidth: 2,
                    fill: true,
                    tension: 0.3
                })
            }
        return new Chart(ctx, {
            type: 'line',
            data: {
                datasets: dSet
            },
            options: {
                plugins: {
                // Change options for ALL axes of THIS CHART
                streaming: {
                        duration: 20000,
                        frameRate: 5
                    }
                },
                interaction: {
                    mode: 'index',
                    axis: 'y'
                },
                scales: {
                    y: {
                        beginAtZero: true
                    },
                    x: {
                        type: 'realtime',
                        // Change options only for THIS AXIS
                        realtime: {
                            duration: 70000,
                            refresh: 2000,
                            delay: 1000,
                            ttl: undefined,
                            frameRate: 30,
                            onRefresh: onRefresh
                        }
                    }
                }
            }
        });
    },
    dataTable:function(idTable) {
        idTable.DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
        });
    },
    randomRGBA:function(persen){
        const randomNumber = (min, max) => Math.floor(Math.random() * (max - min + 1) + min);
        const randomByte = () => randomNumber(50, 255)
        const randomPercent = () => (randomNumber(50, 100) * 0.01).toFixed(2)
        return [randomByte(), randomByte(), randomByte()].join(',');
    },
    ajaxPerDay:{
        hasOneDayPassed:function()
        {
            // get today's date. eg: "7/37/2007"
            // var date = new Date().toLocaleDateString();
            var date = new Date().getHours();

            // if there's a date in localstorage and it's equal to the above:
            // inferring a day has yet to pass since both dates are equal.
            if( localStorage.cek_date == date )
                return false;

            // this portion of logic occurs when a day has passed
            localStorage.cek_date = date;
            return true;
        },
        runOncePerDay:function(uri,callback)
        {
            if(!this.hasOneDayPassed()) return false;
            // first get ajax data
            // alert('sdadasd');

            $.get(uri,function(xhr){
                return callback(xhr);
                // console.log(xhr);
                // Unlike localStorage, you can store non-strings.
                // localforage.setItem('data_bmg', xhr).then(function(value) {
                //     // This will output `1`.
                //     console.log(value);
                // }).catch(function(err) {
                //     // This code runs if there were any errors
                //     console.log(err);
                // });
            });
        },
        run(uri,callback)
        {
            this.runOncePerDay(uri,function(a){
                return callback(a);
            });
        }
    },
    setNilaiAlat:{
        onSelectAlat:function(el,callback){
            el.on('select2:select', function (e) {
                        $.ajax({
                            url: '/nilai-air',
                            type: 'GET',
                            data: {
                                id_alat: $(this).val()
                            }
                    }).done(function(data){
                        callback(data);
                    }).fail(function(data){
                        console.log(data.responseJSON);
                    });
              });
        }
    },
    template:{
        form:{
            NilaiAlat:function(data,el)
            {
                const frm = `
                    <div class="form-group">
                        <label for="warna_label">Batas Air </label>
                        <input value="${data.batas_air}" type="text" class="form-control form-control-sm" name="batas_air" id="batas_air">
                    </div>
                    <div class="form-group">
                        <label for="warna_label">Nilai Awal </label>
                        <input value="${data.nilai_awal}" type="text" class="form-control form-control-sm" name="nilai_awal" id="nilai_awal">
                        <input value="${data.id}" type="text" name="id" hidden>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Save</button>
                    </div>
                `;
                el.find('form').append(frm);
            }
        }
    }
}


