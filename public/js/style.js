// Change Element of Pricing Table Repair
function changeElement(selectElement) {
    var selectedOption = selectElement.options[selectElement.selectedIndex];
    var vehicleType = "";
    var transmission = "";
    if (selectedOption.tagName.toLowerCase() === 'option') {
        vehicleType = selectedOption.getAttribute('data-vehicle');
        transmission = selectedOption.getAttribute('data-transmission');

    }
    var element = document.getElementById("pricingTable");
    if (vehicleType == "car" && transmission == "manual") {
        element.innerHTML = `
            <div class="col">
                  <div class="card mb-4 rounded-3 shadow-sm">
                    <div class="card-header py-3">
                      <h4 >Reguler</h4>
                    </div>
                    <div class="card-body">
                      <h3 class="card-title mt-3">Rp 550.000</h3>
                      <div class="form-check mt-4">
                        <input class="form-check-input" type="radio" name="package" id="package1" value="550000">
                        <label class="form-check-label" for="package1">
                          Select
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="card mb-4 rounded-3 shadow-sm">
                    <div class="card-header py-3">
                      <h4>Medium</h4>
                    </div>
                    <div class="card-body">
                      <h3 class="card-title mt-3">Rp 850.000</h3>
                      <div class="form-check mt-4">
                        <input class="form-check-input" type="radio" name="package" id="package2" value="850000">
                        <label class="form-check-label" for="package2">
                          Select
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="card mb-4 rounded-3 shadow-sm border-primary">
                    <div class="card-header py-3 text-white bg-primary border-primary">
                      <h4>Advance</h4>
                    </div>
                    <div class="card-body">
                        <h3 class="card-title mt-3">Rp 1.250.000</h3>
                        <div class="form-check mt-4">
                            <input class="form-check-input" type="radio" name="package" id="package3" value="1250000">
                            <label class="form-check-label" for="package3">
                              Select
                            </label>
                        </div>
                    </div>
                  </div>
                </div>
            `;
    } else if (vehicleType == "car" && transmission == "automatic") {
        element.innerHTML = `
            <div class="col">
                  <div class="card mb-4 rounded-3 shadow-sm">
                    <div class="card-header py-3">
                      <h4 >Reguler</h4>
                    </div>
                    <div class="card-body">
                      <h3 class="card-title mt-3">Rp 650.000</h3>
                      <div class="form-check mt-4">
                        <input class="form-check-input" type="radio" name="package" id="package1" value="650000">
                        <label class="form-check-label" for="package1">
                          Select
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="card mb-4 rounded-3 shadow-sm">
                    <div class="card-header py-3">
                      <h4>Medium</h4>
                    </div>
                    <div class="card-body">
                      <h3 class="card-title mt-3">Rp 950.000</h3>
                      <div class="form-check mt-4">
                        <input class="form-check-input" type="radio" name="package" id="package2" value="950000">
                        <label class="form-check-label" for="package2">
                          Select
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="card mb-4 rounded-3 shadow-sm border-primary">
                    <div class="card-header py-3 text-white bg-primary border-primary">
                      <h4>Advance</h4>
                    </div>
                    <div class="card-body">
                        <h3 class="card-title mt-3">Rp 1.350.000</h3>
                        <div class="form-check mt-4">
                            <input class="form-check-input" type="radio" name="package" id="package3" value="1350000">
                            <label class="form-check-label" for="package3">
                              Select
                            </label>
                        </div>
                    </div>
                  </div>
                </div>
            `;
    } else if (vehicleType == "motorcycle" && transmission == "manual") {
        element.innerHTML = `
            <div class="col">
                  <div class="card mb-4 rounded-3 shadow-sm">
                    <div class="card-header py-3">
                      <h4 >Reguler</h4>
                    </div>
                    <div class="card-body">
                      <h3 class="card-title mt-3">Rp 120.000</h3>
                      <div class="form-check mt-4">
                        <input class="form-check-input" type="radio" name="package" id="package1" value="120000">
                        <label class="form-check-label" for="package1">
                          Select
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="card mb-4 rounded-3 shadow-sm">
                    <div class="card-header py-3">
                      <h4>Medium</h4>
                    </div>
                    <div class="card-body">
                      <h3 class="card-title mt-3">Rp 220.000</h3>
                      <div class="form-check mt-4">
                        <input class="form-check-input" type="radio" name="package" id="package2" value="220000">
                        <label class="form-check-label" for="package2">
                          Select
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="card mb-4 rounded-3 shadow-sm border-primary">
                    <div class="card-header py-3 text-white bg-primary border-primary">
                      <h4>Advance</h4>
                    </div>
                    <div class="card-body">
                        <h3 class="card-title mt-3">Rp 320.000</h3>
                        <div class="form-check mt-4">
                            <input class="form-check-input" type="radio" name="package" id="package3" value="320000">
                            <label class="form-check-label" for="package3">
                              Select
                            </label>
                        </div>
                    </div>
                  </div>
                </div>
            `;
    } else if (vehicleType == "motorcycle" && transmission == "automatic") {
        element.innerHTML = `
            <div class="col">
                  <div class="card mb-4 rounded-3 shadow-sm">
                    <div class="card-header py-3">
                      <h4 >Reguler</h4>
                    </div>
                    <div class="card-body">
                      <h3 class="card-title mt-3">Rp 150.000</h3>
                      <div class="form-check mt-4">
                        <input class="form-check-input" type="radio" name="package" id="package1" value="150000">
                        <label class="form-check-label" for="package1">
                          Select
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="card mb-4 rounded-3 shadow-sm">
                    <div class="card-header py-3">
                      <h4>Medium</h4>
                    </div>
                    <div class="card-body">
                      <h3 class="card-title mt-3">Rp 250.000</h3>
                      <div class="form-check mt-4">
                        <input class="form-check-input" type="radio" name="package" id="package2" value="250000">
                        <label class="form-check-label" for="package2">
                          Select
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="card mb-4 rounded-3 shadow-sm border-primary">
                    <div class="card-header py-3 text-white bg-primary border-primary">
                      <h4>Advance</h4>
                    </div>
                    <div class="card-body">
                        <h3 class="card-title mt-3">Rp 350.000</h3>
                        <div class="form-check mt-4">
                            <input class="form-check-input" type="radio" name="package" id="package3" value="350000">
                            <label class="form-check-label" for="package3">
                              Select
                            </label>
                        </div>
                    </div>
                  </div>
                </div>
            `;
    }

}

// Change Element of Pricing Table Wash
function changeElementWash(selectElement) {
    var selectedOption = selectElement.options[selectElement.selectedIndex];
    var vehicleType = "";
    if (selectedOption.tagName.toLowerCase() == "option") {
        vehicleType = selectedOption.getAttribute("data-vehicle");
    }
    var element = document.getElementById("pricingTableWash");
    if (vehicleType == "car") {
        element.innerHTML = `
            <div class="col">
                  <div class="card mb-4 rounded-3 shadow-sm">
                    <div class="card-header py-3">
                      <h4 >Reguler</h4>
                    </div>
                    <div class="card-body">
                      <h3 class="card-title mt-3">Rp 50.000</h3>
                      <div class="form-check mt-4">
                        <input class="form-check-input" type="radio" name="package" id="package1" value="50000">
                        <label class="form-check-label" for="package1">
                          Select
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="card mb-4 rounded-3 shadow-sm">
                    <div class="card-header py-3">
                      <h4>Premium</h4>
                    </div>
                    <div class="card-body">
                      <h3 class="card-title mt-3">Rp 100.000</h3>
                      <div class="form-check mt-4">
                        <input class="form-check-input" type="radio" name="package" id="package2" value="100000">
                        <label class="form-check-label" for="package2">
                          Select
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="card mb-4 rounded-3 shadow-sm border-primary">
                    <div class="card-header py-3 text-white bg-primary border-primary">
                      <h4>Detailing</h4>
                    </div>
                    <div class="card-body">
                        <h3 class="card-title mt-3">Rp 500.000</h3>
                        <div class="form-check mt-4">
                            <input class="form-check-input" type="radio" name="package" id="package3" value="500000">
                            <label class="form-check-label" for="package3">
                              Select
                            </label>
                        </div>
                    </div>
                  </div>
                </div>
            `;
    }
    else if (vehicleType == "motorcycle") {
        element.innerHTML = `
            <div class="col">
                  <div class="card mb-4 rounded-3 shadow-sm">
                    <div class="card-header py-3">
                      <h4 >Reguler</h4>
                    </div>
                    <div class="card-body">
                      <h3 class="card-title mt-3">Rp 20.000</h3>
                      <div class="form-check mt-4">
                        <input class="form-check-input" type="radio" name="package" id="package1" value="20000">
                        <label class="form-check-label" for="package1">
                          Select
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="card mb-4 rounded-3 shadow-sm">
                    <div class="card-header py-3">
                      <h4>Premium</h4>
                    </div>
                    <div class="card-body">
                      <h3 class="card-title mt-3">Rp 50.000</h3>
                      <div class="form-check mt-4">
                        <input class="form-check-input" type="radio" name="package" id="package2" value="50000">
                        <label class="form-check-label" for="package2">
                          Select
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="card mb-4 rounded-3 shadow-sm border-primary">
                    <div class="card-header py-3 text-white bg-primary border-primary">
                      <h4>Detailing</h4>
                    </div>
                    <div class="card-body">
                        <h3 class="card-title mt-3">Rp 150.000</h3>
                        <div class="form-check mt-4">
                            <input class="form-check-input" type="radio" name="package" id="package3" value="150000">
                            <label class="form-check-label" for="package3">
                              Select
                            </label>
                        </div>
                    </div>
                  </div>
                </div>
            `;
    }
}

// Change Data Modal Edit Vehicle
document.querySelector('#modalEditVehicle').addEventListener('show.bs.modal', function (event) {
    var button = event.relatedTarget // Button that triggered the modal
    var vehicleId = button.getAttribute('data-id')
    var editForm  = document.querySelector('#editForm')
    var vehicleName = button.getAttribute('data-name')
    var vehicleType = button.getAttribute('data-type')
    var vehicleTransmission = button.getAttribute('data-transmission')
    var vehicleLicensePlate = button.getAttribute('data-license-plate')
    editForm.action = "/vehicle/" + vehicleId
    var modal = this
    modal.querySelector('#vehicleName').value = vehicleName;


    var vehicleTypeSelect= vehicleType == "car" ? "1" : "2";
    var transmissionSelect = vehicleTransmission == "manual" ? "1" : "2";
    var vehicleTypeOption = modal.querySelector('#vehicleType option[value="' + vehicleTypeSelect + '"]');
    vehicleTypeOption.selected = true;
    var vehicleTransmissionOption = modal.querySelector('#vehicleTransmission option[value="' + transmissionSelect + '"]');
    vehicleTransmissionOption.selected = true;
    modal.querySelector('#vehicleLicensePlate').value = vehicleLicensePlate
})


// Change Data Modal Edit Spareparts
document.querySelector('#modalEditSparepart').addEventListener('show.bs.modal', function (event) {
    var button = event.relatedTarget // Button that triggered the modal
    var sparepartId = button.getAttribute('data-id')
    var editForm  = document.querySelector('#editFormSparepart')
    var sparepartName = button.getAttribute('data-name')
    var category = button.getAttribute('data-category')
    var sparepartPrice = button.getAttribute('data-price')
    editForm.action = "/sparepart/" + sparepartId
   
    var modal = this
    
    modal.querySelector('#nameEdit').value = sparepartName;
    console.log(sparepartName);
    modal.querySelector('#categoryEdit').value = category;
    modal.querySelector('#priceEdit').value = sparepartPrice;
})

// Change Data Modal Edit Booking
document.querySelector('#modalEditBooking').addEventListener('show.bs.modal', function (event) {
    var button = event.relatedTarget // Button that triggered the modal
    var bookingId = button.getAttribute('data-id')
    var editForm  = document.querySelector('#editFormBooking')
    var bookingStatus = button.getAttribute('data-status')
    editForm.action = "/booking/" + bookingId
    var modal = this
    var bookingStatusSelect = bookingStatus == "stand_by" ? "1" : "on_process" ? "2" : "3";
    var bookingStatusOption = modal.querySelector('#statusEdit option[value="' + bookingStatusSelect + '"]');
    bookingStatusOption.selected = true;
})



// Dropdown
$(document).ready(function() {
  $('.dropdown-toggle').dropdown();
});