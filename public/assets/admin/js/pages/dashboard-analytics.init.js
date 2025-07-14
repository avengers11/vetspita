function getChartColorsArray(id) {
    const element = document.getElementById(id);
    if (!element) return;
    const colors = element.getAttribute("data-colors");
    if (!colors) return console.warn("data-colors attributes not found on", id);
    return JSON.parse(colors).map(color => {
        const cleaned = color.replace(" ", "");
        if (!cleaned.includes(",")) {
            return getComputedStyle(document.documentElement).getPropertyValue(cleaned) || cleaned;
        }
        const [base, alpha] = cleaned.split(",");
        return `rgba(${getComputedStyle(document.documentElement).getPropertyValue(base)},${alpha})`;
    });
}

let worldlinemap;
function initWorldMap(colors) {
    if (!colors) return;
    document.getElementById("users-by-country").innerHTML = "";
    
    const markers = [
        { name: "Greenland", coords: [72, -42] },
        { name: "Canada", coords: [56.1304, -106.3468] },
        { name: "Brazil", coords: [-14.235, -51.9253] },
        { name: "Egypt", coords: [26.8206, 30.8025] },
        { name: "Russia", coords: [61, 105] },
        { name: "China", coords: [35.8617, 104.1954] },
        { name: "United States", coords: [37.0902, -95.7129] },
        { name: "Norway", coords: [60.472024, 8.468946] },
        { name: "Ukraine", coords: [48.379433, 31.16558] }
    ];

    worldlinemap = new jsVectorMap({
        map: "world_merc",
        selector: "#users-by-country",
        zoomOnScroll: false,
        zoomButtons: false,
        markers,
        lines: markers.slice(0, -1).map(marker => ({ from: marker.name, to: "Egypt" })),
        regionStyle: { initial: { stroke: "#9599ad", strokeWidth: 0.25, fill: colors, fillOpacity: 1 } },
        lineStyle: { animation: true, strokeDasharray: "6 3 6" }
    });
}

function generateData(length, { min, max }) {
    return Array.from({ length }, (_, i) => ({
        x: `${i + 1}h`,
        y: Math.floor(Math.random() * (max - min + 1)) + min
    }));
}

function initCharts() {
    const barColors = getChartColorsArray("countries_charts");
    if (barColors) {
        new ApexCharts(document.querySelector("#countries_charts"), {
            series: [{ data: [1010, 1640, 490, 1255, 1050, 689, 800, 420, 1085, 589], name: "Sessions" }],
            chart: { type: "bar", height: 436, toolbar: { show: false } },
            plotOptions: { bar: { borderRadius: 4, horizontal: true, distributed: true } },
            colors: barColors,
            dataLabels: { enabled: true, offsetX: 32, style: { fontSize: "12px", fontWeight: 400, colors: ["#adb5bd"] } },
            xaxis: { categories: ["India", "United States", "China", "Indonesia", "Russia", "Bangladesh", "Canada", "Brazil", "Vietnam", "UK"] }
        }).render();
    }

    const heatmapColors = getChartColorsArray("audiences-sessions-country-charts");
    if (heatmapColors) {
        new ApexCharts(document.querySelector("#audiences-sessions-country-charts"), {
            series: ["Sat", "Fri", "Thu", "Wed", "Tue", "Mon", "Sun"].map(name => ({
                name,
                data: generateData(18, { min: 0, max: 90 })
            })),
            chart: { height: 400, type: "heatmap", toolbar: { show: false } },
            plotOptions: { heatmap: { colorScale: { ranges: [{ from: 0, to: 50, color: heatmapColors[0] }, { from: 51, to: 100, color: heatmapColors[1] }] } } },
            colors: heatmapColors
        }).render();
    }

    const columnColors = getChartColorsArray("audiences_metrics_charts");
    if (columnColors) {
        new ApexCharts(document.querySelector("#audiences_metrics_charts"), {
            series: [
                { 
                    name: "Review", 
                    data: [4, 3, 10, 20, 12] 
                }
            ],
            chart: { 
                type: "bar", 
                height: 309, 
                stacked: true, 
                toolbar: { show: false } 
            },
            plotOptions: { 
                bar: { 
                    borderRadius: 6, 
                    columnWidth: "20%" 
                } 
            },
            colors: columnColors,
            stroke: { width: 2, colors: ["transparent"] },
            xaxis: {
                categories: ["1 Star", "2 Star", "3 Star", "4 Star", "5 Star"]
            }
        }).render();
    }

    const donutColors = getChartColorsArray("user_device_pie_charts");
    if (donutColors) {
        new ApexCharts(document.querySelector("#user_device_pie_charts"), {
            series: [78.56, 105.02, 42.89],
            labels: ["Desktop", "Mobile", "Tablet"],
            chart: { type: "donut", height: 219 },
            plotOptions: { pie: { donut: { size: "76%" } } },
            colors: donutColors
        }).render();
    }
}

function loadCharts() {
    initWorldMap(getChartColorsArray("users-by-country"));
    initCharts();
}

window.onresize = () => setTimeout(loadCharts, 0);
loadCharts();