// =========================
// Zip Code Auto Suggest + Steps
// =========================
const zipCodeList = [
    "New York,NY,10001",
    "Los Angeles,CA,90001",
    "Chicago,IL,60601",
    "Dallas,TX,75201",
    "Houston,TX,77001",
    "Miami,FL,33101",
    "Phoenix,AZ,85001",
    "San Francisco,CA,94101"
];

function showStep(stepId) {
    document.querySelectorAll('.route_quote_info, .vehicle_quote_info, .basic_quote_info')
        .forEach(div => div.style.display = "none");
    document.getElementById(stepId).style.display = "block";
}

function fetchSuggestionsStatic(inputField, suggestionsList) {
    const query = inputField.value.toLowerCase();
    suggestionsList.innerHTML = "";
    if (query.length >= 2) {
        zipCodeList
            .filter(item => item.toLowerCase().includes(query))
            .forEach(suggestion => {
                const li = document.createElement('li');
                li.textContent = suggestion;
                li.onclick = () => {
                    inputField.value = suggestion;
                    suggestionsList.innerHTML = "";
                };
                suggestionsList.appendChild(li);
            });
    }
}

document.addEventListener('DOMContentLoaded', () => {

    document.getElementById('pickup-location')?.addEventListener('input', function () {
        fetchSuggestionsStatic(this, document.querySelector('.suggestionsPickup'));
    });
    document.getElementById('delivery-location')?.addEventListener('input', function () {
        fetchSuggestionsStatic(this, document.querySelector('.suggestionsDelivery'));
    });


    document.getElementById('step1_next')?.addEventListener('click', () => showStep('step2'));
    document.getElementById('step2_previous')?.addEventListener('click', () => showStep('step1'));
    document.getElementById('step2_next')?.addEventListener('click', () => showStep('step3'));
    document.getElementById('step3_previous')?.addEventListener('click', () => showStep('step2'));


    document.getElementById('calculatePriceForm')?.addEventListener('submit', e => {
        e.preventDefault();
        alert('Quote request submitted successfully!');
    });
});

// =========================
// Vehicle Dynamic Fields
// =========================
$(document).ready(function () {
    var vehicleFields = {
        "Atv": `
            <div class="input-form single-input-field">
                <label>ATV Model:</label>
                <input type="text" placeholder="Enter ATV Model" required>
            </div>
            <div class="input-form single-input-field">
                <label>ATV Year:</label>
                <input type="number" placeholder="Enter Year" required>
            </div>
        `,
        "Boat-Transport": `
            <div class="input-form single-input-field">
                <label>Boat Length (ft):</label>
                <input type="number" placeholder="Length in feet" required>
            </div>
            <div class="input-form single-input-field">
                <label>Boat Weight (lbs):</label>
                <input type="number" placeholder="Weight in lbs" required>
            </div>
        `,
        "Car": `
            <div class="input-form single-input-field">
                <label>Car Make:</label>
                <input type="text" placeholder="e.g. Toyota" required>
            </div>
            <div class="input-form single-input-field">
                <label>Car Model:</label>
                <input type="text" placeholder="e.g. Corolla" required>
            </div>
            <div class="input-form single-input-field">
                <label>Car Year:</label>
                <input type="number" placeholder="e.g. 2020" required>
            </div>
        `,
        "Golf-Cart": `
            <div class="input-form single-input-field">
                <label>Golf Cart Model:</label>
                <input type="text" placeholder="Enter Model" required>
            </div>
        `,
        "Heavy-Equipment": `
            <div class="input-form single-input-field">
                <label>Equipment Type:</label>
                <input type="text" placeholder="Type of Equipment" required>
            </div>
            <div class="input-form single-input-field">
                <label>Weight (lbs):</label>
                <input type="number" placeholder="Enter weight" required>
            </div>
        `,
        "Motorcycle": `
            <div class="input-form single-input-field">
                <label>Motorcycle Make:</label>
                <input type="text" placeholder="e.g. Yamaha" required>
            </div>
            <div class="input-form single-input-field">
                <label>Motorcycle Model:</label>
                <input type="text" placeholder="Enter Model" required>
            </div>
        `,
        "RV-Transport": `
            <div class="input-form single-input-field">
                <label>RV Type:</label>
                <input type="text" placeholder="e.g. Class A" required>
            </div>
            <div class="input-form single-input-field">
                <label>Length (ft):</label>
                <input type="number" placeholder="Enter Length" required>
            </div>
        `
    };

    $("#tabSelector").change(function () {
        var selected = $(this).val();
        $("#firstVehicle").empty();
        if (selected) {
            $("#firstVehicle").html(`
                <div class="vehicle-block main-vehicle" style="border:1px solid #ccc; padding:10px; margin-bottom:10px;">
                    <h4>${selected.replace(/-/g, ' ')}</h4>
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
            <div class="vehicle-block extra-vehicle" style="border:1px solid #ccc; padding:10px; margin-bottom:10px; position:relative;">
                <button type="button" class="deleteVehicleBtn" style="position:absolute; top:5px; right:5px; background:red; color:white; border:none; padding:5px 10px; cursor:pointer;">Delete</button>
                <h4>${selected.replace(/-/g, ' ')}</h4>
                ${vehicleFields[selected]}
            </div>
        `;
        $("#additionalContent").append(vehicleHtml);
    });

    $(document).on("click", ".deleteVehicleBtn", function () {
        $(this).closest(".extra-vehicle").remove();
    });

    $("#calculatePriceForm").submit(function (e) {
        e.preventDefault();
        alert("Quote request submitted successfully!");
    });
});
