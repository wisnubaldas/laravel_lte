<div>
    <canvas id="{{$id}}" width="{{$width}}" height="{{$height}}"></canvas>
</div>

@push('js')
<script src="https://cdn.jsdelivr.net/npm/luxon@1.27.0"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-luxon@1.0.0"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-streaming@2.0.0"></script>
<script>
    class _liveChart{
        constructor(target)
        {
            this.ctx = document.getElementById(target).getContext('2d');
        }
        init(properti)
        {
            this.myChart = new Chart(this.ctx,{
                type: 'bar',
                data:{
                        labels: properti.dataLabel,
                        datasets: [{
                        label: properti.label,
                        data: properti.data,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    },
                    responsive: true,
                }
            })
        } // end init
        addData(label, data)
        {
            this.myChart.data.labels.push(label);
            this.myChart.data.datasets.forEach((dataset) => {
                dataset.data.push(data);
            });
            this.myChart.update();
        } // end addData
    }

    // function addData(chart, label, data) {
    //         chart.data.labels.push(label);
    //         chart.data.datasets.forEach((dataset) => {
    //         dataset.data.push(data);
    //     });
    //     chart.update();
    // }
    // function removeData(chart) {
    //     chart.data.labels.pop();
    //     chart.data.datasets.forEach((dataset) => {
    //         dataset.data.pop();
    //     });
    //     chart.update();
    // }
    // // buat line chart
    // function updateConfigByMutating(chart) {
    //     chart.options.plugins.title.text = ['new title','dasdasd'];
    //     chart.update();
    // }
    // function updateConfigAsNewObject(chart,data) {
    //     chart.data.datasets.forEach((dataset) => {
    //         dataset.data = data
    //     });

    //     // chart.options = {
    //     //     responsive: true,
    //     //     plugins: {
    //     //         title: {
    //     //             display: true,
    //     //             text: 'Live Data Sensor People'
    //     //         }
    //     //     },
    //     //     scales: {
    //     //         x: {
    //     //             display: true
    //     //         },
    //     //         y: {
    //     //             display: true
    //     //         }
    //     //     }
    //     // };
    //     chart.update();
    // }

    // let startChart = () =>
    //     {
    //         // removeData(myChart);
    //         // updateConfigByMutating(myChart);
    //         let d = () => Math.floor(1000 * Math.random());
    //         updateConfigAsNewObject(myChart,[d(),d(),d(),d(),d()])

    //         // addData(myChart,
    //         //     'Sensor 01',
    //         //     d(),
    //         //     );

    //     }

    // setInterval(startChart, 5000);
</script>
@endpush
