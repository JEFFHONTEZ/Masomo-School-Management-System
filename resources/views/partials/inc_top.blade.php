<link rel="icon" href="{{ asset('global_assets/images/favicon.png') }}">

{{--<!-- Global stylesheets -->--}}
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="{{ asset('global_assets/css/icons/icomoon/styles.css') }}" rel="stylesheet" type="text/css">
    <link href=" {{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href=" {{ asset('assets/css/bootstrap_limitless.min.css') }}" rel="stylesheet" type="text/css">
    <link href=" {{ asset('assets/css/layout.min.css') }}" rel="stylesheet" type="text/css">
    <link href=" {{ asset('assets/css/components.min.css') }}" rel="stylesheet" type="text/css">
    <link href=" {{ asset('assets/css/colors.min.css') }}" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

{{--DatePickers--}}
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datepicker.min.css') }}" type="text/css">

{{-- Custom App CSS--}}
<link href=" {{ asset('assets/css/qs.css') }}" rel="stylesheet" type="text/css">

{{--   Core JS files --}}
    <script src="{{ asset('global_assets/js/main/jquery.min.js') }} "></script>
    <script src="{{ asset('global_assets/js/main/bootstrap.bundle.min.js') }} "></script>
    <script src="{{ asset('global_assets/js/plugins/loaders/blockui.min.js') }} "></script>
<!-- Add this in your @section('content') or @push('scripts') or at the bottom before </body> -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    var ctx = document.getElementById('userTypeChart').getContext('2d');
    var userTypeChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Students', 'Teachers', 'Admins', 'Parents'],
            datasets: [{
                label: 'User Count',
                data: [
                    {{ $userTypeCounts['students'] ?? 0 }},
                    {{ $userTypeCounts['teachers'] ?? 0 }},
                    {{ $userTypeCounts['admins'] ?? 0 }},
                    {{ $userTypeCounts['parents'] ?? 0 }}
                ],
                backgroundColor: [
                    '#42a5f5', '#ef5350', '#66bb6a', '#ab47bc'
                ]
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false }
            },
            scales: {
                y: { beginAtZero: true }
            }
        }
    });
});
</script>