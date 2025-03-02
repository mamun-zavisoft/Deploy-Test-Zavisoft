<?php $page = 'purchasesDetails-list'; ?>
@extends('layout.mainlayout')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="card table-list-card">
                <div class="card-body">
                    <div class="table-top">
                        <div class="search-set">
                            <div class="search-input">
                                <a href="" class="btn btn-searchset"><i data-feather="search"
                                        class="feather-search"></i></a>
                            </div>
                        </div>
                        <div class="search-path">
                            <div class="d-flex align-items-center">
                                <a class="btn btn-filter" id="filter_search">
                                    <i data-feather="filter" class="filter-icon"></i>
                                    <span><img src="{{ URL::asset('/build/img/icons/closes.svg') }}" alt="img"></span>
                                </a>

                            </div>
                        </div>

                        <div class="form-sort">
                            <i data-feather="sliders" class="info-img"></i>
                            <select class="select">
                                <option>Sort by Date</option>
                                <option>Newest</option>
                                <option>Oldest</option>
                            </select>
                        </div>
                    </div>
                    <!-- /Filter -->
                    
                    <!-- /Filter -->
                    <div class="table-responsive">
                        <table class="table  datanew">
                            <thead>
                                <tr>
                                    <th class="no-sort">
                                        <label class="checkboxs">
                                            <input type="checkbox" id="select-all">
                                            <span class="checkmarks"></span>
                                        </label>
                                    </th>
                                    <th>Supplier Name</th>
                                    <th>Reference</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Grand Total</th>
                                    <th>Paid</th>
                                    <th>Due</th>
                                    <th>Payment Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody class="sales-list">
                                @foreach ($purchasesDetails as $purchasesDetail)
                                <tr>
                                    <td>
                                        <label class="checkboxs">
                                            <input type="checkbox">
                                            <span class="checkmarks"></span>
                                        </label>
                                    </td>
                                    <td>{{ $purchasesDetail->purchase->supplier?->name }}</td>
                                    <td>{{ $purchasesDetail->purchase->reference_no }}</td>
                                    <td>{{ $purchasesDetail->created_at?->format('d M Y') }}</td>
                                    <td>
                                        <span class="badge rounded-pill bg-outline-{{ $purchasesDetail->purchase->status == 'pending' ? 'warning' : 'success' }}">
                                            {{ $purchasesDetail->purchase->status }}
                                        </span>
                                    <td>{{ number_format($purchasesDetail->purchase->grand_total) }}</td>
                                    <td>{{ number_format($purchasesDetail->purchase->paid_amount) }}</td>
                                    <td>{{ number_format($purchasesDetail->purchase->due_amount) }}</td>
                                    <td>
                                        <span class="badge rounded-pill bg-outline-{{ $purchasesDetail->purchase->paid_status == 'full_paid' ? 'success' : 'warning' }}">
                                            {{ $purchasesDetail->purchase->paid_status }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <a class="action-set" href="javascript:void(0);" data-bs-toggle="dropdown"
                                            aria-expanded="true">
                                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item" data-bs-toggle="modal"
                                                    data-bs-target="#show-purchase-details-{{ $purchasesDetail->id }}"><i data-feather="eye"
                                                        class="info-img"></i>Purchase Detail</a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                <div class="modal fade" id="show-purchase-details-{{ $purchasesDetail->id }}">
                                    <div class="modal-dialog modal-dialog-centered" style="max-width: 90%; width: 90%; height: 100vh;">
                                        <div class="modal-content" style="height: 100%;">
                                            <div class="page-wrapper-new p-0" style="height: 100%;">
                                                <div class="content" style="height: 100%;">
                                                    <div class="modal-header border-0 custom-modal-header">
                                                        <div class="page-title">
                                                            <h4>Purchase Details</h4>
                                                        </div>
                                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body custom-modal-body new-employee-field" style="flex-grow: 1; overflow-y: auto;">
                                                        <div class="row mb-4">
                                                            <div class="col-md-8">
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <h5 class="card-title font-weight-bold mb-3">Supplier Info</h5>
                                                                        <p class="mb-1">Name: {{ $purchasesDetail->purchase->supplier->name ?? '' }}</p>
                                                                        <p class="mb-1">Phone: {{ $purchasesDetail->purchase->supplier->phone ?? '' }}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="col-md-4">
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <h5 class="card-title font-weight-bold mb-3">Invoice Info</h5>
                                                                        <div class="d-flex justify-content-between mb-1">
                                                                            <span>Reference:</span>
                                                                            <span class="fw-bolder">{{ $purchasesDetail->purchase->reference_no }}</span>
                                                                        </div>
                                                                        <div class="d-flex justify-content-between mb-1">
                                                                            <span>Payment Status:</span>
                                                                            <span class="fw-bolder text-{{ $purchasesDetail->purchase->paid_status == 'full_paid' ? 'success' : 'warning' }}">
                                                                                {{ $purchasesDetail->purchase->paid_status }}
                                                                            </span>
                                                                        </div>
                                                                        <div class="d-flex justify-content-between">
                                                                            <span>Status:</span>
                                                                            <span class="fw-bolder text-{{ $purchasesDetail->purchase->status == 'pending' ? 'warning' : 'success' }}">
                                                                                {{ $purchasesDetail->purchase->status }}
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <!-- Purchase Details Section -->
                                                        <div class="card mb-4">
                                                            <div class="card-body">
                                                                <h5 class="card-title font-weight-bold mb-4">Purchase Details</h5>
                                                                <div class="d-flex flex-wrap fw-bold border-bottom pb-2">
                                                                    <div class="flex-fill">Product Name</div>
                                                                    <div class="flex-fill text-center">Quantity</div>
                                                                    <div class="flex-fill text-center">Unit Price</div>
                                                                    <div class="flex-fill text-center">Sale Price</div>
                                                                    <div class="flex-fill text-center">Discount</div>
                                                                    <div class="flex-fill text-center">Status</div>
                                                                    <div class="flex-fill text-end">Price</div>
                                                                </div>

                                                                <div class="d-flex flex-wrap py-2 border-bottom">
                                                                    <div class="flex-fill">{{ $purchasesDetail->product?->name }}</div>
                                                                    <div class="flex-fill text-center" style="margin-left: 50px;">{{ $purchasesDetail->quantity }}</div>
                                                                    <div class="flex-fill text-center" style="margin-left: 50px;">{{ number_format($purchasesDetail->product?->purchase_price) }}</div>
                                                                    <div class="flex-fill text-center" style="margin-left: 50px;">{{ number_format($purchasesDetail->product->sale_price) }}</div>                                
                                                                    <div class="flex-fill text-center" style="margin-left: 50px;">{{ number_format($purchasesDetail->purchase->discount_amount) }}</div>                               
                                                                    <div class="flex-fill text-center">
                                                                        <span class="fw-bolder text-{{ $purchasesDetail->purchase->status == 'received' ? 'success' : 'warning' }}">
                                                                            {{ $purchasesDetail->purchase->status }}
                                                                        </span>
                                                                    </div>                               
                                                                    <div class="flex-fill text-end">{{ number_format($purchasesDetail->price) }}</div>
                                                                </div>
                                                                <!-- Total Section -->
                                                                <div class="row justify-content-end mt-4">
                                                                    <div class="col-md-5">
                                                                        <div class="bg-light p-3 rounded">                                                
                                                                            <div class="d-flex justify-content-between">
                                                                                <span class="font-weight-bold">Grand Total</span>
                                                                                <span class="font-weight-bold">{{ $purchasesDetail->purchase->grand_total }}</span>
                                                                            </div>
                                                                            <div class="d-flex justify-content-between mb-2">
                                                                                <span>Discount</span>
                                                                                <span>{{ $purchasesDetail->purchase->discount_amount }}</span>
                                                                            </div>
                                                                            <div class="d-flex justify-content-between mb-2">
                                                                                <span>Total Price</span>
                                                                                <span>{{ $purchasesDetail->price }}</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <!-- Footer Actions -->
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="d-flex justify-content-end">
                                                                    <button class="btn btn-secondary me-2">
                                                                        <i class="fa fa-print me-1"></i> Print
                                                                    </button>
                                                                    <button class="btn btn-primary">
                                                                        <i class="fa fa-download me-1"></i> Download PDF
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
