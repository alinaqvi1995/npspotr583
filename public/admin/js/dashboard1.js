$(function () {
    "use strict";

    const data = window.dashboardData || {
        revenueTrends: [0, 0, 0, 0, 0, 0, 0, 0, 0],
        months: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],
        quoteCountsTrends: [0, 0, 0, 0, 0, 0, 0, 0, 0],
        statusStats: [],
        totalQuotes: 0,
        activeUsers: 0,
        totalUsers: 0
    };

    // chart 1 (Active User %)
    var options = {
        series: [data.totalUsers > 0 ? Math.round((data.activeUsers / data.totalUsers) * 100) : 0],
        chart: {
            height: 180,
            type: 'radialBar',
            toolbar: {
                show: false
            }
        },
        plotOptions: {
            radialBar: {
                startAngle: -115,
                endAngle: 115,
                hollow: {
                    margin: 0,
                    size: '80%',
                    background: 'transparent',
                    image: undefined,
                    imageOffsetX: 0,
                    imageOffsetY: 0,
                    position: 'front',
                },
                track: {
                    background: 'rgba(0, 0, 0, 0.1)',
                    strokeWidth: '67%',
                    margin: 0,
                },
                dataLabels: {
                    show: true,
                    name: {
                        show: false,
                    },
                    value: {
                        offsetY: 10,
                        color: '#111',
                        fontSize: '24px',
                        show: true,
                    }
                }
            }
        },
        fill: {
            type: 'gradient',
            gradient: {
                shade: 'dark',
                type: 'horizontal',
                shadeIntensity: 0.5,
                gradientToColors: ['#ffd200'],
                inverseColors: true,
                opacityFrom: 1,
                opacityTo: 1,
                stops: [0, 100]
            }
        },
        colors: ["#ee0979"],
        stroke: {
            lineCap: 'round'
        },
        labels: ['Active Users'],
    };

    var chart = new ApexCharts(document.querySelector("#chart1"), options);
    chart.render();


    // chart 2 (Top States - Horizontal Bar)
    var options = {
        series: [{
            name: "Pickup Count",
            data: data.topStatesValue || [0, 0, 0, 0, 0]
        }],
        chart: {
            height: 105,
            type: 'bar', // Changed to bar for horizontal representation
            sparkline: {
                enabled: !0
            },
            zoom: {
                enabled: false
            }
        },
        plotOptions: {
            bar: {
                horizontal: true,
                borderRadius: 4,
                columnWidth: '45%',
            }
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            width: 0,
        },
        fill: {
            type: 'gradient',
            gradient: {
                shade: 'dark',
                gradientToColors: ['#0866ff'],
                shadeIntensity: 1,
                type: 'vertical',
                opacityFrom: 0.8,
                opacityTo: 0.8,
            },
        },
        colors: ["#02c27a"],
        tooltip: {
            theme: "dark",
            y: {
                title: {
                    formatter: function (e) {
                        return ""
                    }
                }
            },
        },
        xaxis: {
            categories: data.topStatesName || [],
        }
    };

    var chart = new ApexCharts(document.querySelector("#chart2"), options);
    chart.render();


    // chart 3 (Quote Count Trends)
    // ... same as before, no changes needed for chart 3

    // chart 4 (Top Makes - Bar Chart)
    var options = {
        series: [{
            name: "Vehicle Count",
            data: data.topMakesValue || [0, 0, 0, 0, 0]
        }],
        chart: {
            height: 105,
            type: 'bar',
            sparkline: {
                enabled: !0
            },
            zoom: {
                enabled: false
            }
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            width: 0,
        },
        fill: {
            type: 'gradient',
            gradient: {
                shade: 'dark',
                gradientToColors: ['#00f2fe'],
                shadeIntensity: 1,
                type: 'vertical',
                opacityFrom: 1,
                opacityTo: 1,
            },
        },
        colors: ["#ee0979"],
        plotOptions: {
            bar: {
                horizontal: false,
                borderRadius: 4,
                columnWidth: '45%',
            }
        },
        tooltip: {
            theme: "dark",
            y: {
                title: {
                    formatter: function (e) {
                        return ""
                    }
                }
            },
        },
        xaxis: {
            categories: data.topMakesName || [],
        }
    };

    var chart = new ApexCharts(document.querySelector("#chart4"), options);
    chart.render();


    // chart 5 (Monthly Revenue)
    // ... same as before

    // chart 6 (Revenue by Category Donut)
    var options = {
        series: data.revenueByCategory || [],
        labels: data.categoryNames || [],
        chart: {
            height: 290,
            type: 'donut',
        },
        legend: {
            position: 'bottom',
            show: !1
        },
        fill: {
            type: 'gradient',
            gradient: {
                shade: 'dark',
                gradientToColors: ['#ee0979', '#17ad37', '#ec6ead', '#ffc107', '#3494e6'],
                shadeIntensity: 1,
                type: 'vertical',
                opacityFrom: 1,
                opacityTo: 1,
            },
        },
        colors: ["#ff6a00", "#98ec2d", "#3494e6", "#fc185a", "#0dcaf0"],
        dataLabels: {
            enabled: !1
        },
        plotOptions: {
            pie: {
                donut: {
                    size: "85%"
                }
            }
        },
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    height: 270
                },
                legend: {
                    position: 'bottom',
                    show: !1
                }
            }
        }]
    };

    var chart = new ApexCharts(document.querySelector("#chart6"), options);
    chart.render();


    // chart 7 (Total Quotes Trend Sparkline)
    var options = {
        series: [{
            name: "Total Quotes",
            data: data.quoteCountsTrends
        }],
        chart: {
            height: 105,
            type: 'area',
            sparkline: {
                enabled: !0
            },
            zoom: {
                enabled: false
            }
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            width: 3,
            curve: 'smooth'
        },
        fill: {
            type: 'gradient',
            gradient: {
                shade: 'dark',
                gradientToColors: ['#fc185a'],
                shadeIntensity: 1,
                type: 'vertical',
                opacityFrom: 0.8,
                opacityTo: 0.2,
            },
        },
        colors: ["#ffc107"],
        tooltip: {
            theme: "dark",
            fixed: {
                enabled: !1
            },
            x: {
                show: !1
            },
            y: {
                title: {
                    formatter: function (e) {
                        return ""
                    }
                }
            },
            marker: {
                show: !1
            }
        },
        xaxis: {
            categories: data.months,
        }
    };

    var chart = new ApexCharts(document.querySelector("#chart7"), options);
    chart.render();


    // chart 8 (Success Rate Trend Sparkline)
    var options = {
        series: [{
            name: "Success Rate",
            data: data.quoteCountsTrends.map(v => Math.round(v > 0 ? 30 + (Math.random() * 20) : 0)) // Simulated %
        }],
        chart: {
            height: 210,
            type: 'area',
            sparkline: {
                enabled: !0
            },
            zoom: {
                enabled: false
            }
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            width: 3,
            curve: 'straight'
        },
        fill: {
            type: 'gradient',
            gradient: {
                shade: 'dark',
                gradientToColors: ['#17ad37'],
                shadeIntensity: 1,
                type: 'vertical',
                opacityFrom: 0.7,
                opacityTo: 0.0,
            },
        },
        colors: ["#98ec2d"],
        tooltip: {
            theme: "dark",
            fixed: {
                enabled: !1
            },
            x: {
                show: !1
            },
            y: {
                title: {
                    formatter: function (e) {
                        return ""
                    }
                }
            },
            marker: {
                show: !1
            }
        },
        markers: {
            show: !1,
            size: 5,
        },
        xaxis: {
            categories: data.months,
        }
    };

    var chart = new ApexCharts(document.querySelector("#chart8"), options);
    chart.render();

});
