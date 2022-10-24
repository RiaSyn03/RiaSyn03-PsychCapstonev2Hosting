Chart.defaults.font.size = 14;

const data = {
  labels: ['Score of 0 - 4 = None', 'Score of 5 - 9 = Mild', 'Score of 10 - 15 = Moderate', 'Score of 16 - 19 = Moderately Severe', 'Score of 20 - 30 = Severe'],
  datasets: [{
    label: 'Weekly Sales',
    data: [4, 9, 15, 19, 30],
    backgroundColor: [
      'rgba(255, 206, 86, 0.2)',
      'rgba(54, 162, 235, 0.2)',
      'rgba(105, 39, 245, 1)',
      'rgba(238, 72, 223, 1)',
      'rgba(225, 32, 32, 1)'
    ],
    borderColor: [
      'rgba(255, 206, 86, 0.2',
      'rgba(54, 162, 235, 0.2',
      'rgba(105, 39, 245, 1)',
      'rgba(238, 72, 223, 1)',
      'rgba(225, 32, 32, 1)'
    ],
    borderWidth: 1,
    hoverOffset: 60
  }]
};

// config 
const config = {
  type: 'pie',
  data,
  options: {
    layout: {
      padding: {
        bottom: 40,
        top: 30
      }
    }
  }
};

// render init block
const myChart = new Chart(
  document.getElementById('myChart'),
  config
);
const myChart2 = new Chart(
  document.getElementById('myChart2'),
  config
);
const myChart3 = new Chart(
  document.getElementById('myChart3'),
  config
);
const myChart4 = new Chart(
  document.getElementById('myChart4'),
  config
);
const myChart5 = new Chart(
  document.getElementById('myChart5'),
  config
);
