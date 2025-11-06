<div class="container py-5">
    <h2 class="text-center mb-4 fw-bold">Explore Services by State</h2>

    <!-- Map -->
    <div id="stateMap" style="width: 100%; height: 500px; border-radius: 10px; overflow: hidden; box-shadow: 0 0 10px rgba(0,0,0,0.1);"></div>

    <!-- Dynamic State Info -->
    <div id="stateContent" class="mt-5 text-center">
        <h3 id="stateName" class="mb-3 text-primary">Select a state on the map</h3>
        <img id="stateBanner" src="" class="img-fluid my-3 d-none rounded shadow-sm" alt="State Banner">
        <div id="stateDescription" class="fs-5"></div>
    </div>
</div>

<!-- ✅ amCharts 5 -->
<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/map.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/usaLow.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
<script>
    // Get all available state slugs from the backend
    const availableStates = @json($states->pluck('slug'));
</script>
<script>
    am5.ready(function() {
        var root = am5.Root.new("stateMap");
        root.setThemes([am5themes_Animated.new(root)]);

        var chart = root.container.children.push(
            am5map.MapChart.new(root, {
                panX: "none",
                panY: "none",
                wheelX: "none",
                wheelY: "none",
                projection: am5map.geoAlbersUsa()
            })
        );

        var polygonSeries = chart.series.push(
            am5map.MapPolygonSeries.new(root, {
                geoJSON: am5geodata_usaLow
            })
        );

        polygonSeries.mapPolygons.template.setAll({
            tooltipText: "{name}",
            interactive: true,
            stroke: am5.color(0xffffff),
            strokeWidth: 1
        });

        // ✅ Style & click based on availability
        polygonSeries.events.on("datavalidated", function() {
            polygonSeries.mapPolygons.each(function(polygon) {
                let stateName = polygon.dataItem.dataContext.name;
                let stateSlug = stateName.toLowerCase().replace(/\s+/g, '-');

                if (availableStates.includes(stateSlug)) {
                    // ✅ Clickable state
                    polygon.setAll({
                        fill: am5.color(0x74b9ff),
                        cursorOverStyle: "pointer",
                        tooltipText: stateName
                    });

                    polygon.events.on("click", function() {
                        window.location.href = `/states/${stateSlug}`;
                    });
                } else {
                    // 🚫 Disabled (no page)
                    polygon.setAll({
                        fill: am5.color(0xdfe6e9),
                        interactive: false,
                        tooltipText: `${stateName} (Coming Soon)`
                    });
                }
            });
        });

        polygonSeries.mapPolygons.template.states.create("hover", {
            fill: am5.color(0x0984e3)
        });
    });
</script>
