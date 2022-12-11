
document.addEventListener('DOMContentLoaded', function () {
  const salesChartCanvas = document.getElementById('revenue-chart-canvas');

  if (typeof(salesChartCanvas) != 'undefined' && salesChartCanvas != null) {
    let context = salesChartCanvas.getContext('2d');

    const salesChartData = {
      labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
      datasets: [
        {
          label: 'Digital Goods',
          backgroundColor: 'rgba(60,141,188,0.9)',
          borderColor: 'rgba(60,141,188,0.8)',
          pointRadius: false,
          pointColor: '#3b8bba',
          pointStrokeColor: 'rgba(60,141,188,1)',
          pointHighlightFill: '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data: [28, 48, 40, 19, 86, 27, 90]
        },
        {
          label: 'Electronics',
          backgroundColor: 'rgba(210, 214, 222, 1)',
          borderColor: 'rgba(210, 214, 222, 1)',
          pointRadius: false,
          pointColor: 'rgba(210, 214, 222, 1)',
          pointStrokeColor: '#c1c7d1',
          pointHighlightFill: '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data: [65, 59, 80, 81, 56, 55, 40]
        }
      ]
    }

    const salesChartOptions = {
      maintainAspectRatio: false,
      responsive: true,
      legend: {
        display: false
      },
      scales: {
        xAxes: [{
          gridLines: {
            display: false
          }
        }],
        yAxes: [{
          gridLines: {
            display: false
          }
        }]
      }
    }

    // This will get the first returned node in the jQuery collection.
    // eslint-disable-next-line no-unused-vars
    const salesChart = new Chart(context, { // lgtm[js/unused-local-variable]
      type: 'line',
      data: salesChartData,
      options: salesChartOptions
    })
  }
  // Donut Chart
  const pieChartCanvas = $('#sales-chart-canvas');
  if (pieChartCanvas.length != 0) {
    let context = pieChartCanvas.get(0).getContext('2d');

    const pieData = {
      labels: [
        'Instore Sales',
        'Download Sales',
        'Mail-Order Sales'
      ],
      datasets: [
        {
          data: [30, 12, 20],
          backgroundColor: ['#f56954', '#00a65a', '#f39c12']
        }
      ]
    }
    const pieOptions = {
      legend: {
        display: false
      },
      maintainAspectRatio: false,
      responsive: true
    }
    // Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    // eslint-disable-next-line no-unused-vars
    const pieChart = new Chart(context, { // lgtm[js/unused-local-variable]
      type: 'doughnut',
      data: pieData,
      options: pieOptions
    })
  }

  const imageSelect = document.querySelector('input#banner_image');

  if (typeof(imageSelect) != 'undefined' && imageSelect != null) {
    const imagePreview = document.querySelector('.preview');

    imageSelect.addEventListener('change', function (e) {
      const files = e.target.files;
      let html = '';
      if (files.length > 0) {
        [...files].forEach((file) => {
          const url = URL.createObjectURL(file);
          html = `<div class="thumb-wrap">
            <img src="${url}" class="img-thumbnail">
          </div>`;
  
          return html;
        })
      }
  
      imagePreview.innerHTML = html;
    })
  }

  const coverImageInput = document.querySelector('input#cover_image');

  if (typeof(coverImageInput) != 'undefined' && coverImageInput != null) {
    const coverImagePreview = document.querySelector('.preview');

    coverImageInput.addEventListener('change', function (e) {
      const files = e.target.files;
      let html = '';
      if (files.length > 0) {
        [...files].forEach((file) => {
          const url = URL.createObjectURL(file);
          html = `<div class="thumb-wrap">
            <img src="${url}" class="img-thumbnail">
          </div>`;
  
          return html;
        })
      }
  
      coverImagePreview.innerHTML = html;
    })
  }
})