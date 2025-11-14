<section class="tj-service-section-three">
    <div class="container">
        <div class="row">
            <div class="tj-section-heading text-center mb-0">
                <span class="sub-title active-shape"> Nationwide Coverage</span>
                {{-- <h2 class="title">Bridgeway’s Coast-to-Coast Auto Transport Excellence</h2> --}}
                <p class="states-map-description">
                    From bustling New York to sunny California, Bridgeway proudly delivers seamless, secure, and efficient vehicle 
                    transportation services across all fifty states. Our dedication to reliability, speed, and customer satisfaction 
                    sets us apart — making us the preferred choice for nationwide auto shipping. Explore our service coverage below.
                </p>
            </div>

        </div>
    </div>
    <div class="container py-5">
        {{-- <h2 class="text-center mb-4 fw-bold">Explore Services by State</h2> --}}

        <!-- Map -->
        <div id="stateMap" style="width: 100%; height: 500px; border-radius: 10px; overflow: hidden; box-shadow: 0 0 10px rgba(0,0,0,0.1);"></div>

        <!-- Dynamic State Info -->
        <div id="stateContent" class="mt-5 text-center">
            {{-- <h3 id="stateName" class="mb-3 text-primary">Select a state on the map</h3> --}}
            <img id="stateBanner" src="" class="img-fluid my-3 d-none rounded shadow-sm" alt="State Banner">
            <div id="stateDescription" class="fs-5"></div>
        </div>
    </div>
</section>
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

        // ⭐ FIXED: Match DB slugs like "florida-car-transport"
        polygonSeries.events.on("datavalidated", function() {
            polygonSeries.mapPolygons.each(function(polygon) {

                let stateName = polygon.dataItem.dataContext.name;
                let basicSlug = stateName.toLowerCase().replace(/\s+/g, '-');

                // Find DB slug that starts with basic state slug
                let matchedSlug = availableStates.find(s => s.startsWith(basicSlug));

                if (matchedSlug) {
                    // Enabled clickable state
                    polygon.setAll({
                        fill: am5.color("#062e39"),
                        cursorOverStyle: "pointer",
                        tooltipText: stateName
                    });

                    polygon.events.on("click", function() {
                        window.location.href = `/states/${matchedSlug}`;
                    });

                } else {
                    // Disabled state
                    polygon.setAll({
                        fill: am5.color(0xdfe6e9),
                        interactive: false,
                        tooltipText: `${stateName} (Coming Soon)`
                    });
                }
            });
        });


        // Hover color (slightly lighter version of #062e39)
        polygonSeries.mapPolygons.template.states.create("hover", {
            fill: am5.color("#09414f")  // ✔ darker teal hover
        });
    });
</script>

