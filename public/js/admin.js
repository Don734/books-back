/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*******************************!*\
  !*** ./resources/js/admin.js ***!
  \*******************************/
function _toConsumableArray(arr) { return _arrayWithoutHoles(arr) || _iterableToArray(arr) || _unsupportedIterableToArray(arr) || _nonIterableSpread(); }
function _nonIterableSpread() { throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }
function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }
function _iterableToArray(iter) { if (typeof Symbol !== "undefined" && iter[Symbol.iterator] != null || iter["@@iterator"] != null) return Array.from(iter); }
function _arrayWithoutHoles(arr) { if (Array.isArray(arr)) return _arrayLikeToArray(arr); }
function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }
document.addEventListener('DOMContentLoaded', function () {
  var salesChartCanvas = document.getElementById('revenue-chart-canvas');
  if (typeof salesChartCanvas != 'undefined' && salesChartCanvas != null) {
    var context = salesChartCanvas.getContext('2d');
    var salesChartData = {
      labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
      datasets: [{
        label: 'Digital Goods',
        backgroundColor: 'rgba(60,141,188,0.9)',
        borderColor: 'rgba(60,141,188,0.8)',
        pointRadius: false,
        pointColor: '#3b8bba',
        pointStrokeColor: 'rgba(60,141,188,1)',
        pointHighlightFill: '#fff',
        pointHighlightStroke: 'rgba(60,141,188,1)',
        data: [28, 48, 40, 19, 86, 27, 90]
      }, {
        label: 'Electronics',
        backgroundColor: 'rgba(210, 214, 222, 1)',
        borderColor: 'rgba(210, 214, 222, 1)',
        pointRadius: false,
        pointColor: 'rgba(210, 214, 222, 1)',
        pointStrokeColor: '#c1c7d1',
        pointHighlightFill: '#fff',
        pointHighlightStroke: 'rgba(220,220,220,1)',
        data: [65, 59, 80, 81, 56, 55, 40]
      }]
    };
    var salesChartOptions = {
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
    };

    // This will get the first returned node in the jQuery collection.
    // eslint-disable-next-line no-unused-vars
    var salesChart = new Chart(context, {
      // lgtm[js/unused-local-variable]
      type: 'line',
      data: salesChartData,
      options: salesChartOptions
    });
  }
  // Donut Chart
  var pieChartCanvas = $('#sales-chart-canvas');
  if (pieChartCanvas.length != 0) {
    var _context = pieChartCanvas.get(0).getContext('2d');
    var pieData = {
      labels: ['Instore Sales', 'Download Sales', 'Mail-Order Sales'],
      datasets: [{
        data: [30, 12, 20],
        backgroundColor: ['#f56954', '#00a65a', '#f39c12']
      }]
    };
    var pieOptions = {
      legend: {
        display: false
      },
      maintainAspectRatio: false,
      responsive: true
    };
    // Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    // eslint-disable-next-line no-unused-vars
    var pieChart = new Chart(_context, {
      // lgtm[js/unused-local-variable]
      type: 'doughnut',
      data: pieData,
      options: pieOptions
    });
  }
  var imageSelect = document.querySelector('input#banner_image');
  if (typeof imageSelect != 'undefined' && imageSelect != null) {
    var imagePreview = document.querySelector('.preview');
    imageSelect.addEventListener('change', function (e) {
      var files = e.target.files;
      var html = '';
      if (files.length > 0) {
        _toConsumableArray(files).forEach(function (file) {
          var url = URL.createObjectURL(file);
          html = "<div class=\"thumb-wrap\">\n            <img src=\"".concat(url, "\" class=\"img-thumbnail\">\n          </div>");
          return html;
        });
      }
      imagePreview.innerHTML = html;
    });
  }
  var coverImageInput = document.querySelector('input#cover_image');
  if (typeof coverImageInput != 'undefined' && coverImageInput != null) {
    var coverImagePreview = document.querySelector('.preview');
    coverImageInput.addEventListener('change', function (e) {
      var files = e.target.files;
      var html = '';
      if (files.length > 0) {
        _toConsumableArray(files).forEach(function (file) {
          var url = URL.createObjectURL(file);
          html = "<div class=\"thumb-wrap\">\n            <img src=\"".concat(url, "\" class=\"img-thumbnail\">\n          </div>");
          return html;
        });
      }
      coverImagePreview.innerHTML = html;
    });
  }
});
/******/ })()
;