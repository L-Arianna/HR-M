<script type="text/javascript">
    // chart 1
    var ctx = document.getElementById('chart1').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa', 'Su'],
            datasets: [{
                label: 'Google',
                data: [6, 20, 14, 12, 17, 8, 10],
                backgroundColor: "transparent",
                borderColor: "#0d6efd",
                pointRadius: "0",
                borderWidth: 4
            }, {
                label: 'Facebookaa',
                data: [5, 30, 16, 23, 8, 14, 11],
                backgroundColor: "transparent",
                borderColor: "#f41127",
                pointRadius: "0",
                borderWidth: 4
            }]
        },
        options: {
            maintainAspectRatio: false,
            legend: {
                display: true,
                labels: {
                    fontColor: '#585757',
                    boxWidth: 40
                }
            },
            tooltips: {
                enabled: true
            },
            scales: {
                xAxes: [{
                    ticks: {
                        beginAtZero: true,
                        fontColor: '#585757'
                    },
                    gridLines: {
                        display: true,
                        color: "rgba(0, 0, 0, 0.07)"
                    },
                }],
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        fontColor: '#585757'
                    },
                    gridLines: {
                        display: true,
                        color: "rgba(0, 0, 0, 0.07)"
                    },
                }]
            }
        }
    });
</script>