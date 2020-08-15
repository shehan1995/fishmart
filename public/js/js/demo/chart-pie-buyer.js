// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Buyer
var pending = $('#pending-orders').val().trim();
var confirm = $('#confirm-orders').val().trim();
var reject = $('#reject-orders').val().trim();
console.log(pending)
var ctxBuyer = document.getElementById("buyerPieChart");
var myPieChartBuyer = new Chart(ctxBuyer, {
  type: 'doughnut',
  data: {
    labels: ["Open", "Approved", "Rejected"],
    datasets: [{
      data: [pending, confirm, reject],
      // data: [10, 10, 80],
      backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
      hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});
