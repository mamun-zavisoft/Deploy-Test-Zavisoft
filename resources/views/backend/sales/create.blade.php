@extends('layout.mainlayout')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <x-breadcrumb title="Create Parts Sale" button="Back to Sales" back-button-route="admin.sales.index" />

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Parts Sale</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.sales.store') }}" id="partsSaleForm" method="POST">
                        @csrf
                        <div class="row mb-4">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Select Parts <span class="text-danger">*</span></label>
                                    <select class="form-control select2" name="parts[]" id="partsSelect" multiple required>
                                        @foreach ($products as $product)
                                            @php
                                                $totalStock = $product->getTotalAvailableQuantity();
                                            @endphp
                                            <option value="{{ $product->id }}" data-total-stock="{{ $totalStock }}"
                                                data-price="{{ $product->sale_price }}">
                                                {{ $product->name }} (Available: {{ $totalStock }}) -
                                                ৳{{ number_format($product->sale_price, 2) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <div class="card bg-light">
                                <div class="card-header">
                                    <h5>Parts Details</h5>
                                </div>
                                <div class="card-body">
                                    <div id="partsContainer"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Discount</label>
                                    <input name="discount" type="number" class="form-control" id="discount" value="0"
                                        min="0">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Payment Account <span class="text-danger">*</span></label>
                                    <select class="form-control select2" name="account_id" id="payment_account" required>
                                        <option value="">Select Account</option>
                                        @foreach ($accounts as $account)
                                            <option value="{{ $account->id }}">
                                                {{ $account->name }} ({{ number_format($account->balance) }} ৳)
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Notes</label>
                                    <textarea name="note" class="form-control" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="col-6">
                                <label>Phone</label>
                                <input name="phone" class="form-control">
                            </div>
                        </div>

                        <div class="mb-4 bg-light card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Parts Total:</label>
                                            <h5 id="partsTotal">0.00</h5>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Discount:</label>
                                            <h5 id="discountAmount">0.00</h5>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group text-end">
                                            <label>Grand Total:</label>
                                            <h4 id="grandTotal">0.00</h4>
                                            <input type="hidden" name="grand_total" id="grandTotalInput" value="0">
                                            <input type="hidden" name="total_amount" id="totalAmountInput" value="0">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="text-end">
                            <button class="btn btn-primary" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <template id="partRowTemplate">
        <div class="row mb-3 part-row align-items-center">
            <div class="col-md-3">
                <div class="form-group mb-0">
                    <label class="mb-1">Part</label>
                    <input type="text" class="form-control  product-name" readonly>
                    <input type="hidden" name="parts[__index__][product_id]" class="part-id">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group mb-0">
                    <label class="mb-1">Rack</label>
                    <select class="form-control  rack-select" name="parts[__index__][rack_id]" required>
                        <option value="">Select Rack</option>
                    </select>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group mb-0">
                    <label class="mb-1">Drawer</label>
                    <select class="form-control  drawer-select" name="parts[__index__][drawer_id]" required>
                        <option value="">Select Drawer</option>
                    </select>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group mb-0">
                    <div class="d-flex justify-content-between">
                        <label class="mb-1">Quantity </label>
                    <small class="stock-info text-muted font-weight-light">Available: 0</small>
                    </div>
                    <input name="parts[__index__][quantity]" type="number"
                        class="form-control  part-quantity" value="1" min="1">
                    
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group mb-0">
                    <label class="mb-1">Price</label>
                    <div class="input-group input-group-sm">
                        <span class="input-group-text">৳</span>
                        <input name="parts[__index__][price]" class="form-control  part-price" readonly>
                    </div>
                </div>
            </div>
            <div class="col-md-1">
                <button type="button" class="btn btn-sm btn-danger remove-part-row mt-4">
                    <i class="fa fa-trash"></i>
                </button>
            </div>
        </div>
    </template>
@endsection

@push('scripts')
    <script>
       $(document).ready(function() {
    $('.select2').select2();
    let partsTotal = 0;
    let discount = 0;
    let grandTotal = 0;
    let partRowIndex = 0;

    // Parts selection handling
    $('#partsSelect').change(function() {
        updatePartsContainer();
    });

    // Remove part row
    $(document).on('click', '.remove-part-row', function() {
        $(this).closest('.part-row').remove();
        calculatePartsTotals();
    });

    function updatePartsContainer() {
        $('#partsContainer').empty(); // Clear the container before adding new parts
        partsTotal = 0;
        partRowIndex = 0; // Reset the index

        $('#partsSelect option:selected').each(function() {
            addPartRow($(this));
        });

        calculatePartsTotals();
    }

    function addPartRow(selectedOption) {
        let template = $('#partRowTemplate').html();
        template = template.replace(/__index__/g, partRowIndex);

        let $row = $(template);

        // Set part details
        $row.find('.part-id').val(selectedOption.val());

        // Correctly extract the product name
        let productName = selectedOption.text().split(' (Available:')[0].trim();
        $row.find('.product-name').val(productName);

        // Set max quantity based on available stock
        let totalStock = parseInt(selectedOption.data('total-stock'));
        $row.find('.part-quantity').attr('max', totalStock);
        $row.find('.stock-info').text(`Available: ${totalStock}`);

        // Set initial price
        let price = parseFloat(selectedOption.data('price')) || 0;
        $row.find('.part-price').val(price.toFixed(2));

        // Load racks for the product
        loadRacksForProduct(selectedOption.val(), $row);

        // Append the row to the container
        $('#partsContainer').append($row);

        // Initialize select2 for dynamically added dropdowns
        $row.find('.rack-select, .drawer-select').select2();

        partRowIndex++; // Increment the index for the next row
    }

    // Rack and Drawer loading
    function loadRacksForProduct(productId, row) {
        let url = "{{ route('admin.stock.get-racks-for-product', '') }}/" + productId;
        $.ajax({
            url: url,
            type: 'GET',
            success: function(response) {
                let rackSelect = row.find('.rack-select');
                rackSelect.html('<option value="">Select Rack</option>');

                if (response.racks && response.racks.length > 0) {
                    $.each(response.racks, function(index, rack) {
                        rackSelect.append(
                            `<option value="${rack.id}">${rack.name} (${rack.product_count})</option>`
                        );
                    });
                }
            },
            error: function() {
                toastr.error('Failed to load racks');
            }
        });
    }

    function loadDrawersForRack(productId, rackId, row) {
        let url = "{{ route('admin.stock.get-drawers-for-rack', [':productId', ':rackId']) }}"
            .replace(':productId', productId)
            .replace(':rackId', rackId);

        $.ajax({
            url: url,
            type: 'GET',
            success: function(response) {
                let drawerSelect = row.find('.drawer-select');
                drawerSelect.html('<option value="">Select Drawer</option>');

                if (response.drawers && response.drawers.length > 0) {
                    $.each(response.drawers, function(index, drawer) {
                        drawerSelect.append(
                            `<option value="${drawer.id}">${drawer.name} (${drawer.product_count})</option>`
                        );
                    });
                }
            },
            error: function() {
                toastr.error('Failed to load drawers');
            }
        });
    }

    // Rack selection triggers drawer loading
    $(document).on('change', '.rack-select', function() {
        let row = $(this).closest('.part-row');
        let rackId = $(this).val();
        let productId = row.find('.part-id').val();

        row.find('.drawer-select').html('<option value="">Select Drawer</option>');

        if (rackId && productId) {
            loadDrawersForRack(productId, rackId, row);
        }
    });

    // Quantity and total calculations
    $(document).on('input', '.part-quantity', function() {
        let row = $(this).closest('.part-row');
        let quantity = parseInt($(this).val()) || 0;
        let maxStock = parseInt($(this).attr('max')) || 0;
        let unitPrice = parseFloat(row.find('.part-price').val()) || 0;

        // Validate quantity
        if (quantity > maxStock) {
            $(this).val(maxStock);
            toastr.error(`Maximum available quantity is ${maxStock}`);
            quantity = maxStock;
        }

        calculatePartsTotals();
    });

    function calculatePartsTotals() {
        partsTotal = 0;
        $('.part-row').each(function() {
            let price = parseFloat($(this).find('.part-price').val()) || 0;
            let quantity = parseInt($(this).find('.part-quantity').val()) || 0;

            partsTotal += price * quantity;
        });

        $('#partsTotal').text(partsTotal.toFixed(2));
        updateTotals();
    }

    // Discount handling
    $('#discount').on('input', function() {
        let inputDiscount = parseFloat($(this).val()) || 0;
        let totalBeforeDiscount = partsTotal;

        if (inputDiscount > totalBeforeDiscount) {
            inputDiscount = totalBeforeDiscount;
            $(this).val(totalBeforeDiscount);
            toastr.warning('Discount cannot be more than the total amount');
        }

        discount = inputDiscount;
        updateTotals();
    });

    function updateTotals() {
        let totalBeforeDiscount = partsTotal;
        let discountAmount = Math.min(discount, totalBeforeDiscount);
        grandTotal = totalBeforeDiscount - discountAmount;

        $('#discountAmount').text(discountAmount.toFixed(2));
        $('#grandTotal').text(grandTotal.toFixed(2));
        $('#grandTotalInput').val(grandTotal);
        $('#totalAmountInput').val(totalBeforeDiscount);
    }

    // Form submission
    $('#partsSaleForm').submit(function(e) {
        e.preventDefault();

        // Validate parts selection
        if ($('#partsSelect').val() === null || $('#partsSelect').val().length === 0) {
            toastr.error('Please select at least one part');
            return false;
        }

        // Validate rack, drawer, and quantity for each part
        let valid = true;
        let uniqueCombinations = new Set();

        $('.part-row').each(function() {
            let productId = $(this).find('.part-id').val();
            let rackId = $(this).find('.rack-select').val();
            let drawerId = $(this).find('.drawer-select').val();
            let quantity = parseInt($(this).find('.part-quantity').val()) || 0;

            if (productId === '' || rackId === '' || drawerId === '' || quantity <= 0) {
                valid = false;
                toastr.error('Please complete all part details');
                return false;
            }

            let combination = `${productId}-${rackId}-${drawerId}`;
            if (uniqueCombinations.has(combination)) {
                toastr.error('Duplicate product-rack-drawer combination detected.');
                valid = false;
                return false;
            }
            uniqueCombinations.add(combination);
        });

        if (!valid) return false;

        // Validate payment account
        if ($('#payment_account').val() === '') {
            toastr.error('Please select a payment account');
            return false;
        }

        // Submit form via AJAX
        let formData = $(this).serialize();
        $.ajax({
            url: $(this).attr('action'),
            type: $(this).attr('method'),
            data: formData,
            success: function(response) {
                toastr.success(response.message);
                setTimeout(function() {
                    window.location.href = response.redirectUrl ||
                        "{{ route('admin.sales.index') }}";
                }, 1000);
            },
            error: function(xhr) {
                let response = xhr.responseJSON;
                if (response && response.errors) {
                    $.each(response.errors, function(key, value) {
                        toastr.error(value);
                    });
                } else if (response && response.message) {
                    toastr.error(response.message);
                } else {
                    toastr.error('An error occurred. Please try again.');
                }
            }
        });
    });
});
    </script>
@endpush
