@extends('layout.mainlayout')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <x-breadcrumb title="Fueling" />

            <!-- /add -->
            <div class="card">
                <div class="card-body">
                    <form id="storeForm" action="{{ route('admin.vehicle-fuels.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="input-blocks">
                                    <label>Select Vehicle</label>
                                    <select class="select" name="vehicle_id" id="vehicleSelect" required multiple>
                                        <option value="">Select</option>
                                        @foreach ($vehicles as $vehicle)
                                            <option value="{{ $vehicle->id }}">{{ $vehicle->license_plate }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="input-blocks">
                                    <label>Fuel Type</label>
                                    <select class="select" name="fuel_type" id="fuel_type" required>
                                        <option value="">Select</option>
                                        <option value="1">Diesel</option>
                                        <option value="2">Petrol</option>
                                        <option value="3">Octane</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="input-blocks">
                                    <label>Current ODO Meter (KM)</label>
                                    <input type="text" class="form-control" id="odo_meter" name="current_odometer"
                                        placeholder="Enter ODO Meter in KM" required>

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="input-blocks">
                                    <label>Fuel Quantity (Ltr.)</label>
                                    <input type="number" step="0.01" class="form-control" id="fuel_qty" name="fuel_qty"
                                        placeholder="Enter quantity" required>

                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="input-blocks">
                                    <label>Fuel Rate</label>
                                    <input type="number" step="0.01" class="form-control" id="fuel_rate"
                                        name="fuel_rate" placeholder="Enter fuel rate" required>

                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="input-blocks">
                                    <label>Total Price</label>
                                    <input type="number" step="0.01" class="form-control" id="total_price"
                                        name="total_price" placeholder="Enter price" readonly>

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="modal-footer-btn">
                                    <button type="button" class="btn btn-cancel me-2"
                                        onclick="window.location.href='{{ route('admin.vehicle-fuels.index') }}'">Cancel</button>
                                    <button type="submit" class="btn btn-submit" id="submit_btn">Save</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /add -->

            <div class="card mt-4">
                <div class="card-header">
                    <h4 class="card-title">Recent Fueling</h4>
                    <a href="{{ route('admin.vehicle-fuels.index') }}" class="btn btn-sm btn-primary float-end">See All</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive product-list" id="dataTable">
                        <x-vehicleFuels.table :entity="$recentFuelings" />
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $("#vehicleSelect").on("change", function() {
                let selectedOptions = $(this).find("option:selected");

                if (selectedOptions.length > 1) {
                    // Deselect all selected options except the last one
                    selectedOptions.each(function(index, option) {
                        if (index < selectedOptions.length - 1) {
                            $(option).prop("selected", false);
                        }
                    });

                    $(this).trigger("change");
                }
            });

            $('#fuel_qty, #fuel_rate').on('input', function() {
                calculateTotalPrice();
            });

            // Function to calculate total price
            function calculateTotalPrice() {
                let qty = parseFloat($('#fuel_qty').val()) || 0;
                let rate = parseFloat($('#fuel_rate').val()) || 0;
                let total = (qty * rate).toFixed(2);
                $('#total_price').val(total);
            }

            // Form submission with AJAX
            $('#storeForm').submit(function(e) {
                e.preventDefault();
                let SubmitBtn = $('#submit_btn');
                SubmitBtn.prop('disabled', true);
                let formData = new FormData(this);
                $.ajax({
                    type: $(this).attr('method'),
                    url: $(this).attr('action'),
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                }).done(function(response) {
                    if (response.type == 'success') {
                        toastr.success(response.message);
                        $('#submit_btn').attr('disabled', false);

                        let recentFuelings = $(response.latestFuelingsHtml);
                        
                        $('#dataTable').html(recentFuelings);
                        // reset form
                        $('#storeForm')[0].reset();
                        $('#vehicleSelect').trigger("change");
                        $('#fuel_type').trigger("change");
                    } else {
                        SubmitBtn.prop('disabled', false);
                        toastr.error(response.message);
                    }
                }).fail(function(xhr) {
                    SubmitBtn.prop('disabled', false);
                    $('#submit_btn').attr('disabled', false);
                    let response = xhr.responseJSON;
                    if (response && response.errors) {
                        $.each(response.errors, function(key, value) {
                            toastr.error(value);
                        });
                    }
                    if (response && response.message) {
                        toastr.error(response.message);
                    }
                });
            });
        });
    </script>
@endpush
