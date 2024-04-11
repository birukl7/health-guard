Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

var ctx = document.getElementById("myBarChart");
var myLineChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: _ydata,
        datasets: [{
            label: "Number of Health Professionals",
            backgroundColor: "rgba(2,117,216,1)",
            borderColor: "rgba(2,117,216,1)",
            data: _xdata,
        }],
    },
    options: {
        scales: {
            xAxes: [{
                time: {
                    unit: 'month'
                },
                gridLines: {
                    display: false
                },
                ticks: {
                    maxTicksLimit: 6
                }
            }],
            yAxes: [{
                ticks: {
                    beginAtZero: true,
                    precision: 0,
                    stepSize: 1
                },
                gridLines: {
                    display: true
                }
            }],
        },
        legend: {
            display: false
        }
    }
});

var cx = document.getElementById("myChart");
var mySecondChart = new Chart(cx, {
    type: 'bar',
    data: {
        labels: _yaxis,
        datasets: [{
            label: "Number of Students",
            backgroundColor: "rgba(2,117,216,1)",
            borderColor: "rgba(2,117,216,1)",
            data: _xaxis,
        }],
    },
    options: {
        scales: {
            xAxes: [{
                time: {
                    unit: 'month'
                },
                gridLines: {
                    display: false
                },
                ticks: {
                    maxTicksLimit: 6
                }
            }],
            yAxes: [{
                ticks: {
                    beginAtZero: true,
                    precision: 0,
                    stepSize: 1
                },
                gridLines: {
                    display: true
                }
            }],
        },
        legend: {
            display: false
        }
    }
});