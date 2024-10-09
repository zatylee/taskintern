function createPieChart() {
  // Retrieve values from data attributes
  const appData = document.getElementById('myPieChartStaff').getAttribute('data-app');
  const dbData = document.getElementById('myPieChartStaff').getAttribute('data-db');
  const infraData = document.getElementById('myPieChartStaff').getAttribute('data-infra');

  // Debugging: boleh cek dekat console
  console.log('App Data:', appData);
  console.log('DB Data:', dbData);
  console.log('Infra Data:', infraData);

  // Check if data attributes are available
  if (appData && dbData && infraData) {
    // Pie Chart Data
    const data = {
      labels: ['Application', 'Database', 'Infra'],
      datasets: [{
        data: [appData, dbData, infraData], // Use the retrieved values directly
        backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc', '#f6c23e'],
        hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf', '#dda20a'],
        hoverBorderColor: 'rgba(234, 236, 244, 1)',
      }],
    };

    // Pie Chart Options
    const options = {
      maintainAspectRatio: false,
      tooltips: {
        backgroundColor: 'rgba(0, 0, 0, 0.8)',
        bodyFontColor: '#fff',
        borderColor: '#fff',
        borderWidth: 1,
        xPadding: 15,
        yPadding: 15,
        displayColors: false,
        caretPadding: 10,
      },
      legend: {
        display: false,
      },
      cutoutPercentage: 80,
    };

    // Render the Pie Chart
    const ctx = document.getElementById('myPieChartStaff').getContext('2d');
    new Chart(ctx, {
      type: 'doughnut',
      data: data,
      options: options,
    });
  } else {
    console.error('Error: One or more data attributes are missing.');
  }
}

// Call the function to create the pie chart
createPieChart();
