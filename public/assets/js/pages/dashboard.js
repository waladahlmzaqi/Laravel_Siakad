function chart(tanggal, bayar, belum) {
            $('#chart').highcharts({
                chart: {
                    type: 'pie'
                },
                title: {
                    text: 'Pembayaran Bulan ' + tanggal
                },
                tooltip: {
                    pointFormat: '{point.y} Siswa</br>'
                },
                accessibility: {
                    point: {
                        valueSuffix: '%'
                    }
                },
                plotOptions: {
                    pie: {
                        colors: [
                            '#32ff7e',
                            '#ff4d4d',
                        ],
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: false
                        },
                        showInLegend: true
                    }
                },
                series: [{
                    data: [{
                        name: 'Sudah bayar',
                        y: bayar
                    }, {
                        name: 'Belum Bayar',
                        y: belum
                    }]
                }]
            });
        }

