import Chart from "chart.js/auto";

const chartEl = document.getElementById("myChart");

if(chartEl != null) {
    const ctx = chartEl.getContext("2d");
    const myChart = new Chart(ctx, {
    type: "line",
    data: {
        labels: date,
        datasets: [
            {
                label: "先月",
                data: weight,
                borderColor: "rgb(75, 192, 192)",
                backgroundColor: "rgba(75, 192, 192, 0.5)",
            },
            {
                label: "今月",
                data: [55.1, 58.3, 59.2, 60.5, 58.2],
                borderColor: "rgb(153, 102, 255)",
                backgroundColor: "rgba(153, 102, 255, 0.5)",
            },
        ],
    },
    options: {
            responsive: true,
            scales: {
                y: {
                   
                    suggestedMin: Math.min(...weight) - 3,
                    suggestedMax: Math.max(...weight) + 3,
                    ticks: {
                        stepSize: 1
                    }
                },
            },
            
        },
});
}

