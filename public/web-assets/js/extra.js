// =========================
// Zip Code Auto Suggest + Steps
// =========================
// const zipCodeList = [
//     "New York,NY,10001",
//     "Los Angeles,CA,90001",
//     "Chicago,IL,60601",
//     "Dallas,TX,75201",
//     "Houston,TX,77001",
//     "Miami,FL,33101",
//     "Phoenix,AZ,85001",
//     "San Francisco,CA,94101"
// ];

// function showStep(stepId) {
//     document.querySelectorAll('.route_quote_info, .vehicle_quote_info, .basic_quote_info')
//         .forEach(div => div.style.display = "none");
//     document.getElementById(stepId).style.display = "block";
// }

// function fetchSuggestionsStatic(inputField, suggestionsList) {
//     const query = inputField.value.toLowerCase();
//     suggestionsList.innerHTML = "";
//     if (query.length >= 2) {
//         zipCodeList
//             .filter(item => item.toLowerCase().includes(query))
//             .forEach(suggestion => {
//                 const li = document.createElement('li');
//                 li.textContent = suggestion;
//                 li.onclick = () => {
//                     inputField.value = suggestion;
//                     suggestionsList.innerHTML = "";
//                 };
//                 suggestionsList.appendChild(li);
//             });
//     }
// }

// document.addEventListener('DOMContentLoaded', () => {

//     document.getElementById('pickup-location')?.addEventListener('input', function () {
//         fetchSuggestionsStatic(this, document.querySelector('.suggestionsPickup'));
//     });
//     document.getElementById('delivery-location')?.addEventListener('input', function () {
//         fetchSuggestionsStatic(this, document.querySelector('.suggestionsDelivery'));
//     });


//     document.getElementById('step1_next')?.addEventListener('click', () => showStep('step2'));
//     document.getElementById('step2_previous')?.addEventListener('click', () => showStep('step1'));
//     document.getElementById('step2_next')?.addEventListener('click', () => showStep('step3'));
//     document.getElementById('step3_previous')?.addEventListener('click', () => showStep('step2'));


//     document.getElementById('calculatePriceForm')?.addEventListener('submit', e => {
//         e.preventDefault();
//         alert('Quote request submitted successfully!');
//     });
// });

// =========================
// Vehicle Dynamic Fields
// =========================
$(document).ready(function () {
    var vehicleFields = {
        "Atv": `
            <div class="row mt-2">
                <div class="col-md-4">
                    <div class="input-form single-input-field">
                        <label>Year:</label>
                        <input type="number" name="vehicles[0][year]" placeholder="e.g. 2020" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="input-form single-input-field">
                        <label>Make:</label>
                        <input type="text" name="vehicles[0][make]" placeholder="e.g. Toyota" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="input-form single-input-field">
                        <label>Model:</label>
                        <input type="text" name="vehicles[0][model]" placeholder="e.g. Corolla" required>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-6">
                    <select class="form-control" name="vehicles[0][trailer_type]">
                        <option value="Open Trailer" {{ old('vehicles.0.trailer_type') == 'Open Trailer' ? 'selected' : '' }}>Open Trailer</option>
                        <option value="Enclosed Trailer" {{ old('vehicles.0.trailer_type') == 'Enclosed Trailer' ? 'selected' : '' }}>Enclosed Trailer</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <select class="form-control" name="vehicles[0][condition]">
                        <option value="Running" {{ old('vehicles.0.condition') == 'Running' ? 'selected' : '' }}>Running</option>
                        <option value="Non-Running" {{ old('vehicles.0.condition') == 'Non-Running' ? 'selected' : '' }}>Non-Running</option>
                    </select>
                </div>
            </div>

            <!-- Vehicle Images -->
            <div class="input-form mt-4">
                <input class="form-control image_input pt-0" name="vehicles[0][images][]" type="file" accept="image/*" multiple onchange="previewImages(event)">
                <div class="image-preview-container" id="imagePreviewContainer"></div>
            </div>
        `,
        "Boat-Transport": `
            <div class="row mt-2">
                <div class="col-md-4">
                    <div class="input-form single-input-field">
                        <label>Year:</label>
                        <input type="number" name="vehicles[0][year]" placeholder="e.g. 2020" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="input-form single-input-field">
                        <label>Make:</label>
                        <input type="text" name="vehicles[0][make]" placeholder="e.g. Toyota" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="input-form single-input-field">
                        <label>Model:</label>
                        <input type="text" name="vehicles[0][model]" placeholder="e.g. Corolla" required>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-4">
                    <div class="input-form single-input-field">
                        <label>Length (ft):</label>
                        <input type="number" placeholder="Length in feet" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="input-form single-input-field">
                        <label>Width (ft):</label>
                        <input type="number" placeholder="Width in feet" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="input-form single-input-field">
                        <label>Height (ft):</label>
                        <input type="number" placeholder="Width in feet" required>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="input-form single-input-field">
                        <label>Weight (lbs):</label>
                        <input type="number" placeholder="Weight in lbs" required>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-6">
                    <select class="form-control" name="vehicles[0][trailer_type]">
                        <option value="Open Trailer" {{ old('vehicles.0.trailer_type') == 'Open Trailer' ? 'selected' : '' }}>Open Trailer</option>
                        <option value="Enclosed Trailer" {{ old('vehicles.0.trailer_type') == 'Enclosed Trailer' ? 'selected' : '' }}>Enclosed Trailer</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <select class="form-control" name="vehicles[0][condition]">
                        <option value="Running" {{ old('vehicles.0.condition') == 'Running' ? 'selected' : '' }}>Running</option>
                        <option value="Non-Running" {{ old('vehicles.0.condition') == 'Non-Running' ? 'selected' : '' }}>Non-Running</option>
                    </select>
                </div>
            </div>

            <!-- Vehicle Images -->
            <div class="input-form mt-4">
                <input class="form-control image_input pt-0" name="vehicles[0][images][]" type="file" accept="image/*" multiple onchange="previewImages(event)">
                <div class="image-preview-container" id="imagePreviewContainer"></div>
            </div>

        `,
        "Car": `
            <div class="row mt-2">
                <div class="col-md-4">
                    <div class="input-form single-input-field">
                        <label>Year:</label>
                        <input type="number" name="vehicles[0][year]" placeholder="e.g. 2020" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="input-form single-input-field">
                        <label>Make:</label>
                        <input type="text" name="vehicles[0][make]" placeholder="e.g. Toyota" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="input-form single-input-field">
                        <label>Model:</label>
                        <input type="text" name="vehicles[0][model]" placeholder="e.g. Corolla" required>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-6">
                    <select class="form-control" name="vehicles[0][trailer_type]">
                        <option value="Open Trailer" {{ old('vehicles.0.trailer_type') == 'Open Trailer' ? 'selected' : '' }}>Open Trailer</option>
                        <option value="Enclosed Trailer" {{ old('vehicles.0.trailer_type') == 'Enclosed Trailer' ? 'selected' : '' }}>Enclosed Trailer</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <select class="form-control" name="vehicles[0][condition]">
                        <option value="Running" {{ old('vehicles.0.condition') == 'Running' ? 'selected' : '' }}>Running</option>
                        <option value="Non-Running" {{ old('vehicles.0.condition') == 'Non-Running' ? 'selected' : '' }}>Non-Running</option>
                    </select>
                </div>
            </div>

            <!-- Vehicle Images -->
            <div class="input-form mt-4">
                <input class="form-control image_input pt-0" name="vehicles[0][images][]" type="file" accept="image/*" multiple onchange="previewImages(event)">
                <div class="image-preview-container" id="imagePreviewContainer"></div>
            </div>
        `,
        "Golf-Cart": `
            <div class="row mt-2">
                <div class="col-md-4">
                    <div class="input-form single-input-field">
                        <label>Year:</label>
                        <input type="number" name="vehicles[0][year]" placeholder="e.g. 2020" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="input-form single-input-field">
                        <label>Make:</label>
                        <input type="text" name="vehicles[0][make]" placeholder="e.g. Toyota" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="input-form single-input-field">
                        <label>Model:</label>
                        <input type="text" name="vehicles[0][model]" placeholder="e.g. Corolla" required>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-6">
                    <select class="form-control" name="vehicles[0][trailer_type]">
                        <option value="Open Trailer" {{ old('vehicles.0.trailer_type') == 'Open Trailer' ? 'selected' : '' }}>Open Trailer</option>
                        <option value="Enclosed Trailer" {{ old('vehicles.0.trailer_type') == 'Enclosed Trailer' ? 'selected' : '' }}>Enclosed Trailer</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <select class="form-control" name="vehicles[0][condition]">
                        <option value="Running" {{ old('vehicles.0.condition') == 'Running' ? 'selected' : '' }}>Running</option>
                        <option value="Non-Running" {{ old('vehicles.0.condition') == 'Non-Running' ? 'selected' : '' }}>Non-Running</option>
                    </select>
                </div>
            </div>

            <!-- Vehicle Images -->
            <div class="input-form mt-4">
                <input class="form-control image_input pt-0" name="vehicles[0][images][]" type="file" accept="image/*" multiple onchange="previewImages(event)">
                <div class="image-preview-container" id="imagePreviewContainer"></div>
            </div>
        `,
        "Heavy-Equipment": `
            <div class="row mt-2">
                <div class="col-md-4">
                    <div class="input-form single-input-field">
                        <label>Year:</label>
                        <input type="number" placeholder="e.g. 2020" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="input-form single-input-field">
                        <label>Make:</label>
                        <input type="text" placeholder="e.g. Toyota" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="input-form single-input-field">
                        <label>Model:</label>
                        <input type="text" placeholder="e.g. Corolla" required>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-4">
                    <div class="input-form single-input-field">
                        <label>Length (ft):</label>
                        <input type="number" placeholder="Length in feet" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="input-form single-input-field">
                        <label>Width (ft):</label>
                        <input type="number" placeholder="Width in feet" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="input-form single-input-field">
                        <label>Height (ft):</label>
                        <input type="number" placeholder="Width in feet" required>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="input-form single-input-field">
                        <label>Weight (lbs):</label>
                        <input type="number" placeholder="Weight in lbs" required>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-6">
                    <select class="form-control" name="vehicles[0][trailer_type]">
                        <option value="Open Trailer" {{ old('vehicles.0.trailer_type') == 'Open Trailer' ? 'selected' : '' }}>Open Trailer</option>
                        <option value="Enclosed Trailer" {{ old('vehicles.0.trailer_type') == 'Enclosed Trailer' ? 'selected' : '' }}>Enclosed Trailer</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <select class="form-control" name="vehicles[0][condition]">
                        <option value="Running" {{ old('vehicles.0.condition') == 'Running' ? 'selected' : '' }}>Running</option>
                        <option value="Non-Running" {{ old('vehicles.0.condition') == 'Non-Running' ? 'selected' : '' }}>Non-Running</option>
                    </select>
                </div>
            </div>

            <!-- Vehicle Images -->
            <div class="input-form mt-4">
                <input class="form-control image_input pt-0" name="vehicles[0][images][]" type="file" accept="image/*" multiple onchange="previewImages(event)">
                <div class="image-preview-container" id="imagePreviewContainer"></div>
            </div>
        `,
        "Motorcycle": `
            <div class="row mt-2">
                <div class="col-md-4">
                    <div class="input-form single-input-field">
                        <label>Year:</label>
                        <input type="number" name="vehicles[0][year]" placeholder="e.g. 2020" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="input-form single-input-field">
                        <label>Make:</label>
                        <input type="text" name="vehicles[0][make]" placeholder="e.g. Toyota" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="input-form single-input-field">
                        <label>Model:</label>
                        <input type="text" name="vehicles[0][model]" placeholder="e.g. Corolla" required>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-6">
                    <select class="form-control" name="vehicles[0][trailer_type]">
                        <option value="Open Trailer" {{ old('vehicles.0.trailer_type') == 'Open Trailer' ? 'selected' : '' }}>Open Trailer</option>
                        <option value="Enclosed Trailer" {{ old('vehicles.0.trailer_type') == 'Enclosed Trailer' ? 'selected' : '' }}>Enclosed Trailer</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <select class="form-control" name="vehicles[0][condition]">
                        <option value="Running" {{ old('vehicles.0.condition') == 'Running' ? 'selected' : '' }}>Running</option>
                        <option value="Non-Running" {{ old('vehicles.0.condition') == 'Non-Running' ? 'selected' : '' }}>Non-Running</option>
                    </select>
                </div>
            </div>

            <!-- Vehicle Images -->
            <div class="input-form mt-4">
                <input class="form-control image_input pt-0" name="vehicles[0][images][]" type="file" accept="image/*" multiple onchange="previewImages(event)">
                <div class="image-preview-container" id="imagePreviewContainer"></div>
            </div>
        `,
        "RV-Transport": `
            <div class="row mt-2">
                <div class="col-md-4">
                    <div class="input-form single-input-field">
                        <label>Year:</label>
                        <input type="number" placeholder="e.g. 2020" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="input-form single-input-field">
                        <label>Make:</label>
                        <input type="text" placeholder="e.g. Toyota" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="input-form single-input-field">
                        <label>Model:</label>
                        <input type="text" placeholder="e.g. Corolla" required>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-4">
                    <div class="input-form single-input-field">
                        <label>Length (ft):</label>
                        <input type="number" placeholder="Length in feet" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="input-form single-input-field">
                        <label>Width (ft):</label>
                        <input type="number" placeholder="Width in feet" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="input-form single-input-field">
                        <label>Height (ft):</label>
                        <input type="number" placeholder="Width in feet" required>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="input-form single-input-field">
                        <label>Weight (lbs):</label>
                        <input type="number" placeholder="Weight in lbs" required>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-6">
                    <select class="form-control" name="vehicles[0][trailer_type]">
                        <option value="Open Trailer" {{ old('vehicles.0.trailer_type') == 'Open Trailer' ? 'selected' : '' }}>Open Trailer</option>
                        <option value="Enclosed Trailer" {{ old('vehicles.0.trailer_type') == 'Enclosed Trailer' ? 'selected' : '' }}>Enclosed Trailer</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <select class="form-control" name="vehicles[0][condition]">
                        <option value="Running" {{ old('vehicles.0.condition') == 'Running' ? 'selected' : '' }}>Running</option>
                        <option value="Non-Running" {{ old('vehicles.0.condition') == 'Non-Running' ? 'selected' : '' }}>Non-Running</option>
                    </select>
                </div>
            </div>

            <!-- Vehicle Images -->
            <div class="input-form mt-4">
                <input class="form-control image_input pt-0" name="vehicles[0][images][]" type="file" accept="image/*" multiple onchange="previewImages(event)">
                <div class="image-preview-container" id="imagePreviewContainer"></div>
            </div>
        `
    };

    $("#tabSelector").change(function () {
        var selected = $(this).val();
        $("#firstVehicle").empty();
        if (selected) {
            $("#firstVehicle").html(`
                <div class="vehicle-block main-vehicle" style="border:1px solid #ccc; padding:10px; margin-bottom:10px;">
                    <h4 class="text-white text-center text-decoration-underline">${selected.replace(/-/g, ' ')}</h4>
                    ${vehicleFields[selected]}
                </div>
            `);
            $("#addVehicleBtn").show();
        } else {
            $("#addVehicleBtn").hide();
        }
    });

    $("#addVehicleBtn").click(function () {
        var selected = $("#tabSelector").val();
        if (!selected) return;

        var vehicleHtml = `
        <div class="vehicle-block extra-vehicle" style="border:1px solid #ccc; padding:10px; margin-bottom:10px; position:relative; display:none;">
            <button type="button" class="deleteVehicleBtn" style="position:absolute; top:5px; right:5px; background:red; color:white; border:none; padding:5px 10px; cursor:pointer;">Delete</button>
            <h4 class="text-white text-center text-decoration-underline">${selected.replace(/-/g, ' ')}</h4>
            ${vehicleFields[selected]}
        </div>
    `;

        var $newBlock = $(vehicleHtml);
        $("#additionalContent").append($newBlock);
        $newBlock.slideDown(400); // Smooth reveal
    });


    $(document).on("click", ".deleteVehicleBtn", function () {
        $(this).closest(".extra-vehicle").slideUp(400, function () {
            $(this).remove(); // remove after animation
        });
    });


    $("#calculatePriceForm").submit(function (e) {
        e.preventDefault();
        alert("Quote request submitted successfully!");
    });
});
