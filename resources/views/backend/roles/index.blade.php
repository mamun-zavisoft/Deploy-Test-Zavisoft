<?php $page = 'roles'; ?>
@extends('layout.mainlayout')
@section('content')
<div class="page-wrapper">
    <div class="content">
        <x-breadcrumb title="Role List" sub-title="Manage Your Roles" button="Add New Role" button-route="roles.create" />

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        
        <div class="card table-list-card">
                <x-filter />

                <div class="table-responsive" id="dataTable">
                    <x-roles.table :roles="$roles" />
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {


// Delete confirmation
$('.confirm-text').on('click', function() {
    if (confirm('Are you sure you want to delete this role?')) {
        $(this).closest('tr').find('.delete-form').submit();
    }
});

// Select all checkbox
$('#select-all').on('change', function() {
    $('input[type="checkbox"]').prop('checked', $(this).prop('checked'));
});
});
</script>
@endpush