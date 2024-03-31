document.addEventListener("DOMContentLoaded", () => {
    const doughnut = document.getElementById("doughnut");
    const doughnut_data = [1, 2, 3];
  
    new Chart(doughnut, {
      type: "doughnut",
      data: {
        labels: ["Energy Consumption", "Transportation", "Recycling Habits"],
        datasets: [
          {
            label: "My First Dataset",
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
    const bar_chart_data = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];
  
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
  });
  