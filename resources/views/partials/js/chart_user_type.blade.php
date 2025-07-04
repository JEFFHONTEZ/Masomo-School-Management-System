<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    var chartCanvas = document.getElementById('userTypeChart');
    if (chartCanvas) {
        var ctx = chartCanvas.getContext('2d');
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
    }
});
</script>