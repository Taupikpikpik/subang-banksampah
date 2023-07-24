

<div id="barpeminjaman">
    <script src="{{asset('vendor/dashboard')}}/assets/js/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.0/dist/chart.umd.min.js"></script>
<script>
    $(document).ready(function() {
        bar2()
    });
    function bar2() {
            $("#barpeminjaman").html(`<canvas id="barChart" style="max-height: 400px;"></canvas>`);
                $.ajax({
                type: "get",
                url: "{{ url('chart') }}",
                success: function(data) {
                var h = data.h;
                var v = data.v;
                var barc = document.getElementById("barChart").getContext('2d');
                new Chart( barc, {
                type: 'bar',
                data: {
                    labels: h,
                    datasets: [{
                    label: 'Jumlah Pembelian',
                    data: v,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',

                    ],
                    borderColor: [
                        'rgb(255, 99, 132)',
                    
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
                    plugins: {
                    title: {
                        display: true,
                        text: 'Grafik',
                        font: {
                            size: 24
                        }
                    }
                }
                }
                }); 
                
               
                }
        })};
</script>