new Chart(document.getElementById("pie-chart"), {
    type: 'pie',
    data: {
      labels: ["Accepted", "Pending"],
      datasets: [{
        label: "Population (millions)",
        backgroundColor: ["green", "red"],
        data: [30,30]
      }]
    },
    options: {
      title: {
        display: true,
        text: 'List of Appointments'
      }
    }
});


//Get Result button (Student Questionaire)
