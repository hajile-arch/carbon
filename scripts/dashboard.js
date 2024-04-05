$(document).ready(async function () {
  try {
    const data = await $.ajax({
      url: "../api/dashboard-pull.php",
      type: "GET",
      dataType: "json",
    });

    const energyConsumption =
      (data.monthlyElectricBill + data.monthlyGasBill) * 105 +
      data.monthlyOilBill * 113;
    const transportation = ((data.totalMileage / data.totalYear) * 0.79) + (data.numberOfFlights * 2750)
    const recyclingHabits = (data.recycleNewspaper == 'false' ? 184 : 0) + (data.recycleAluminiumAndTin == 'false' ? 166 : 0)
    const totalCarbonFootprint = energyConsumption + transportation + recyclingHabits

    const doughnut = document.getElementById("doughnut");
    const doughnut_data = [energyConsumption, transportation, recyclingHabits];
    
    const totalCarbonFootprintSpan = document.getElementById("totalCarbonFootprintSpan");
    const formattedTotalCarbonFootprint = new Intl.NumberFormat('en-US', {
      minimumFractionDigits: 2,
      maximumFractionDigits: 2
    }).format(totalCarbonFootprint);
    totalCarbonFootprintSpan.innerText = formattedTotalCarbonFootprint;
    console.log(totalCarbonFootprint);

    new Chart(doughnut, {
      type: "doughnut",
      data: {
        labels: ["Energy Consumption", "Transportation", "Recycling Habits"],
        datasets: [
          {
            data: doughnut_data,
            backgroundColor: [
              "rgb(255, 99, 132)",
              "rgb(54, 162, 235)",
              "rgb(255, 205, 86)",
            ],
            hoverOffset: 4,
          },
        ],
      },
    });

    const bar_chart = document.getElementById("bar-chart");
    const bar_chart_data = [
      10934, 22000, 3004, 51209, 42393, 16233, 27129, 58123, 10023, 989, 12242,
      11231,
    ];

    const bar_chart_alphas = bar_chart_data.map(
      (value) => value / Math.max(...bar_chart_data)
    );
    const bar_chart_backgroundColors = bar_chart_alphas.map(
      (alpha) => `rgba(26, 136, 85, ${alpha})`
    );

    new Chart(bar_chart, {
      type: "bar",
      data: {
        labels: [
          "Jan",
          "Feb",
          "Mar",
          "Apr",
          "May",
          "Jun",
          "Jul",
          "Aug",
          "Sep",
          "Oct",
          "Nov",
          "Dec",
        ],
        datasets: [
          {
            label: "Carbon Footprint",
            data: bar_chart_data,
            borderWidth: 1,
            backgroundColor: bar_chart_backgroundColors,
            borderColor: "rgb(26, 136, 85)",
          },
        ],
      },
      options: {
        scales: {
          y: {
            beginAtZero: true,
          },
        },
      },
    });

  } catch (error) {
    console.error("Error occurred while fetching data:", error);
  }
});
