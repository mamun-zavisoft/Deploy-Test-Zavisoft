@extends('layout.mainlayout')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <x-breadcrumb title="Add Purchase" button="Back to Purchase" back-button-route="admin.purchases.index" />

            <!-- /add -->
            <form id="storeForm" action="{{ route('admin.purchases.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="page-wrapper-new p-0">
                    <div class="content shadow">
                        {{-- <div class="modal-header border-0 custom-modal-header">
                            <div class="page-title">
                                <h4>Add Purchase</h4>
                            </div>
                        </div> --}}
                        <div class="modal-body custom-modal-body">
                            <div class="row">
                                <div class="col-lg-3 col-md-6 col-sm-12">
                                    <div class="input-blocks add-product">
                                        <label>Supplier Name</label>
                                        <div class="row">
                                            <div class="col-lg-10 col-sm-10 col-10">
                                                <select class="select">
                                                    <option>Select Customer</option>
                                                    <option>Apex Computers</option>
                                                    <option>Dazzle Shoes</option>
                                                    <option>Best Accessories</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-2 col-sm-2 col-2 ps-0">
                                                <div class="add-icon tab">
                                                    <a href="javascript:void(0);"><i data-feather="plus-circle"
                                                            class="feather-plus-circles"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-12">
                                    <div class="input-blocks">
                                        <label>Purchase Date</label>

                                        <div class="input-groupicon calender-input">
                                            <i data-feather="calendar" class="info-img"></i>
                                            <input type="text" class="datetimepicker" placeholder="Choose"
                                                name="date">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-12">
                                    <div class="input-blocks">
                                        <label>Reference No</label>
                                        <input type="text" class="form-control" name="reference_no">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="input-blocks search-item">
                                        <label>Product Name</label>
                                        <input id="product_search" type="text"
                                            placeholder="Please type product code and select">
                                        <div id="myOptions" class="options-list text-center pt-2">
                                            {{-- searched product will appear here --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="modal-body-table">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Product Name</th>
                                                        <th>QTY</th>
                                                        <th>Purchase Price(৳) </th>
                                                        <th>Sale Price(৳) </th>
                                                        <th>Total Cost (৳) </th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody id="cart-list-items">
                                                    {{-- cart items will appear here --}}
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-6 col-sm-12">
                                        <div class="input-blocks">
                                            <label>Discount</label>
                                            <input type="text" value="0" name="discount_amount">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-12">
                                        <div class="input-blocks">
                                            <label>Shipping</label>
                                            <input type="text" value="0" name="shipping_charge">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-12">
                                        <div class="input-blocks">
                                            <label>Status</label>
                                            <select class="select">
                                                <option value="">Choose</option>
                                                <option value="received">Received</option>
                                                <option value="pending">Pending</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                {{-- show total amount in ledger type view total next line, discount then charge then next line grand total (not in input field, but in span with id ) --}}
                                


                                <div class="col-lg-12">
                                    <div class="input-blocks summer-description-box">
                                        <label>Notes</label>
                                        <textarea id="summernote" name="note"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="modal-footer-btn">
                                        <button type="button" class="btn btn-cancel me-2"
                                            data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-submit">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </form>
            <!-- /add -->

        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {

        });


        function handleSearch() {
            let search = $(this).val();
            $('#myOptions').html('<div class="spinner-border" role="status">' +
                '<span class="visually-hidden">Loading...</span>' +
                '</div>');

            $.ajax({
                url: "{{ route('admin.products.search') }}",
                type: 'GET',
                data: {
                    search: search,
                },
                success: function(res) {
                    $('#myOptions').html(res);
                    $('#product_search').empty();
                    $('#myOptions').show(); // Show the dropdown
                }
            });
        }

        $('#product_search').on('click keyup', handleSearch);

        // Hide dropdown when clicking outside
        $(document).on('click', function(event) {
            if (!$(event.target).closest('.search-item').length) {
                $('#myOptions').hide();
            }
        });

        let charge_amount = 0;
        let discount_amount = 0;
        let delivery_charge = 0;
        let total_amount = subtotal_amount = 0;

        $(document).on('click', '.product_cart', function() {
            let id = $(this).data('id');
            let img = $(this).data('img');
            let title = $(this).data('title');
            let purchase_price = parseFloat($(this).data('purchase-price'));
            let sale_price = parseFloat($(this).data('sale-price'));

            if ($(`#cart-list-items .item${id}`).length > 0) {
                let quantityInput = $(`#qty${id}`);
                let currentQuantity = parseInt(quantityInput.val());
                // quantityInput.val(currentQuantity + 1);
            } else {
                let tr_product = `
                <tr class="item item${id}">
                    <input type="hidden" name="product_id[]" value="${id}">
                    <td>
                        <div class="productimgname">
                            <a href="javascript:void(0);" class="product-img stock-img">
                                <img src="${img}" alt="${title}" onerror="this.onerror=null; this.src='{{ asset('assets/images/no_photo.webp') }}';">
                            </a>
                            <a href="javascript:void(0);">${title}</a>
                        </div>
                    </td>
                    <td>
                        <div class="product-quantity">
                            <span class="quantity-btn" >+<i data-feather="plus-circle" class="plus-circle"></i></span>
                            <input type="text" id="qty${id}" name="qty[]" data-price="${purchase_price}" class="quntity-input" value="1" data-id="${id}" >
                            <span class="quantity-btn" ><i data-feather="minus-circle" class="feather-search"></i></span>
                        </div>
                    </td>
                    <td>${purchase_price}</td>
                    <td>${sale_price}</td>
                    <td>${purchase_price}</td>
                    <td>
                        <a class="delete-set cart-item-action" data-id="${id}"><img src="{{ URL::asset('/build/img/icons/delete.svg') }}" alt="delete"></a>
                    </td>
                </tr>`;

                $('#cart-list-items').prepend(tr_product);
            }
            subtotal_amount += purchase_price;
            // remove searched text from input field
            $('#product_search').val('');

            // updateCartAction()
        })
    </script>
@endpush
