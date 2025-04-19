@extends('layout.mainlayout')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <x-breadcrumb-modal title="Hub List" sub-title="Manage hub" permission="hub-create" button="Add hub"
                modal-id="add-hub" />

            <!-- filter -->
            <div class="card table-list-card">
                <x-filter>
                    <div class="col-lg-4 col-sm-3 col-12 ms-2" style="width: 200px;">
                        <!-- Import Excel Button -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#importExcelModal">
                            Import Excel
                        </button>
                    </div>

                </x-filter>

                <!-- /Filter -->
                <div class="table-responsive" id="dataTable">
                    <x-hubs.table :hubs="$hubs" :racks="$zones" />
                </div>
            </div>
        </div>
        <!-- /hub list -->
    </div>
    </div>

    <!-- Add Hub -->
    <div class="modal fade" id="add-hub">
        <div class="modal-dialog modal-dialog-centered custom-modal-two">
            <div class="modal-content">
                <div class="page-wrapper-new p-0">
                    <div class="content">
                        <div class="modal-header border-0 custom-modal-header justify-content-between">
                            <div class="page-title">
                                <h4>Create Hub</h4>
                            </div>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"
                                onclick="$('#storeForm')[0].reset()">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body custom-modal-body new-employee-field">
                            <form action="{{ route('admin.hubs.store') }}" method="POST" id="storeForm">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Name*</label>
                                    <input type="text" name="name" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Hub Id*</label>
                                    <input type="text" name="custom_hub_id" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Phone*</label>
                                    <input type="text" name="phone" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Address</label>
                                    <input type="text" name="address" class="form-control">
                                </div>
                                <div class="modal-footer-btn">
                                    <button type="button" class="btn btn-cancel me-2"
                                        data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-submit" id="submit_btn">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Import Hub Modal -->
    <div class="modal fade" id="importExcelModal" tabindex="-1" aria-labelledby="importHubModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="importHubModalLabel">Import Excel (.xlsx)</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="saveButton" action="{{ route('admin.import.hubs') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="excelFile" class="form-label">Choose File</label>
                            <input type="file" class="form-control" id="excelFile" name="file"
                                accept=".xlsx,.xls,.csv">
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <a href="{{ asset('Hub Address List .xlsx') }}" download
                            class="btn btn-secondary btn-sm d-flex align-items-center justify-content-center">
                            <span class="spinner-border spinner-border-sm me-2 d-none" id="importSpinner" role="status"
                                aria-hidden="true"></span>
                            Download Sample
                        </a>
                        <button type="submit" class="btn btn-primary" id="importSpinner">Import</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        // ajax call for store
        $(document).ready(function() {
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
                        $('#add-hub').modal('hide');
                        toastr.success(response.message);
                        setTimeout(() => {
                            location.reload();
                        }, 1000);
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

            $('.editForm').submit(function(e) {
                e.preventDefault();
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
                        setTimeout(() => {
                            location.reload();
                        }, 1000);
                    } else {
                        toastr.error(response.message);
                    }
                }).fail(function(xhr) {
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

            $('#saveButton').on('submit', function(e) {
                e.preventDefault();

                let formData = new FormData(this);
                let submitButton = $(this).find('button[type="submit"]');
                let spinner = $('#importSpinner');

                submitButton.prop('disabled', true);
                spinner.removeClass('d-none');

                $.ajax({
                    url: $(this).attr('action'),
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        console.log(response);
                        // Close the modal
                        $('#importExcelModal').modal('hide');

                        // Show success message
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: response.message,
                            showConfirmButton: false,
                            timer: 1500
                        }).then(() => {
                            // Optionally refresh the page or table
                            location.reload();
                        });

                    },
                    error: function(xhr) {
                        let message = 'Something went wrong!';
                        console.log(xhr.responseJSON.error);
                        if (xhr.responseJSON.error) {
                            message = xhr.responseJSON.error;
                        }

                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: message
                        });
                    },
                    complete: function() {
                        submitButton.prop('disabled', false);
                        spinner.addClass('d-none');
                    }
                });
            });
        });
    </script>
@endpush
