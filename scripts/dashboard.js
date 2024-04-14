$(document).ready(async function () {
  let barChart = null; // Variable to store the Chart object

  try {
    const data = await $.ajax({
      url: "../api/dashboard-pull.php",
      type: "GET",
      dataType: "json",
    })

    // PIE CHART
    const latestRecord = data.latestRecord;

    const date = document.getElementById("date");
    date.innerText = latestRecord.date;

    const energyConsumption =
      (latestRecord.monthlyElectricBill + latestRecord.monthlyGasBill) * 105 +
      latestRecord.monthlyOilBill * 113;
    const transportation =
      (latestRecord.totalMileage / latestRecord.totalYear) * 0.79 +
      latestRecord.numberOfFlights * 2750;
    const recyclingHabits =
      (latestRecord.recycleNewspaper === "false" ? 184 : 0) +
      (latestRecord.recycleAluminiumAndTin === "false" ? 166 : 0);
    const totalCarbonFootprint =
      energyConsumption + transportation + recyclingHabits;

    let recommendation = "";
    if (totalCarbonFootprint >= 0 && totalCarbonFootprint < 6000) {
      recommendation =
        "Congratulations! Your carbon footprint is very low, which is excellent for the environment. Keep up the good work! You're already making a significant positive impact by reducing your emissions. Consider sharing your eco-friendly practices with others to inspire them to do the same.";
    } else if (totalCarbonFootprint >= 6000 && totalCarbonFootprint < 16000) {
      recommendation =
        "Well done! Your carbon footprint falls within the ideal range, which shows your commitment to living sustainably. Continue your efforts to reduce emissions even further by exploring additional green practices. Every small change makes a difference in preserving our planet for future generations.";
    } else if (totalCarbonFootprint >= 16000 && totalCarbonFootprint <= 22000) {
      recommendation =
        "Your carbon footprint is within the average range. While this is common, there's always room for improvement. Consider adopting more eco-friendly habits, such as reducing energy consumption, using public transportation or carpooling, eating a plant-based diet, and minimizing waste. Small adjustments in your lifestyle can lead to a significant reduction in emissions.";
    } else {
      recommendation =
        "It appears that your carbon footprint exceeds the average, indicating a higher level of emissions. It's essential to take action to reduce your environmental impact. Consider implementing sustainable practices such as reducing energy consumption, using renewable energy sources, driving less or using more fuel-efficient vehicles, and supporting eco-friendly products and services. Every effort counts in mitigating climate change and protecting our planet's future.";
    }

    const recommendationText = document.getElementById("recommendationText");
    recommendationText.innerText = recommendation;

    const doughnut = document.getElementById("doughnut");
    const doughnut_data = [energyConsumption, transportation, recyclingHabits];

    const energyConsumptionSpan = document.getElementById("energyConsumptionSpan")
    energyConsumptionSpan.innerText = energyConsumption

    const transportationSpan = document.getElementById("transportationSpan")
    transportationSpan.innerText = transportation

    const recyclingHabitsSpan = document.getElementById("recyclingHabitsSpan")
    recyclingHabitsSpan.innerText = recyclingHabits

    const totalCarbonFootprintSpan = document.querySelectorAll(
      ".totalCarbonFootprintSpan"
    );
    const formattedTotalCarbonFootprint = new Intl.NumberFormat("en-US", {
      minimumFractionDigits: 2,
      maximumFractionDigits: 2,
    }).format(totalCarbonFootprint);
    totalCarbonFootprintSpan.forEach((item) => {
      item.innerText = formattedTotalCarbonFootprint;
    });
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

    // BAR CHART
    const allRecords = data.allRecords;
    const selectedYear = document.getElementById("selectedYear");
    let currentSelectedYear = new Date().getFullYear();
    selectedYear.innerText = currentSelectedYear

    function updateBarChart(barChartData) {
      if (barChart) {
        barChart.data.datasets[0].data = barChartData;
        barChart.update();
      }
    }

    function checkLatestYearMatch(currentSelectedYear) {
      const monthsData = Array.from({ length: 12 }, () => 0);
      allRecords.forEach((record) => {
        const recordDate = new Date(record.date);
        const recordYear = recordDate.getFullYear();
        const recordMonth = recordDate.getMonth();

        if (recordYear === currentSelectedYear) {
          monthsData[recordMonth] +=
            (record.monthlyElectricBill + record.monthlyGasBill) * 105 +
            record.monthlyOilBill * 113 +
            (record.totalMileage / record.totalYear) * 0.79 +
            record.numberOfFlights * 2750 +
            (record.recycleNewspaper === "false" ? 184 : 0) +
            (record.recycleAluminiumAndTin === "false" ? 166 : 0);
        }
      });
      updateBarChart(monthsData);
    }

    document.addEventListener("mouseover", () => {
      checkLatestYearMatch(currentSelectedYear);
    });   

    document.addEventListener("click", (event) => {
      if (event.target.className.includes("prev")) {
        currentSelectedYear--;
        selectedYear.innerText = currentSelectedYear;
      }
      if (event.target.className.includes("next")) {
        currentSelectedYear++;
        selectedYear.innerText = currentSelectedYear;
      }
      checkLatestYearMatch(currentSelectedYear);
    })

    const bar_chart = document.getElementById("bar-chart");
    const bar_chart_data = Array.from({ length: 12 }, () => 0);

    const bar_chart_alphas = bar_chart_data.map(
      (value) => value / Math.max(...bar_chart_data)
    );
    const bar_chart_backgroundColors = bar_chart_alphas.map(
      (alpha) => `rgba(26, 136, 85, ${alpha})`
    );

    /////////////////////////////////////////////////////////////////////////////////////////////////////////// 
      
    barChart = new Chart(bar_chart, {
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
    updateBarChart(bar_chart_data);
  } catch (e) {
    console.error("Error occurred while fetching data:", e);
  }
});
