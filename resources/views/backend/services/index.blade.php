@extends('layout.mainlayout')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <x-breadcrumb title="Services List" button="Add Service" button-route="admin.services.create" />

            <!-- /service list -->
            <div class="card table-list-card">
                <div class="card-body">
                    <div class="table-top">
                        <div class="search-set">
                            <div class="search-input">
                                <a href="" class="btn btn-searchset"><i data-feather="search"
                                        class="feather-search"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- /Filter -->
                    <div class="table-responsive product-list">
                        <table class="table  datanew list">
                            <thead>
                                <tr>
                                    <th class="no-sort">
                                        <label class="checkboxs">
                                            <input type="checkbox" id="select-all">
                                            <span class="checkmarks"></span>
                                        </label>
                                    </th>
                                    <th>Service Type</th>
                                    <th>Vehicle </th>
                                    <th>Part Purchased</th>
                                    <th>Payment Type</th>
                                    <th>Grand Total</th>
                                    <th>Created On</th>
                                    <th class="no-sort">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($services as $service)
                                    <tr>
                                        <td>
                                            <label class="checkboxs">
                                                <input type="checkbox">
                                                <span class="checkmarks"></span>
                                            </label>
                                        </td>
                                        <td>{{ $service->service_type == 'self' ? 'Self' : 'External' }}</td>
                                        <td>{{ $service->vehicle?->license_plate }}</td>
                                        <td>
                                            <span class="badge rounded-pill {{ $service->any_parts_purchase ? 'bg-outline-success' : 'bg-outline-warning' }}">
                                                {{ $service->any_parts_purchase ? 'Yes' : 'No' }}
                                            </span>
                                        </td>
                                        <td>Cash</td>

                                        <td>{{ $service->grand_total }}</td>
                                        <td>{{ $service->created_at?->format('d M Y') }}</td>
                                        <td class="action-table-data">
                                            <div class="edit-delete-action">
                                                <a class="me-2 p-2" href="javascript:void(0);" data-bs-toggle="modal"
                                                data-bs-target="#service-{{ $service->id }}">
                                                    <i data-feather="eye" class="action-eye"></i>
                                                </a>
                                                <a class="me-2 p-2" data-bs-toggle="modal" data-bs-target="#edit-units">
                                                    <i data-feather="edit" class="feather-edit"></i>
                                                </a>
                                                <a class="confirm-text p-2" href="javascript:void(0);">
                                                    <i data-feather="trash-2" class="feather-trash-2"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="service-{{ $service->id }}">
                                    <div class="modal-dialog modal-dialog-centered" style="max-width: 90%; width: 90%; height: 100vh;">
                                        <div class="modal-content" style="height: 100%;">
                                            <div class="page-wrapper-new p-0" style="height: 100%;">
                                                <div class="content" style="height: 100%;">
                                                    <div class="modal-header border-0 custom-modal-header">
                                                        <div class="page-title">
                                                            <h4>Service Details</h4>
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
                                                                        <h5 class="card-title font-weight-bold mb-3">Vehicle Info</h5>
                                                                        <p class="mb-1">Vehicle: 
                                                                            <span class="fw-bolder text-{{ $service->vehicle?->owner_type == 1 ? 'success' : 'warning' }}">
                                                                                {{ $service->vehicle?->owner_type == 1 ? 'Self' : 'External' }}
                                                                            </span>
                                                                        </p>
                                                                        <p class="mb-1">License Plate: {{ $service->vehicle->license_plate }}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="col-md-4">
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <h5 class="card-title font-weight-bold mb-3">Invoice Info</h5>
                                                                        <div class="d-flex justify-content-between mb-1">
                                                                            <span>Reference:</span>
                                                                            <span class="fw-bolder"></span>
                                                                        </div>
                                                                        <div class="d-flex justify-content-between mb-1">
                                                                            <span>Payment Status:</span>
                                                                            <span class="fw-bolder">
                                                                            </span>
                                                                        </div>
                                                                        <div class="d-flex justify-content-between">
                                                                            <span>Status:</span>
                                                                            <span class="fw-bolder">
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <!-- Service Details Section -->
                                                        <div class="card mb-4">
                                                            <div class="card-body">
                                                                <h5 class="card-title font-weight-bold mb-4">Service Details</h5>
                                                                <div class="d-flex flex-wrap fw-bold border-bottom pb-2">
                                                                    <div class="flex-fill">Service Name</div>
                                                                    <div class="flex-fill">Code</div>
                                                                    <div class="flex-fill text-center">Price</div>
                                                                    <div class="flex-fill text-center">Total Amount</div>
                                                                    <div class="flex-fill text-center">Service Type</div>
                                                                </div>

                                                                @foreach ($service->serviceDetails as $data)
                                                                    <div class="d-flex flex-wrap py-2 border-bottom">
                                                                        <div class="flex-fill">{{ $data->serviceChart?->name }}</div>
                                                                        <div class="flex-fill">{{ $data->serviceChart?->code }}</div>
                                                                        <div class="flex-fill text-center">{{ $data->serviceChart?->price }}</div>
                                                                        <div class="flex-fill text-center">{{ $data->quantity * $data->serviceChart?->price }}</div>
                                                                        <div class="flex-fill text-center">{{ $data->serviceChart?->service_type }}</div>
                                                                    </div>
                                                                @endforeach
                                                                <!-- Total Section -->
                                                                <div class="row justify-content-end mt-4">
                                                                    <div class="col-md-5">
                                                                        <div class="bg-light p-3 rounded">                                                
                                                                            <div class="d-flex justify-content-between">
                                                                                <span class="font-weight-bold">Grand Total</span>
                                                                                <span class="font-weight-bold"></span>
                                                                            </div>
                                                                            <div class="d-flex justify-content-between mb-2">
                                                                                <span>Discount</span>
                                                                                <span></span>
                                                                            </div>
                                                                            <div class="d-flex justify-content-between mb-2">
                                                                                <span>Total Price</span>
                                                                                <span></span>
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
            <!-- /service list -->
        </div>
    </div>
@endsection
