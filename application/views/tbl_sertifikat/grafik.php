<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DATA SERTIFIKAT</title>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f8f9fa;
      padding: 20px;
      text-align: center;
    }
    canvas {
      max-width: 600px;
      margin: 0 auto;
    }
  </style>
</head>
<body>
    <h2 class="text-center">PT RIMAU BAHTERA SHIPPING</h2>
    <p class="text-center"><img src="<?= base_url('assets/images/logorbs.png') ?>" width="200px" alt=""></p>
    <h2>Data Sertifikat</h2>
    <p>Visualisasi sertifikat yang sudah kadaluarsa dan belum kadaluarsa.</p>

  <canvas id="certificateChart"></canvas>

  <script>
    // Data Sertifikat (contoh)
    const data = {
      labels: ['Expired', 'Not Expired'],
      datasets: [{
        label: 'Sertifikat',
        data: [<?php echo $expired ?>, <?php echo $belum ?>], // Jumlah expired dan belum expired
        backgroundColor: ['#ff6384', '#36a2eb'], // Warna untuk tiap kategori
        hoverOffset: 4
      }]
    };

    // Konfigurasi Chart
    const config = {
      type: 'pie', // Tipe chart: Pie
      data: data,
      options: {
        responsive: true,
        plugins: {
          legend: {
            position: 'top', // Posisi legend
          },
          tooltip: {
            callbacks: {
              label: function(context) {
                const label = context.label || '';
                const value = context.raw || 0;
                const total = context.dataset.data.reduce((a, b) => a + b, 0);
                const percentage = ((value / total) * 100).toFixed(2);
                return `${label}: ${value} (${percentage}%)`;
              }
            }
          }
        }
      }
    };

    // Render Chart
    const ctx = document.getElementById('certificateChart').getContext('2d');
    new Chart(ctx, config);
  </script>

  <p class="text-center">
    <button class="btn btn-sm btn-primary" onclick="window.print()">Cetak</button>
  </p>
</body>
</html>