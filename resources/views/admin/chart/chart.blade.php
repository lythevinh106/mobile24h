@extends('admin.main')


@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Thống Kê</h1>


            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-area me-1"></i>
                    Biểu Đồ Thống Kê Doanh Thu Qua Các Tháng
                </div>
                <div class="card-body"><canvas id="myChart" width="100%" height="30"></canvas></div>
                {{-- <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div> --}}
            </div>


            <div class="card mb-4 col-md-6">
                <div class="card-header">
                    <i class="fas fa-chart-area me-1"></i>
                    Tổng Quát Trạng Thái Các Đơn Hàng
                </div>
                <div class="card-body"><canvas id="myChart2"></canvas></div>
                {{-- <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div> --}}
            </div>



            {{--  --}}
        </div>
    </main>
    <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-muted">Copyright &copy; Your Website 2022</div>
                <div>
                    <a href="#">Privacy Policy</a>
                    &middot;
                    <a href="#">Terms &amp; Conditions</a>
                </div>
            </div>
        </div>
    </footer>
@endsection


@section('footer')
    {{-- //https://tobiasahlin.com/blog/chartjs-charts-to-get-you-started/ --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        /////////thong ke doanh thu qua cac nam
        var ctx = $("#myChart").get(0).getContext("2d");
        var data = "<?= json_encode($data) ?>";
        data = data.replace("[", "");
        data = data.replace("]", "");

        // console.log(data.split(","))

        const myBarChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8'

                    , 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'
                ],
                datasets: [{
                    label: 'Thống Kê Doanh Thu Từng Tháng Trong Năm',
                    data: data.split(","), /// chuyen chuoi thanh mang
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
                    borderWidth: 1
                }]
            },
            options: {
                animations: {
                    tension: {

                        duration: 5000,
                        easing: 'linear',

                        from: 1,
                        to: 0,
                        loop: true
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });





        /////////thong ke phan tram trang thai cac don hàng
        var ctx2 = $("#myChart2").get(0).getContext("2d");
        var data_status = "<?= json_encode($data_status) ?>";
        data_status = data_status.replace("[", "");
        data_status = data_status.replace("]", "");

        var data2 = data_status.split(",");




        const myBarChart2 = new Chart(ctx2, {
            type: 'pie',
            data: {
                labels: ["Đơn Bị Hủy", "Đang Xử Lí", "Đang Vận Chuyển", "Đã Hoàn thành"],
                datasets: [{
                    label: "Population (millions)",
                    backgroundColor: ["#3e95cd", "#8e5ea2", "#3cba9f", "#e8c3b9"],

                    data: data2

                }]
            },
            options: {
                title: {
                    display: true,
                    text: 'Predicted world population (millions) in 2050'
                }
            }
        });
    </script>
@endsection
