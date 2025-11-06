    <section class="tj-service-section-three">
        <div class="container">
            <div class="row">
                <div class="tj-section-heading text-center">
                    <span class="sub-title active-shape"> Nationwide Coverage</span>
                    {{-- <h2 class="title">Bridgeway’s Coast-to-Coast Auto Transport Excellence</h2> --}}
                    {{-- <p class="states-map-description">
                        From bustling New York to sunny California, Bridgeway proudly delivers seamless, secure, and efficient vehicle 
                        transportation services across all fifty states. Our dedication to reliability, speed, and customer satisfaction 
                        sets us apart — making us the preferred choice for nationwide auto shipping. Explore our service coverage below.
                    </p> --}}
                </div>

            </div>
        </div>
        <div class="container-fluid p-0 pt-0 states-map-container">
            <div id="container" style="width:100%; height:85vh;"></div>
        </div>
    </section>
    {{-- Pass Laravel data to JavaScript --}}
    <script>
        const stateData = @json($states);
    </script>

    <!-- Add this BEFORE your AnyChart map script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/proj4js/2.3.15/proj4.js"></script>

    <!-- Then your AnyChart scripts -->
    <script src="https://cdn.anychart.com/releases/8.12.1/js/anychart-base.min.js"></script>
    <script src="https://cdn.anychart.com/releases/8.12.1/js/anychart-map.min.js"></script>
    <script src="https://cdn.anychart.com/releases/8.12.1/geodata/countries/united_states_of_america/united_states_of_america.js"></script>

    <link href="https://cdn.anychart.com/releases/v8/css/anychart-ui.min.css" rel="stylesheet">

    <script>

                    anychart.onDocumentReady(function () {
                        // ✅ Convert Laravel state data into AnyChart format
                        const data = @json($states).map(state => ({
                            id: 'US.' + (state.short_title || state.state_name).replace(/\s+/g, '').substring(0, 2).toUpperCase(),
                            name: state.state_name,
                            slug: state.slug,
                            banner_image: state.banner_image,
                            description: state.description_one ?? '',
                            value: Math.random() * 100 // can be replaced with a real metric later
                        }));

                        // 🗺 Create and configure the map
                        var map = anychart.map();
                        map.geoData('anychart.maps.united_states_of_america');
                        map.interactivity().selectionMode('none');
                        map.background().fill("#f6f6f6"); // --tj-dark-color2
                        map.padding(20, 0, 10, 0);
                        map.title()
                            .enabled(true)
                            .text('From bustling New York to sunny California, Bridgeway proudly delivers seamless, secure, and efficient vehicle  transportation services across all fifty states. Our dedication to reliability, speed, and customer satisfaction  sets us apart — making us the preferred choice for nationwide auto shipping. Explore our service coverage below.')
                            .fontFamily('DM Sans, sans-serif')
                            .fontColor('#062e39') // --tj-secondary-color
                            .fontSize(20)
                            .fontWeight(700);

                        // 🧩 Add series (regions)
                        var series = map.choropleth(data);
                        series.geoIdField('id');
                        series.labels(null);

                        // 🎨 Apply your site color theme
                        var colorScale = anychart.scales.linearColor();
                        colorScale.colors(['#ffd1c3', '#fd5523']); // --tj-primary-color2 to --tj-primary-color
                        series.colorScale(colorScale);

                        // 🌈 Enable color range legend
                        map.colorRange(true);
                        map.colorRange().labels().format('{%value}');
                        map.colorRange().stroke('#8f3c23'); // --tj-primary-color3
                        map.colorRange().ticks().stroke('#8f3c23');

                        // 💬 Tooltip styling (using your brand colors)
                        series.tooltip()
                            .useHtml(true)
                            .titleFormat('{%name}')
                            .format(function () {
                                const desc = this.getData('description')
                                    ? this.getData('description').substring(0, 100) + '...'
                                    : 'No description available';
                                const img = this.getData('banner_image')
                                    ? `<img src="{{ asset('') }}${this.getData('banner_image')}" width="120" style="margin-top:8px;border-radius:8px;">`
                                    : '';
                                return `<div style="font-family:Poppins,sans-serif;color:#062e39;">
                                            <strong>${this.getData('name')}</strong><br>
                                            <span style="font-size:13px;color:#7c858c;">${desc}</span><br>
                                            ${img}
                                        </div>`;
                            });

                        // ✨ Hover and default style customization
                        series.hovered()
                            .fill('#fd5523') // primary orange
                            .stroke('#8f3c23'); // darker accent
                        series.normal()
                            .fill('#ffd1c3') // soft background
                            .stroke('#e0e0e0'); // light gray
                        series.selected()
                            .fill('#8f3c23')
                            .stroke('#062e39');

                        // 🖱 Click to redirect to Laravel state page
                        series.listen('pointClick', function (e) {
                            const slug = e.point.get('slug');
                            if (slug) {
                                window.location.href = "{{ url('states') }}/" + slug;
                            }
                        });

                        // 🧭 Render map
                        map.container('container');
                        map.draw();
                    });

    </script>