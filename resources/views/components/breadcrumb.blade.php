@if (Route::is(['add-product']))
    <div class="page-header">
        <div class="add-item d-flex">
            <div class="page-title">
                <h4>{{ $title }}</h4>
                <h6>{{ $li_1 }}</h6>
            </div>
        </div>
        <ul class="table-top-head">
            <li>
                <div class="page-btn">
                    <a href="{{ $li_2 }}" class="btn btn-secondary"><i data-feather="arrow-left"
                            class="me-2"></i>{{ $li_3 }}</a>
                </div>
            </li>
            <li>
                <a data-bs-toggle="tooltip" data-bs-placement="top" title="Collapse" id="collapse-header"><i
                        data-feather="chevron-up" class="feather-chevron-up"></i></a>
            </li>
        </ul>

    </div>
@endif

@if (
    !Route::is([
        'add-product',
        'chart-apex',
        'chart-c3',
        'chart-flot',
        'chart-js',
        'chart-morris',
        'chart-peity',
        'data-tables',
        'tables-basic',
        'form-basic-inputs',
        'form-checkbox-radios',
        'form-input-groups',
        'form-grid-gutters',
        'form-select',
        'form-mask',
        'form-fileupload',
        'form-horizontal',
        'form-vertical',
        'form-floating-labels',
        'form-validation',
        'form-select2',
        'form-wizard',
        'icon-fontawesome',
        'icon-feather',
        'icon-ionic',
        'icon-material',
        'icon-pe7',
        'icon-simpleline',
        'icon-themify',
        'icon-weather',
        'icon-typicon',
        'icon-flag',
        'ui-clipboard',
        'ui-counter',
        'ui-drag-drop',
        'ui-rating',
        'ui-ribbon',
        'ui-scrollbar',
        'ui-stickynote',
        'ui-text-editor',
        'ui-timeline',
    ]))
    <div class="page-header">
        <div class="add-item d-flex">
            <div class="page-title">
                <h4>{{ $title }}</h4>
                <h6>{{ $li_1 }}</h6>
            </div>
        </div>
        <ul class="table-top-head">
            <li>
                <a data-bs-toggle="tooltip" data-bs-placement="top" title="Pdf"><img
                        src="{{ URL::asset('/build/img/icons/pdf.svg') }}" alt="img"></a>
            </li>
            <li>
                <a data-bs-toggle="tooltip" data-bs-placement="top" title="Excel"><img
                        src="{{ URL::asset('/build/img/icons/excel.svg') }}" alt="img"></a>
            </li>
            <li>
                <a data-bs-toggle="tooltip" data-bs-placement="top" title="Print"><i data-feather="printer"
                        class="feather-rotate-ccw"></i></a>
            </li>
            <li>
                <a data-bs-toggle="tooltip" data-bs-placement="top" title="Refresh"><i data-feather="rotate-ccw"
                        class="feather-rotate-ccw"></i></a>
            </li>
            <li>
                <a data-bs-toggle="tooltip" data-bs-placement="top" title="Collapse" id="collapse-header"><i
                        data-feather="chevron-up" class="feather-chevron-up"></i></a>
            </li>
        </ul>
        @if (Route::is(['users.*']))
            <div class="page-btn">
                <a href="{{ route('users.create') }}" class="btn btn-added" data-bs-toggle="modal" data-bs-target="#add-units"><i
                        data-feather="plus-circle" class="me-2"></i>Add New User</a>
            </div>
        @endif
        @if (Route::is(['roles.*']))
            <div class="page-btn">
                <a href="#" class="btn btn-added" data-bs-toggle="modal" data-bs-target="#add-units"><i
                        data-feather="plus-circle" class="me-2"></i> Add New Role</a>
            </div>
        @endif
    </div>
@endif

@if (Route::is([
        'chart-apex',
        'chart-c3',
        'chart-flot',
        'chart-js',
        'chart-morris',
        'chart-peity',
        'data-tables',
        'tables-basic',
        'form-basic-inputs',
        'form-checkbox-radios',
        'form-input-groups',
        'form-grid-gutters',
        'form-select',
        'form-mask',
        'form-fileupload',
        'form-horizontal',
        'form-vertical',
        'form-floating-labels',
        'form-validation',
        'form-select2',
        'form-wizard',
        'icon-fontawesome',
        'icon-feather',
        'icon-ionic',
        'icon-material',
        'icon-pe7',
        'icon-simpleline',
        'icon-themify',
        'icon-weather',
        'icon-typicon',
        'icon-flag',
        'ui-clipboard',
        'ui-counter',
        'ui-drag-drop',
        'ui-rating',
        'ui-ribbon',
        'ui-scrollbar',
        'ui-stickynote',
        'ui-text-editor',
        'ui-timeline',
    ]))
    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-title">{{ $title }}</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('index') }}">{{ $li_1 }}</a></li>
                    <li class="breadcrumb-item active">{{ $li_2 }}</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /Page Header -->
@endif
