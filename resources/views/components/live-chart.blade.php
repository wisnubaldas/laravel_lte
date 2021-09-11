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
            let data, plugins = null;
            if(properti.type == 'bar')
            {
                data = {
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
                }

                plugins = {
                            legend: {
                                display: true,
                                labels: {
                                    color: 'rgb(255, 99, 132)'
                                }
                            }
                        }
            } // end if type
            if(properti.type == 'line')
            {
                data = {
                    labels: properti.dataLabel,
                    datasets:[
                        {
                            label: properti.dataLabel,
                            data: properti.data,
                            fill: false,
                            borderColor: 'rgb(75, 192, 192)',
                            tension: 0.1
                        }
                    ]
                }
                plugins = {
                            legend: {
                                display: false,
                                labels: {
                                    color: 'rgb(255, 99, 132)'
                                }
                            }
                        }
            }
            this.myChart = new Chart(this.ctx,{
                type: properti.type,
                data:data,
                options: {
                    plugins: plugins,
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
        updateData(data,option)
        {
            this.myChart.data.datasets.forEach((dataset) => {
                dataset.data = data
            });
            this.myChart.options = option;

            // chart.options = {
            //     responsive: true,
            //     plugins: {
            //         title: {
            //             display: true,
            //             text: 'Live Data Sensor People'
            //         }
            //     },
            //     scales: {
            //         x: {
            //             display: true
            //         },
            //         y: {
            //             display: true
            //         }
            //     }
            // };
            this.myChart.update();
        }
        removeDataEnd()
        {
            this.myChart.data.labels.pop();
            this.myChart.data.datasets.forEach((dataset) => {
                dataset.data.pop();
            });
            this.myChart.update();
        }
        removeData(i,p)
        {
            this.myChart.data.labels.splice(i,p);
            this.myChart.data.datasets.forEach((dataset) => {
                dataset.data.splice(i,p);
            });
            this.myChart.update();
        }
    }
</script>
@endpush
