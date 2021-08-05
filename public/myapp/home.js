/* Chart Gauge buat motor */
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
    chartLevelAir:function()
    {
        Chart.defaults.set('plugins.streaming', {
            duration: 20000
        });
        const onRefresh = chart => {
                const now = Date.now();
                chart.data.datasets.forEach(dataset => {
                    dataset.data.push({
                        x: now,
                        y: Math.floor((Math.random() * 100) + 1)
                    });
                });
        };

        var ctx = document.getElementById('myChart');
        return new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 2,
                    fill: false,
                    tension: 0.3
                }]
            },
            options: {
                plugins: {
                // Change options for ALL axes of THIS CHART
                streaming: {
                        duration: 20000
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
                            duration: 40000,
                            refresh: 1000,
                            delay: 2000,
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
    }
}


