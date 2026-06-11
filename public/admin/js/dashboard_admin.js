$(function () {
    "use strict";

    const data = window.dashboardData || {
        revenueTrends: [0, 0, 0, 0, 0, 0, 0, 0, 0],
        months: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],
        quoteCountsTrends: [0, 0, 0, 0, 0, 0, 0, 0, 0],
    };

    // ── Revenue Area Chart ──────────────────────────────────────────────────
    new ApexCharts(document.querySelector("#chartRevenue"), {
        series: [{
            name: "Revenue",
            data: data.revenueTrends
        }],
        chart: {
            type: 'area',
            height: 200,
            toolbar: { show: false },
            zoom: { enabled: false },
            fontFamily: "'Inter', 'Roboto', sans-serif",
        },
        dataLabels: { enabled: false },
        stroke: { curve: 'smooth', width: 3 },
        fill: {
            type: 'gradient',
            gradient: {
                shadeIntensity: 1,
                opacityFrom: 0.45,
                opacityTo: 0.02,
                stops: [0, 100],
                colorStops: [
                    { offset: 0,   color: '#10b981', opacity: 0.4 },
                    { offset: 100, color: '#10b981', opacity: 0.0 }
                ]
            }
        },
        colors: ['#10b981'],
        xaxis: {
            categories: data.months,
            labels: {
                style: { fontSize: '11px', colors: '#9ca3af' }
            },
            axisBorder: { show: false },
            axisTicks: { show: false },
        },
        yaxis: {
            labels: {
                formatter: val => '$' + (val >= 1000 ? (val / 1000).toFixed(0) + 'K' : val),
                style: { fontSize: '11px', colors: '#9ca3af' }
            }
        },
        grid: {
            borderColor: '#f3f4f6',
            strokeDashArray: 4,
        },
        tooltip: {
            theme: 'light',
            y: {
                formatter: val => '$' + val.toLocaleString()
            }
        },
        markers: {
            size: 4,
            colors: ['#fff'],
            strokeColors: '#10b981',
            strokeWidth: 2,
        }
    }).render();

    // ── Quote Volume Bar Chart ──────────────────────────────────────────────
    new ApexCharts(document.querySelector("#chartQuotes"), {
        series: [{
            name: "Quotes",
            data: data.quoteCountsTrends
        }],
        chart: {
            type: 'bar',
            height: 190,
            toolbar: { show: false },
            fontFamily: "'Inter', 'Roboto', sans-serif",
        },
        plotOptions: {
            bar: {
                borderRadius: 4,
                columnWidth: '55%',
                distributed: false,
            }
        },
        dataLabels: { enabled: false },
        colors: ['#6366f1'],
        fill: {
            type: 'gradient',
            gradient: {
                shade: 'light',
                type: 'vertical',
                shadeIntensity: 0.3,
                opacityFrom: 1,
                opacityTo: 0.7,
            }
        },
        xaxis: {
            categories: data.months,
            labels: {
                style: { fontSize: '11px', colors: '#9ca3af' }
            },
            axisBorder: { show: false },
            axisTicks: { show: false },
        },
        yaxis: {
            labels: {
                style: { fontSize: '11px', colors: '#9ca3af' }
            }
        },
        grid: {
            borderColor: '#f3f4f6',
            strokeDashArray: 4,
        },
        tooltip: {
            theme: 'light',
        }
    }).render();

});
