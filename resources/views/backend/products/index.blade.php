@extends('layout.mainlayout')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <x-breadcrumb title="Product List" sub-title="Manage Your Products" button="Add Product" button-route="admin.products.create" />

            <!-- /product list -->
            <div class="card table-list-card">
                <div class="card-body">
                    <div class="table-top">
                        <div class="search-set">
                            <div class="search-input">
                                <a href="javascript:void(0);" class="btn btn-searchset"><i data-feather="search"
                                        class="feather-search"></i></a>
                            </div>
                        </div>
                        <div class="search-path">
                            <a class="btn btn-filter" id="filter_search">
                                <i data-feather="filter" class="filter-icon"></i>
                                <span><img src="{{ URL::asset('/build/img/icons/closes.svg') }}" alt="img"></span>
                            </a>
                        </div>
                        <div class="form-sort">
                            <i data-feather="sliders" class="info-img"></i>
                            <select class="select">
                                <option>Sort by Date</option>
                                <option>14 09 23</option>
                                <option>11 09 23</option>
                            </select>
                        </div>
                    </div>
                    <!-- /Filter -->
                    <div class="card mb-0" id="filter_inputs">
                        <div class="card-body pb-0">
                            <div class="row">
                                <div class="col-lg-12 col-sm-12">
                                    <div class="row">
                                        <div class="col-lg-2 col-sm-6 col-12">
                                            <div class="input-blocks">
                                                <i data-feather="box" class="info-img"></i>
                                                <select class="select">
                                                    <option>Choose Product</option>
                                                    <option>
                                                        Lenovo 3rd Generation</option>
                                                    <option>Nike Jordan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-sm-6 col-12">
                                            <div class="input-blocks">
                                                <i data-feather="stop-circle" class="info-img"></i>
                                                <select class="select">
                                                    <option>Choose Categroy</option>
                                                    <option>Laptop</option>
                                                    <option>Shoe</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-2 col-sm-6 col-12">
                                            <div class="input-blocks">
                                                <i data-feather="git-merge" class="info-img"></i>
                                                <select class="select">
                                                    <option>Choose Sub Category</option>
                                                    <option>Computers</option>
                                                    <option>Fruits</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-2 col-sm-6 col-12">
                                            <div class="input-blocks">
                                                <i data-feather="stop-circle" class="info-img"></i>
                                                <select class="select">
                                                    <option>All Brand</option>
                                                    <option>Lenovo</option>
                                                    <option>Nike</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-2 col-sm-6 col-12">
                                            <div class="input-blocks">
                                                <i class="fas fa-money-bill info-img"></i>
                                                <select class="select">
                                                    <option>Price</option>
                                                    <option>$12500.00</option>
                                                    <option>$12500.00</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-sm-6 col-12">
                                            <div class="input-blocks">
                                                <a class="btn btn-filters ms-auto"> <i data-feather="search"
                                                        class="feather-search"></i> Search </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Filter -->
                    <div class="table-responsive product-list">
                        <table class="table datanew">
                            <thead>
                                <tr>
                                    <th class="no-sort">
                                        <label class="checkboxs">
                                            <input type="checkbox" id="select-all">
                                            <span class="checkmarks"></span>
                                        </label>
                                    </th>
                                    <th>Product</th>
                                    <th>SKU</th>
                                    <th>Category</th>
                                    <th>Brand</th>
                                    <th>Price</th>
                                    <th>Unit</th>
                                    <th>Qty</th>
                                    <th>Created by</th>
                                    <th class="no-sort">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <label class="checkboxs">
                                            <input type="checkbox">
                                            <span class="checkmarks"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <div class="productimgname">
                                            <a href="javascript:void(0);" class="product-img stock-img">
                                                <img src="{{ URL::asset('/build/img/products/stock-img-01.png') }}"
                                                    alt="product">
                                            </a>
                                            <a href="javascript:void(0);">Lenovo 3rd Generation </a>
                                        </div>
                                    </td>
                                    <td>PT001 </td>
                                    <td>Laptop</td>
                                    <td>Lenovo</td>
                                    <td>$12500.00</td>
                                    <td>Pc</td>
                                    <td>100</td>
                                    <td>
                                        <div class="userimgname">
                                            <a href="javascript:void(0);" class="product-img">
                                                <img src="{{ URL::asset('/build/img/users/user-30.jpg') }}" alt="product">
                                            </a>
                                            <a href="javascript:void(0);">Arroon</a>
                                        </div>
                                    </td>
                                    <td class="action-table-data">
                                        <div class="edit-delete-action">
                                            <a class="me-2 edit-icon  p-2" href="{{ url('product-details') }}">
                                                <i data-feather="eye" class="feather-eye"></i>
                                            </a>
                                            <a class="me-2 p-2" href="{{ url('edit-product') }}">
                                                <i data-feather="edit" class="feather-edit"></i>
                                            </a>
                                            <a class="confirm-text p-2" href="javascript:void(0);">
                                                <i data-feather="trash-2" class="feather-trash-2"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="checkboxs">
                                            <input type="checkbox">
                                            <span class="checkmarks"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <div class="productimgname">
                                            <a href="javascript:void(0);" class="product-img stock-img">
                                                <img src="{{ URL::asset('/build/img/products/stock-img-06.png') }}"
                                                    alt="product">
                                            </a>
                                            <a href="javascript:void(0);">Bold V3.2</a>
                                        </div>
                                    </td>
                                    <td>PT002</td>
                                    <td>Electronics</td>
                                    <td>Bolt</td>
                                    <td>$1600.00</td>
                                    <td>Pc</td>
                                    <td>140</td>
                                    <td>
                                        <div class="userimgname">
                                            <a href="javascript:void(0);" class="product-img">
                                                <img src="{{ URL::asset('/build/img/users/user-13.jpg') }}"
                                                    alt="product">
                                            </a>
                                            <a href="javascript:void(0);">Kenneth</a>
                                        </div>
                                    </td>
                                    <td class="action-table-data">
                                        <div class="edit-delete-action">
                                            <a class="me-2 edit-icon p-2" href="{{ url('product-details') }}">
                                                <i data-feather="eye" class="action-eye"></i>
                                            </a>
                                            <a class="me-2 p-2" href="{{ url('edit-product') }}">
                                                <i data-feather="edit" class="feather-edit"></i>
                                            </a>
                                            <a class="confirm-text p-2" href="javascript:void(0);">
                                                <i data-feather="trash-2" class="feather-trash-2"></i>
                                            </a>
                                        </div>

                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="checkboxs">
                                            <input type="checkbox">
                                            <span class="checkmarks"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <div class="productimgname">
                                            <a href="javascript:void(0);" class="product-img stock-img">
                                                <img src="{{ URL::asset('/build/img/products/stock-img-02.png') }}"
                                                    alt="product">
                                            </a>
                                            <a href="javascript:void(0);">Nike Jordan</a>
                                        </div>
                                    </td>
                                    <td>PT003</td>
                                    <td>Shoe</td>
                                    <td>Nike</td>
                                    <td>$6000.00</td>
                                    <td>Pc</td>
                                    <td>780</td>
                                    <td>
                                        <div class="userimgname">
                                            <a href="javascript:void(0);" class="product-img">
                                                <img src="{{ URL::asset('/build/img/users/user-11.jpg') }}"
                                                    alt="product">
                                            </a>
                                            <a href="javascript:void(0);">Gooch</a>
                                        </div>
                                    </td>
                                    <td class="action-table-data">
                                        <div class="edit-delete-action">
                                            <a class="me-2 edit-icon p-2" href="{{ url('product-details') }}">
                                                <i data-feather="eye" class="action-eye"></i>
                                            </a>
                                            <a class="me-2 p-2" href="{{ url('edit-product') }}">
                                                <i data-feather="edit" class="feather-edit"></i>
                                            </a>
                                            <a class="confirm-text p-2" href="javascript:void(0);">
                                                <i data-feather="trash-2" class="feather-trash-2"></i>
                                            </a>
                                        </div>

                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="checkboxs">
                                            <input type="checkbox">
                                            <span class="checkmarks"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <div class="productimgname">
                                            <a href="javascript:void(0);" class="product-img stock-img">
                                                <img src="{{ URL::asset('/build/img/products/stock-img-03.png') }}"
                                                    alt="product">
                                            </a>
                                            <a href="javascript:void(0);">Apple Series 5 Watch</a>
                                        </div>
                                    </td>
                                    <td>PT004</td>
                                    <td>Electronics</td>
                                    <td>Apple</td>
                                    <td>$25000.00</td>
                                    <td>Pc</td>
                                    <td>450</td>
                                    <td>
                                        <div class="userimgname">
                                            <a href="javascript:void(0);" class="product-img">
                                                <img src="{{ URL::asset('/build/img/users/user-03.jpg') }}"
                                                    alt="product">
                                            </a>
                                            <a href="javascript:void(0);">Nathan</a>
                                        </div>
                                    </td>
                                    <td class="action-table-data">
                                        <div class="edit-delete-action">
                                            <a class="me-2 edit-icon p-2" href="{{ url('product-details') }}">
                                                <i data-feather="eye" class="action-eye"></i>
                                            </a>
                                            <a class="me-2 p-2" href="{{ url('edit-product') }}">
                                                <i data-feather="edit" class="feather-edit"></i>
                                            </a>
                                            <a class="confirm-text p-2" href="javascript:void(0);">
                                                <i data-feather="trash-2" class="feather-trash-2"></i>
                                            </a>
                                        </div>

                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="checkboxs">
                                            <input type="checkbox">
                                            <span class="checkmarks"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <div class="productimgname">
                                            <a href="javascript:void(0);" class="product-img stock-img">
                                                <img src="{{ URL::asset('/build/img/products/stock-img-04.png') }}"
                                                    alt="product">
                                            </a>
                                            <a href="javascript:void(0);">Amazon Echo Dot</a>
                                        </div>
                                    </td>
                                    <td>PT005</td>
                                    <td>Speaker</td>
                                    <td>Amazon</td>
                                    <td>$1600.00</td>
                                    <td>Pc</td>
                                    <td>477</td>
                                    <td>
                                        <div class="userimgname">
                                            <a href="javascript:void(0);" class="product-img">
                                                <img src="{{ URL::asset('/build/img/users/user-02.jpg') }}"
                                                    alt="product">
                                            </a>
                                            <a href="javascript:void(0);">Alice</a>
                                        </div>
                                    </td>
                                    <td class="action-table-data">
                                        <div class="edit-delete-action">
                                            <a class="me-2 edit-icon p-2" href="{{ url('product-details') }}">
                                                <i data-feather="eye" class="action-eye"></i>
                                            </a>
                                            <a class="me-2 p-2" href="{{ url('edit-product') }}">
                                                <i data-feather="edit" class="feather-edit"></i>
                                            </a>
                                            <a class="confirm-text p-2" href="javascript:void(0);">
                                                <i data-feather="trash-2" class="feather-trash-2"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="checkboxs">
                                            <input type="checkbox">
                                            <span class="checkmarks"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <div class="productimgname">
                                            <a href="javascript:void(0);" class="product-img stock-img">
                                                <img src="{{ URL::asset('/build/img/products/stock-img-05.png') }}"
                                                    alt="product">
                                            </a>
                                            <a href="javascript:void(0);">Lobar Handy</a>
                                        </div>
                                    </td>
                                    <td>PT006</td>
                                    <td>Furnitures</td>
                                    <td>Woodmart</td>
                                    <td>$4521.00</td>
                                    <td>Kg</td>
                                    <td>145</td>
                                    <td>
                                        <div class="userimgname">
                                            <a href="javascript:void(0);" class="product-img">
                                                <img src="{{ URL::asset('/build/img/users/user-05.jpg') }}"
                                                    alt="product">
                                            </a>
                                            <a href="javascript:void(0);">Robb</a>
                                        </div>
                                    </td>
                                    <td class="action-table-data">
                                        <div class="edit-delete-action">
                                            <a class="me-2 edit-icon p-2" href="{{ url('product-details') }}">
                                                <i data-feather="eye" class="action-eye"></i>
                                            </a>
                                            <a class="me-2 p-2" href="{{ url('edit-product') }}">
                                                <i data-feather="edit" class="feather-edit"></i>
                                            </a>
                                            <a class="confirm-text p-2" href="javascript:void(0);">
                                                <i data-feather="trash-2" class="feather-trash-2"></i>
                                            </a>
                                        </div>

                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="checkboxs">
                                            <input type="checkbox">
                                            <span class="checkmarks"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <div class="productimgname">
                                            <a href="javascript:void(0);" class="product-img stock-img">
                                                <img src="{{ URL::asset('/build/img/products/expire-product-01.png') }}"
                                                    alt="product">
                                            </a>
                                            <a href="javascript:void(0);">Red Premium Handy</a>
                                        </div>
                                    </td>
                                    <td>PT007</td>
                                    <td>Bags</td>
                                    <td>Versace</td>
                                    <td>$2024.00</td>
                                    <td>Kg</td>
                                    <td>747</td>
                                    <td>
                                        <div class="userimgname">
                                            <a href="javascript:void(0);" class="product-img">
                                                <img src="{{ URL::asset('/build/img/users/user-08.jpg') }}"
                                                    alt="product">
                                            </a>
                                            <a href="javascript:void(0);">Steven</a>
                                        </div>
                                    </td>
                                    <td class="action-table-data">
                                        <div class="edit-delete-action">
                                            <a class="me-2 edit-icon p-2" href="{{ url('product-details') }}">
                                                <i data-feather="eye" class="action-eye"></i>
                                            </a>
                                            <a class="me-2 p-2" href="{{ url('edit-product') }}">
                                                <i data-feather="edit" class="feather-edit"></i>
                                            </a>
                                            <a class="confirm-text p-2" href="javascript:void(0);">
                                                <i data-feather="trash-2" class="feather-trash-2"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="checkboxs">
                                            <input type="checkbox">
                                            <span class="checkmarks"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <div class="productimgname">
                                            <a href="javascript:void(0);" class="product-img stock-img">
                                                <img src="{{ URL::asset('/build/img/products/expire-product-02.png') }}"
                                                    alt="product">
                                            </a>
                                            <a href="javascript:void(0);">Iphone 14 Pro</a>
                                        </div>
                                    </td>
                                    <td>PT008</td>
                                    <td>Phone</td>
                                    <td>Iphone</td>
                                    <td>$1698.00</td>
                                    <td>Pc</td>
                                    <td>897</td>
                                    <td>
                                        <div class="userimgname">
                                            <a href="javascript:void(0);" class="product-img">
                                                <img src="{{ URL::asset('/build/img/users/user-04.jpg') }}"
                                                    alt="product">
                                            </a>
                                            <a href="javascript:void(0);">Gravely</a>
                                        </div>
                                    </td>
                                    <td class="action-table-data">
                                        <div class="edit-delete-action">
                                            <a class="me-2 edit-icon p-2" href="{{ url('product-details') }}">
                                                <i data-feather="eye" class="action-eye"></i>
                                            </a>
                                            <a class="me-2 p-2" href="{{ url('edit-product') }}">
                                                <i data-feather="edit" class="feather-edit"></i>
                                            </a>
                                            <a class="confirm-text p-2" href="javascript:void(0);">
                                                <i data-feather="trash-2" class="feather-trash-2"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="checkboxs">
                                            <input type="checkbox">
                                            <span class="checkmarks"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <div class="productimgname">
                                            <a href="javascript:void(0);" class="product-img stock-img">
                                                <img src="{{ URL::asset('/build/img/products/expire-product-03.png') }}"
                                                    alt="product">
                                            </a>
                                            <a href="javascript:void(0);">Black Slim 200</a>
                                        </div>
                                    </td>
                                    <td>PT009</td>
                                    <td>Chairs</td>
                                    <td>Bently</td>
                                    <td>$6794.00</td>
                                    <td>Pc</td>
                                    <td>741</td>
                                    <td>
                                        <div class="userimgname">
                                            <a href="javascript:void(0);" class="product-img">
                                                <img src="{{ URL::asset('/build/img/users/user-01.jpg') }}"
                                                    alt="product">
                                            </a>
                                            <a href="javascript:void(0);">Kevin</a>
                                        </div>
                                    </td>
                                    <td class="action-table-data">
                                        <div class="edit-delete-action">
                                            <a class="me-2 edit-icon p-2" href="{{ url('product-details') }}">
                                                <i data-feather="eye" class="action-eye"></i>
                                            </a>
                                            <a class="me-2 p-2" href="{{ url('edit-product') }}">
                                                <i data-feather="edit" class="feather-edit"></i>
                                            </a>
                                            <a class="confirm-text p-2" href="javascript:void(0);">
                                                <i data-feather="trash-2" class="feather-trash-2"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="checkboxs">
                                            <input type="checkbox">
                                            <span class="checkmarks"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <div class="productimgname">
                                            <a href="javascript:void(0);" class="product-img stock-img">
                                                <img src="{{ URL::asset('/build/img/products/expire-product-04.png') }}"
                                                    alt="product">
                                            </a>
                                            <a href="javascript:void(0);">Woodcraft Sandal</a>
                                        </div>
                                    </td>
                                    <td>PT010</td>
                                    <td>Bags</td>
                                    <td>Woodcraft</td>
                                    <td>$4547.00</td>
                                    <td>Kg</td>
                                    <td>148</td>
                                    <td>
                                        <div class="userimgname">
                                            <a href="javascript:void(0);" class="product-img">
                                                <img src="{{ URL::asset('/build/img/users/user-10.jpg') }}"
                                                    alt="product">
                                            </a>
                                            <a href="javascript:void(0);">Grillo</a>
                                        </div>
                                    </td>
                                    <td class="action-table-data">
                                        <div class="edit-delete-action">
                                            <a class="me-2 edit-icon p-2" href="{{ url('product-details') }}">
                                                <i data-feather="eye" class="action-eye"></i>
                                            </a>
                                            <a class="me-2 p-2" href="{{ url('edit-product') }}">
                                                <i data-feather="edit" class="feather-edit"></i>
                                            </a>
                                            <a class="confirm-text p-2" href="javascript:void(0);">
                                                <i data-feather="trash-2" class="feather-trash-2"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /product list -->
        </div>
    </div>
@endsection
