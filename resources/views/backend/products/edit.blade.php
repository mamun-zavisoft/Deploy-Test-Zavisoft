@extends('layout.mainlayout')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="add-item d-flex">
                    <div class="page-title">
                        <h4>Edit Product</h4>
                    </div>
                </div>
                <ul class="table-top-head">
                    <li>
                        <div class="page-btn">
                            <a href="{{ url('product-list') }}" class="btn btn-secondary"><i data-feather="arrow-left"
                                    class="me-2"></i>Back to Product</a>
                        </div>
                    </li>
                    <li>
                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="Collapse" id="collapse-header"><i
                                data-feather="chevron-up" class="feather-chevron-up"></i></a>
                    </li>
                </ul>

            </div>
            <!-- /add -->
            <form action="edit-product">
                <div class="card">
                    <div class="card-body add-product pb-0">
                        <div class="accordion-card-one accordion" id="accordionExample">
                            <div class="accordion-item">
                                <div class="accordion-header" id="headingOne">
                                    <div class="accordion-button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                        aria-controls="collapseOne">
                                        <div class="addproduct-icon">
                                            <h5><i data-feather="info" class="add-info"></i><span>Product Information</span>
                                            </h5>
                                            <a href="javascript:void(0);"><i data-feather="chevron-down"
                                                    class="chevron-down-add"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-lg-4 col-sm-6 col-12">
                                                <div class="mb-3 add-product">
                                                    <label class="form-label">Store</label>
                                                    <select class="select">
                                                        <option>Thomas</option>
                                                        <option>Rasmussen</option>
                                                        <option>Fred john</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-12">
                                                <div class="mb-3 add-product">
                                                    <label class="form-label">Warehouse</label>
                                                    <select class="select">
                                                        <option>Legendary</option>
                                                        <option>Determined</option>
                                                        <option>Sincere</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4 col-sm-6 col-12">
                                                <div class="mb-3 add-product">
                                                    <label class="form-label">Product Name</label>
                                                    <input type="text" class="form-control" value="Nike Jordan">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-12">
                                                <div class="mb-3 add-product">
                                                    <label class="form-label">Slug</label>
                                                    <input type="text" class="form-control" value="Shoe">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-12">
                                                <div class="input-blocks add-product list">
                                                    <label>SKU</label>
                                                    <input type="text" class="form-control list" placeholder="Enter SKU"
                                                        value="PT003">
                                                    <button type="submit" class="btn btn-primaryadd">
                                                        Generate Code
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="addservice-info">
                                            <div class="row">
                                                <div class="col-lg-4 col-sm-6 col-12">
                                                    <div class="mb-3 add-product">
                                                        <div class="add-newplus">
                                                            <label class="form-label">Category</label>
                                                            <a href="javascript:void(0);" data-bs-toggle="modal"
                                                                data-bs-target="#add-units-category"><i
                                                                    data-feather="plus-circle"
                                                                    class="plus-down-add"></i><span>Add
                                                                    New</span></a>
                                                        </div>
                                                        <select class="select">
                                                            <option>Lenovo</option>
                                                            <option>Electronics</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-sm-6 col-12">
                                                    <div class="mb-3 add-product">
                                                        <label class="form-label">Choose Category</label>
                                                        <select class="select">
                                                            <option>Lenovo</option>
                                                            <option>Electronics</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-sm-6 col-12">
                                                    <div class="mb-3 add-product">
                                                        <label class="form-label">Sub Category</label>
                                                        <select class="select">
                                                            <option>Fruits</option>
                                                            <option>Computers</option>
                                                            <option>Shoes</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="add-product-new">
                                            <div class="row">
                                                <div class="col-lg-4 col-sm-6 col-12">
                                                    <div class="mb-3 add-product">
                                                        <div class="add-newplus">
                                                            <label class="form-label">Brand</label>
                                                            <a href="javascript:void(0);" data-bs-toggle="modal"
                                                                data-bs-target="#add-units-brand"><i
                                                                    data-feather="plus-circle"
                                                                    class="plus-down-add"></i><span>Add
                                                                    new</span></a>
                                                        </div>
                                                        <select class="select">
                                                            <option>Nike</option>
                                                            <option>Bolt</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-sm-6 col-12">
                                                    <div class="mb-3 add-product">

                                                        <div class="add-newplus">
                                                            <label class="form-label">Unit</label>
                                                            <a href="javascript:void(0);" data-bs-toggle="modal"
                                                                data-bs-target="#add-unit"><i data-feather="plus-circle"
                                                                    class="plus-down-add"></i><span>Add New</span></a>
                                                        </div>
                                                        <select class="select">
                                                            <option>Kg</option>
                                                            <option>Pc</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-sm-6 col-12">
                                                    <div class="mb-3 add-product">
                                                        <label class="form-label">Selling Type</label>
                                                        <select class="select">
                                                            <option>Transactional selling</option>
                                                            <option>Solution selling</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 col-sm-6 col-12">
                                                <div class="mb-3 add-product">
                                                    <label class="form-label">Barcode Symbology</label>
                                                    <select class="select">
                                                        <option>Code34</option>
                                                        <option>Code35</option>
                                                        <option>Code36</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-6 col-12">
                                                <div class="input-blocks add-product list">
                                                    <label>Item Code</label>
                                                    <input type="text" class="form-control list"
                                                        placeholder="Please Enter Item Code">
                                                    <button type="submit" class="btn btn-primaryadd">
                                                        Generate Code
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <!-- Editor -->
                                            <div class="col-lg-12">
                                                <div class="input-blocks summer-description-box transfer mb-3">
                                                    <label>Description</label>
                                                    <textarea class="form-control h-100" rows="5"></textarea>
                                                    <p class="mt-1">Maximum 60 Characters</p>
                                                </div>
                                            </div>
                                            <!-- /Editor -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-card-one accordion" id="accordionExample2">
                            <div class="accordion-item">
                                <div class="accordion-header" id="headingTwo">
                                    <div class="accordion-button" data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                        aria-controls="collapseTwo">
                                        <div class="text-editor add-list">
                                            <div class="addproduct-icon list icon">
                                                <h5><i data-feather="life-buoy" class="add-info"></i><span>Pricing &
                                                        Stocks</span></h5>
                                                <a href="javascript:void(0);"><i data-feather="chevron-down"
                                                        class="chevron-down-add"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="collapseTwo" class="accordion-collapse collapse show"
                                    aria-labelledby="headingTwo" data-bs-parent="#accordionExample2">
                                    <div class="accordion-body">
                                        <div class="input-blocks add-products">
                                            <label class="d-block">Product Type</label>
                                            <div class="single-pill-product">
                                                <ul class="nav nav-pills" id="pills-tab1" role="tablist">
                                                    <li class="nav-item" role="presentation">
                                                        <span class="custom_radio me-4 mb-0 active" id="pills-home-tab"
                                                            data-bs-toggle="pill" data-bs-target="#pills-home"
                                                            role="tab" aria-controls="pills-home"
                                                            aria-selected="true">
                                                            <input type="radio" class="form-control" name="payment">
                                                            <span class="checkmark"></span> Single Product</span>
                                                    </li>
                                                    <li class="nav-item" role="presentation">
                                                        <span class="custom_radio me-2 mb-0" id="pills-profile-tab"
                                                            data-bs-toggle="pill" data-bs-target="#pills-profile"
                                                            role="tab" aria-controls="pills-profile"
                                                            aria-selected="false">
                                                            <input type="radio" class="form-control" name="sign">
                                                            <span class="checkmark"></span> Variable Product</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="tab-content" id="pills-tabContent">
                                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                                aria-labelledby="pills-home-tab">
                                                <div class="row">
                                                    <div class="col-lg-4 col-sm-6 col-12">
                                                        <div class="input-blocks add-product">
                                                            <label>Quantity</label>
                                                            <input type="text" class="form-control" value="5">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-sm-6 col-12">
                                                        <div class="input-blocks add-product">
                                                            <label>Price</label>
                                                            <input type="text" class="form-control" value="300">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-sm-6 col-12">
                                                        <div class="input-blocks add-product">
                                                            <label>Tax Type</label>
                                                            <select class="select">
                                                                <option>Exclusive</option>
                                                                <option>Sales Tax</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4 col-sm-6 col-12">
                                                        <div class="input-blocks add-product">
                                                            <label>Discount Type</label>
                                                            <select class="select">
                                                                <option>Percentage</option>
                                                                <option>Cash</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-sm-6 col-12">
                                                        <div class="input-blocks add-product">
                                                            <label>Discount Value</label>
                                                            <input type="text" placeholder="10%">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-sm-6 col-12">
                                                        <div class="input-blocks add-product">
                                                            <label>Quantity Alert</label>
                                                            <input type="text" class="form-control" value="100">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="accordion-card-one accordion" id="accordionExample3">
                                                    <div class="accordion-item">
                                                        <div class="accordion-header" id="headingThree">
                                                            <div class="accordion-button" data-bs-toggle="collapse"
                                                                data-bs-target="#collapseThree"
                                                                aria-controls="collapseThree">
                                                                <div class="addproduct-icon list">
                                                                    <h5><i data-feather="image"
                                                                            class="add-info"></i><span>Images</span></h5>
                                                                    <a href="javascript:void(0);"><i
                                                                            data-feather="chevron-down"
                                                                            class="chevron-down-add"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="collapseThree" class="accordion-collapse collapse show"
                                                            aria-labelledby="headingThree"
                                                            data-bs-parent="#accordionExample3">
                                                            <div class="accordion-body">
                                                                <div class="text-editor add-list add">
                                                                    <div class="col-lg-12">
                                                                        <div class="add-choosen">
                                                                            <div class="input-blocks">
                                                                                <div class="image-upload">
                                                                                    <input type="file">
                                                                                    <div class="image-uploads">
                                                                                        <i data-feather="plus-circle"
                                                                                            class="plus-down-add me-0"></i>
                                                                                        <h4>Add Images</h4>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="phone-img">
                                                                                <img src="{{ URL::asset('/build/img/products/phone-add-2.png')}}"
                                                                                    alt="image">
                                                                                <a href="javascript:void(0);"><i
                                                                                        data-feather="x"
                                                                                        class="x-square-add remove-product"></i></a>
                                                                            </div>

                                                                            <div class="phone-img">
                                                                                <img src="{{ URL::asset('/build/img/products/phone-add-1.png')}}"
                                                                                    alt="image">
                                                                                <a href="javascript:void(0);"><i
                                                                                        data-feather="x"
                                                                                        class="x-square-add remove-product"></i></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                                aria-labelledby="pills-profile-tab">
                                                <div class="row select-color-add">
                                                    <div class="col-lg-6 col-sm-6 col-12">
                                                        <div class="input-blocks add-product">
                                                            <label>Variant Attribute</label>
                                                            <div class="row">
                                                                <div class="col-lg-10 col-sm-10 col-10">
                                                                    <select
                                                                        class="form-control variant-select select-option"
                                                                        id="colorSelect">
                                                                        <option>Choose</option>
                                                                        <option>Color</option>
                                                                        <option value="red">Red</option>
                                                                        <option value="black">Black</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-lg-2 col-sm-2 col-2 ps-0">
                                                                    <div class="add-icon tab">
                                                                        <a class="btn btn-filter" data-bs-toggle="modal"
                                                                            data-bs-target="#add-units"><i
                                                                                class="feather feather-plus-circle"></i></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="selected-hide-color" id="input-show">
                                                            <div class="row align-items-center">
                                                                <div class="col-sm-10">
                                                                    <div class="input-blocks">
                                                                        <input class="input-tags form-control"
                                                                            id="inputBox" type="text"
                                                                            data-role="tagsinput" name="specialist"
                                                                            value="red, black">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-2">
                                                                    <div class="input-blocks ">
                                                                        <a href="javascript:void(0);"
                                                                            class="remove-color"><i
                                                                                class="far fa-trash-alt"></i></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="modal-body-table variant-table" id="variant-table">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th>Variantion</th>
                                                                    <th>Variant Value</th>
                                                                    <th>SKU</th>
                                                                    <th>Quantity</th>
                                                                    <th>Price</th>
                                                                    <th class="no-sort">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <div class="add-product">
                                                                            <input type="text" class="form-control"
                                                                                value="color">
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="add-product">
                                                                            <input type="text" class="form-control"
                                                                                value="red">
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="add-product">
                                                                            <input type="text" class="form-control"
                                                                                value="1234">
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="product-quantity">
                                                                            <span class="quantity-btn"><i
                                                                                    data-feather="minus-circle"
                                                                                    class="feather-search"></i></span>
                                                                            <input type="text" class="quntity-input"
                                                                                value="2">
                                                                            <span class="quantity-btn">+<i
                                                                                    data-feather="plus-circle"
                                                                                    class="plus-circle"></i></span>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="add-product">
                                                                            <input type="text" class="form-control"
                                                                                value="50000">
                                                                        </div>
                                                                    </td>
                                                                    <td class="action-table-data">
                                                                        <div class="edit-delete-action">
                                                                            <div class="input-block add-lists">
                                                                                <label class="checkboxs">
                                                                                    <input type="checkbox" checked>
                                                                                    <span class="checkmarks"></span>
                                                                                </label>
                                                                            </div>
                                                                            <a class="me-2 p-2" href="javascript:void(0);"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#add-variation">
                                                                                <i data-feather="plus"
                                                                                    class="feather-edit"></i>
                                                                            </a>
                                                                            <a class="confirm-text p-2"
                                                                                href="javascript:void(0);">
                                                                                <i data-feather="trash-2"
                                                                                    class="feather-trash-2"></i>
                                                                            </a>
                                                                        </div>

                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <div class="add-product">
                                                                            <input type="text" class="form-control"
                                                                                value="color">
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="add-product">
                                                                            <input type="text" class="form-control"
                                                                                value="black">
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="add-product">
                                                                            <input type="text" class="form-control"
                                                                                value="2345">
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="product-quantity">
                                                                            <span class="quantity-btn"><i
                                                                                    data-feather="minus-circle"
                                                                                    class="feather-search"></i></span>
                                                                            <input type="text" class="quntity-input"
                                                                                value="3">
                                                                            <span class="quantity-btn">+<i
                                                                                    data-feather="plus-circle"
                                                                                    class="plus-circle"></i></span>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="add-product">
                                                                            <input type="text" class="form-control"
                                                                                value="50000">
                                                                        </div>
                                                                    </td>
                                                                    <td class="action-table-data">
                                                                        <div class="edit-delete-action">
                                                                            <div class="input-block add-lists">
                                                                                <label class="checkboxs">
                                                                                    <input type="checkbox" checked>
                                                                                    <span class="checkmarks"></span>
                                                                                </label>
                                                                            </div>
                                                                            <a class="me-2 p-2" href="#"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#edit-units">
                                                                                <i data-feather="plus"
                                                                                    class="feather-edit"></i>
                                                                            </a>
                                                                            <a class="confirm-text p-2"
                                                                                href="javascript:void(0);">
                                                                                <i data-feather="trash-2"
                                                                                    class="feather-trash-2"></i>
                                                                            </a>
                                                                        </div>

                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-card-one accordion" id="accordionExample4">
                            <div class="accordion-item">
                                <div class="accordion-header" id="headingFour">
                                    <div class="accordion-button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseFour" aria-controls="collapseFour">
                                        <div class="text-editor add-list">
                                            <div class="addproduct-icon list">
                                                <h5><i data-feather="list" class="add-info"></i><span>Custom Fields</span>
                                                </h5>
                                                <a href="javascript:void(0);"><i data-feather="chevron-down"
                                                        class="chevron-down-add"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="collapseFour" class="accordion-collapse collapse show"
                                    aria-labelledby="headingFour" data-bs-parent="#accordionExample4">
                                    <div class="accordion-body">
                                        <div class="text-editor add-list add">
                                            <div class="custom-filed">
                                                <div class="input-block add-lists">
                                                    <label class="checkboxs">
                                                        <input type="checkbox">
                                                        <span class="checkmarks"></span>Warranties
                                                    </label>
                                                    <label class="checkboxs">
                                                        <input type="checkbox">
                                                        <span class="checkmarks"></span>Manufacturer
                                                    </label>
                                                    <label class="checkboxs">
                                                        <input type="checkbox">
                                                        <span class="checkmarks"></span>Expiry
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-4 col-sm-6 col-12">
                                                    <div class="input-blocks add-product">
                                                        <label>Discount Type</label>
                                                        <select class="select">
                                                            <option>Percentage</option>
                                                            <option>Cash</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-4 col-sm-6 col-12">
                                                    <div class="input-blocks add-product">
                                                        <label>Quantity Alert</label>
                                                        <input type="text" class="form-control" value="100">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-sm-6 col-12">
                                                    <div class="input-blocks">
                                                        <label>Manufactured Date</label>

                                                        <div class="input-groupicon calender-input">
                                                            <i data-feather="calendar" class="info-img"></i>
                                                            <input type="text" class="datetimepicker"
                                                                placeholder="Choose Date">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-sm-6 col-12">
                                                    <div class="input-blocks">
                                                        <label>Expiry On</label>

                                                        <div class="input-groupicon calender-input">
                                                            <i data-feather="calendar" class="info-img"></i>
                                                            <input type="text" class="datetimepicker"
                                                                placeholder="Choose Date">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="btn-addproduct mb-4">
                        <button type="button" class="btn btn-cancel me-2">Cancel</button>
                        <button type="submit" class="btn btn-submit">Save Product</button>
                    </div>
                </div>
            </form>
            <!-- /add -->

        </div>
    </div>
@endsection
