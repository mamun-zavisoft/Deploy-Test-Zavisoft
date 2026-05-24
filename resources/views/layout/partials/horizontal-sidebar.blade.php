<!-- Sidebar -->
<div class="sidebar horizontal-sidebar">
    <div id="sidebar-menu-3" class="sidebar-menu">
        <ul class="nav">
            <li class="submenu">
                <a href="{{ url('index') }}"
                    class="{{ Request::is('index', '/', 'sales-dashboard', 'video-call', 'audio-call', 'call-history', 'chat', 'calendar', 'email', 'todo', 'notes', 'file-manager', 'file-archived','file-document','file-favourites','file-manager-seleted','file-recent','file-shared') ? 'active subdrop' : '' }}"><i
                        data-feather="grid"></i><span> Main Menu</span>
                    <span class="menu-arrow"></span></a>
                <ul>
                    <li class="submenu">
                        <a href="javascript:void(0);"
                            class="{{ Request::is('index', '/', 'sales-dashboard') ? 'active subdrop' : '' }}"><span>Dashboard</span>
                            <span class="menu-arrow"></span></a>
                        <ul>
                            <li><a href="{{ url('index') }}" class="{{ Request::is('index') ? 'active' : '' }}">Admin
                                    Dashboard</a></li>
                            <li><a href="{{ url('sales-dashboard') }}"
                                    class="{{ Request::is('sales-dashboard') ? 'active' : '' }}">Sales Dashboard</a>
                            </li>
                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="javascript:void(0);"
                            class="{{ Request::is('video-call', 'audio-call', 'call-history', 'chat', 'calendar', 'email', 'todo', 'notes', 'file-manager', 'file-archived','file-document','file-favourites','file-manager-seleted','file-recent','file-shared','file-manager-deleted') ? 'active subdrop' : '' }} "><span>Application</span><span
                                class="menu-arrow"></span></a>
                        <ul>
                            <li><a href="{{ url('chat') }}" class="{{ Request::is('chat') ? 'active' : '' }}">Chat</a>
                            </li>
                            <li class="submenu submenu-two"><a href="javascript:void(0);"
                                    class="{{ Request::is('video-call', 'audio-call', 'call-history') ? 'active subdrop' : '' }} "><span>Call</span><span
                                        class="menu-arrow inside-submenu"></span></a>
                                <ul>
                                    <li><a href="{{ url('video-call') }}"
                                            class="{{ Request::is('video-call') ? 'active' : '' }}">Video Call</a></li>
                                    <li><a href="{{ url('audio-call') }}"
                                            class="{{ Request::is('audio-call') ? 'active' : '' }}">Audio Call</a></li>
                                    <li><a href="{{ url('call-history') }}"
                                            class="{{ Request::is('call-history') ? 'active' : '' }}">Call History</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="{{ url('calendar') }}"
                                    class="{{ Request::is('calendar') ? 'active' : '' }}">Calendar</a></li>
                            <li><a href="{{ url('email') }}"
                                    class="{{ Request::is('email') ? 'active' : '' }}">Email</a></li>
                            <li><a href="{{ url('todo') }}" class="{{ Request::is('todo') ? 'active' : '' }}">To
                                    Do</a></li>
                            <li><a href="{{ url('notes') }}"
                                    class="{{ Request::is('notes') ? 'active' : '' }}">Notes</a></li>
                            <li><a href="{{ url('file-manager') }}"
                                    class="{{ Request::is('file-manager', 'file-archived','file-document','file-favourites','file-manager-seleted','file-recent','file-shared','file-manager-deleted') ? 'active' : '' }}">File Manager</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="submenu">
                <a href="javascript:void(0);"
                    class="{{ Request::is('product-list','product-details','edit-product','add-product', 'expired-products', 'low-stocks', 'category-list', 'sub-categories', 'brand-list', 'units', 'varriant-attributes', 'warranty', 'barcode', 'qrcode') ? 'active subdrop' : '' }}"><img
                        src="{{ URL::asset('/build/img/icons/product.svg')}}" alt="img"><span> Inventory
                    </span> <span class="menu-arrow"></span></a>
                <ul>
                    <li><a
                            href="{{ url('product-list') }}"class="{{ Request::is('product-list','product-details') ? 'active' : '' }}"><span>Products</span></a>
                    </li>
                    <li><a href="{{ url('add-product') }}"class="{{ Request::is('add-product','edit-product') ? 'active' : '' }}"><span>Create
                                Product</span></a></li>
                    <li><a
                            href="{{ url('expired-products') }}"class="{{ Request::is('expired-products') ? 'active' : '' }}"><span>Expired
                                Products</span></a></li>
                    <li><a href="{{ url('low-stocks') }}"class="{{ Request::is('low-stocks') ? 'active' : '' }}"><span>Low
                                Stocks</span></a></li>
                    <li><a
                            href="{{ url('category-list') }}"class="{{ Request::is('category-list') ? 'active' : '' }}"><span>Category</span></a>
                    </li>
                    <li><a
                            href="{{ url('sub-categories') }}"class="{{ Request::is('sub-categories') ? 'active' : '' }}"><span>Sub
                                Category</span></a></li>
                    <li><a
                            href="{{ url('brand-list') }}"class="{{ Request::is('brand-list') ? 'active' : '' }}"><span>Brands</span></a>
                    </li>
                    <li><a
                            href="{{ url('units') }}"class="{{ Request::is('units') ? 'active' : '' }}"><span>Units</span></a>
                    </li>
                    <li><a
                            href="{{ url('varriant-attributes') }}"class="{{ Request::is('varriant-attributes') ? 'active' : '' }}"><span>Variant
                                Attributes</span></a></li>
                    <li><a
                            href="{{ url('warranty') }}"class="{{ Request::is('warranty') ? 'active' : '' }}"><span>Warranties</span></a>
                    </li>
                    <li><a href="{{ url('barcode') }}"class="{{ Request::is('barcode') ? 'active' : '' }}"><span>Print
                                Barcode</span></a></li>
                    <li><a href="{{ url('qrcode') }}"class="{{ Request::is('qrcode') ? 'active' : '' }}"><span>Print
                                QR Code</span></a></li>
                </ul>
            </li>
            <li class="submenu">
                <a href="javascript:void(0);"
                    class="{{ Request::is('sales-list', 'invoice-report', 'sales-returns', 'quotation-list', 'pos', 'coupons', 'purchase-list', 'purchase-order-report', 'purchase-returns', 'manage-stocks', 'stock-adjustment', 'stock-transfer', 'expense-list', 'expense-category') ? 'active subdrop' : '' }}"><img
                        src="{{ URL::asset('/build/img/icons/purchase1.svg')}}" alt="img"><span>Sales &amp;
                        Purchase</span> <span class="menu-arrow"></span></a>
                <ul>
                    <li class="submenu">
                        <a href="javascript:void(0);"
                            class="{{ Request::is('sales-list', 'invoice-report', 'sales-returns', 'quotation-list', 'pos', 'coupons') ? 'active subdrop' : '' }}"><span>Sales</span><span
                                class="menu-arrow"></span></a>
                        <ul>
                            <li><a href="{{ url('sales-list') }}"
                                    class="{{ Request::is('sales-list') ? 'active' : '' }}"><span>Sales</span></a></li>
                            <li><a href="{{ url('invoice-report') }}"
                                    class="{{ Request::is('invoice-report') ? 'active' : '' }}"><span>Invoices</span></a>
                            </li>
                            <li><a href="{{ url('sales-returns') }}"
                                    class="{{ Request::is('sales-returns') ? 'active' : '' }}"><span>Sales
                                        Return</span></a></li>
                            <li><a href="{{ url('quotation-list') }}"
                                    class="{{ Request::is('quotation-list') ? 'active' : '' }}"><span>Quotation</span></a>
                            </li>
                            <li><a href="{{ url('pos') }}"
                                    class="{{ Request::is('pos') ? 'active' : '' }}"><span>POS</span></a></li>
                            <li><a href="{{ url('coupons') }}"
                                    class="{{ Request::is('coupons') ? 'active' : '' }}"><span>Coupons</span></a></li>
                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="javascript:void(0);"
                            class="{{ Request::is('purchase-list', 'purchase-order-report', 'purchase-returns', 'manage-stocks', 'stock-adjustment', 'stock-transfer') ? 'active subdrop' : '' }} "><span>Purchase</span><span
                                class="menu-arrow"></span></a>
                        <ul>
                            <li><a href="{{ url('purchase-list') }}"
                                    class="{{ Request::is('purchase-list') ? 'active' : '' }}"><span>Purchases</span></a>
                            </li>
                            <li><a href="{{ url('purchase-order-report') }}"
                                    class="{{ Request::is('purchase-order-report') ? 'active' : '' }}"><span>Purchase
                                        Order</span></a></li>
                            <li><a href="{{ url('purchase-returns') }}"
                                    class="{{ Request::is('purchase-returns') ? 'active' : '' }}"><span>Purchase
                                        Return</span></a></li>
                            <li><a href="{{ url('manage-stocks') }}"
                                    class="{{ Request::is('manage-stocks') ? 'active' : '' }}"><span>Manage
                                        Stock</span></a></li>
                            <li><a href="{{ url('stock-adjustment') }}"
                                    class="{{ Request::is('stock-adjustment') ? 'active' : '' }}"><span>Stock
                                        Adjustment</span></a></li>
                            <li><a href="{{ url('stock-transfer') }}"
                                    class="{{ Request::is('stock-transfer') ? 'active' : '' }}"><span>Stock
                                        Transfer</span></a></li>
                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="javascript:void(0);"
                            class="{{ Request::is('expense-list', 'expense-category') ? 'active subdrop' : '' }} "><span>Expenses</span><span
                                class="menu-arrow"></span></a>
                        <ul>
                            <li><a href="{{ url('expense-list') }}"
                                    class="{{ Request::is('expense-list') ? 'active' : '' }}">Expenses</a></li>
                            <li><a href="{{ url('expense-category') }}"
                                    class="{{ Request::is('expense-category') ? 'active' : '' }}">Expense Category</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="submenu">
                <a href="javascript:void(0);"
                    class="{{ Request::is('customers','suppliers','store-list','warehouse','roles-permissions','permissions','delete-account','ui-alerts','ui-accordion','ui-avatar','ui-badges','ui-borders','ui-buttons','ui-buttons-group','ui-breadcrumb','ui-cards','ui-carousel','ui-colors','ui-dropdowns','ui-grid','ui-images','ui-lightbox','ui-modals','ui-media','ui-offcanvas','ui-pagination','ui-popovers','ui-progress','ui-placeholders','ui-rangeslider','ui-spinner','ui-sweetalerts','ui-nav-tabs','ui-toasts','ui-tooltips','ui-typography','ui-video','ui-ribbon','ui-clipboard','ui-drag-drop','ui-rating','ui-text-editor','ui-counter','ui-scrollbar','ui-stickynote','ui-timeline','chart-apex','chart-c3','chart-js','chart-morris','chart-flot','chart-peity','icon-fontawesome','icon-feather','icon-ionic','icon-material','icon-pe7','icon-simpleline','icon-themify','icon-weather','icon-typicon','icon-flag','form-wizard','form-select2','form-validation','form-floating-labels','form-vertical','form-horizontal','form-basic-inputs','form-checkbox-radios','form-input-groups','form-grid-gutters','form-select','form-mask','form-fileupload','form-horizontal','form-vertical','form-floating-labels','form-validation','form-select2','form-wizard','tables-basic','data-tables')? 'active subdrop': '' }}"><img
                        src="{{ URL::asset('/build/img/icons/users1.svg')}}" alt="img"><span>User Management</span> <span
                        class="menu-arrow"></span></a>
                <ul>
                    <li class="submenu">
                        <a href="javascript:void(0);"
                            class="{{ Request::is('customers', 'suppliers', 'store-list', 'warehouse') ? 'active subdrop' : '' }}"><span>People</span><span
                                class="menu-arrow"></span></a>
                        <ul>
                            <li><a href="{{ url('customers') }}"
                                    class="{{ Request::is('customers') ? 'active' : '' }}"><span>Customers</span></a>
                            </li>
                            <li><a href="{{ url('suppliers') }}"
                                    class="{{ Request::is('suppliers') ? 'active' : '' }}"><span>Suppliers</span></a>
                            </li>
                            <li><a href="{{ url('store-list') }}"
                                    class="{{ Request::is('store-list') ? 'active' : '' }}"><span>Stores</span></a>
                            </li>
                            <li><a href="{{ url('warehouse') }}"
                                    class="{{ Request::is('warehouse') ? 'active' : '' }}"><span>Warehouses</span></a>
                            </li>
                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="javascript:void(0);"
                            class="{{ Request::is('roles-permissions', 'delete-account','permissions') ? 'active subdrop' : '' }} "><span>Roles
                                &amp; Permissions</span><span class="menu-arrow"></span></a>
                        <ul>
                            <li><a href="{{ url('roles-permissions') }}"
                                    class="{{ Request::is('roles-permissions','permissions') ? 'active' : '' }}"><span>Roles &
                                        Permissions</span></a></li>
                            <li><a href="{{ url('delete-account') }}"
                                    class="{{ Request::is('delete-account') ? 'active' : '' }}"><span>Delete Account
                                        Request</span></a></li>

                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="javascript:void(0);"
                            class="{{ Request::is('ui-alerts', 'ui-accordion', 'ui-avatar', 'ui-badges', 'ui-borders', 'ui-buttons', 'ui-buttons-group', 'ui-breadcrumb', 'ui-cards', 'ui-carousel', 'ui-colors', 'ui-dropdowns', 'ui-grid', 'ui-images', 'ui-lightbox', 'ui-modals', 'ui-media', 'ui-offcanvas', 'ui-pagination', 'ui-popovers', 'ui-progress', 'ui-placeholders', 'ui-rangeslider', 'ui-spinner', 'ui-sweetalerts', 'ui-nav-tabs', 'ui-toasts', 'ui-tooltips', 'ui-typography', 'ui-video') ? 'active subdrop' : '' }} "><span>Base
                                UI</span><span class="menu-arrow"></span></a>
                        <ul>
                            <li><a href="{{ url('ui-alerts') }}"
                                    class="{{ Request::is('ui-alerts') ? 'active' : '' }}">Alerts</a></li>
                            <li><a href="{{ url('ui-accordion') }}"
                                    class="{{ Request::is('ui-accordion') ? 'active' : '' }}">Accordion</a></li>
                            <li><a href="{{ url('ui-avatar') }}"
                                    class="{{ Request::is('ui-avatar') ? 'active' : '' }}">Avatar</a></li>
                            <li><a href="{{ url('ui-badges') }}"
                                    class="{{ Request::is('ui-badges') ? 'active' : '' }}">Badges</a></li>
                            <li><a href="{{ url('ui-borders') }}"
                                    class="{{ Request::is('ui-borders') ? 'active' : '' }}">Border</a></li>
                            <li><a href="{{ url('ui-buttons') }}"
                                    class="{{ Request::is('ui-buttons') ? 'active' : '' }}">Buttons</a></li>
                            <li><a href="{{ url('ui-buttons-group') }}"
                                    class="{{ Request::is('ui-buttons-group') ? 'active' : '' }}">Button
                                    Group</a></li>
                            <li><a href="{{ url('ui-breadcrumb') }}"
                                    class="{{ Request::is('ui-breadcrumb') ? 'active' : '' }}">Breadcrumb</a>
                            </li>
                            <li><a href="{{ url('ui-cards') }}"
                                    class="{{ Request::is('ui-cards') ? 'active' : '' }}">Card</a></li>
                            <li><a href="{{ url('ui-carousel') }}"
                                    class="{{ Request::is('ui-carousel') ? 'active' : '' }}">Carousel</a></li>
                            <li><a href="{{ url('ui-colors') }}"
                                    class="{{ Request::is('ui-colors') ? 'active' : '' }}">Colors</a></li>
                            <li><a href="{{ url('ui-dropdowns') }}"
                                    class="{{ Request::is('ui-dropdowns') ? 'active' : '' }}">Dropdowns</a></li>
                            <li><a href="{{ url('ui-grid') }}"
                                    class="{{ Request::is('ui-grid') ? 'active' : '' }}">Grid</a></li>
                            <li><a href="{{ url('ui-images') }}"
                                    class="{{ Request::is('ui-images') ? 'active' : '' }}">Images</a></li>
                            <li><a href="{{ url('ui-lightbox') }}"
                                    class="{{ Request::is('ui-lightbox') ? 'active' : '' }}">Lightbox</a></li>
                            <li><a href="{{ url('ui-media') }}"
                                    class="{{ Request::is('ui-media') ? 'active' : '' }}">Media</a></li>
                            <li><a href="{{ url('ui-modals') }}"
                                    class="{{ Request::is('ui-modals') ? 'active' : '' }}">Modals</a></li>
                            <li><a href="{{ url('ui-offcanvas') }}"
                                    class="{{ Request::is('ui-offcanvas') ? 'active' : '' }}">Offcanvas</a></li>
                            <li><a href="{{ url('ui-pagination') }}"
                                    class="{{ Request::is('ui-pagination') ? 'active' : '' }}">Pagination</a>
                            </li>
                            <li><a href="{{ url('ui-popovers') }}"
                                    class="{{ Request::is('ui-popovers') ? 'active' : '' }}">Popovers</a></li>
                            <li><a href="{{ url('ui-progress') }}"
                                    class="{{ Request::is('ui-progress') ? 'active' : '' }}">Progress</a></li>
                            <li><a href="{{ url('ui-placeholders') }}"
                                    class="{{ Request::is('ui-placeholders') ? 'active' : '' }}">Placeholders</a>
                            </li>
                            <li><a href="{{ url('ui-rangeslider') }}"
                                    class="{{ Request::is('ui-rangeslider') ? 'active' : '' }}">Range Slider</a>
                            </li>
                            <li><a href="{{ url('ui-spinner') }}"
                                    class="{{ Request::is('ui-spinner') ? 'active' : '' }}">Spinner</a></li>
                            <li><a href="{{ url('ui-sweetalerts') }}"
                                    class="{{ Request::is('ui-sweetalerts') ? 'active' : '' }}">Sweet Alerts</a>
                            </li>
                            <li><a href="{{ url('ui-nav-tabs') }}"
                                    class="{{ Request::is('ui-nav-tabs') ? 'active' : '' }}">Tabs</a></li>
                            <li><a href="{{ url('ui-toasts') }}"
                                    class="{{ Request::is('ui-toasts') ? 'active' : '' }}">Toasts</a></li>
                            <li><a href="{{ url('ui-tooltips') }}"
                                    class="{{ Request::is('ui-tooltips') ? 'active' : '' }}">Tooltips</a></li>
                            <li><a href="{{ url('ui-typography') }}"
                                    class="{{ Request::is('ui-typography') ? 'active' : '' }}">Typography</a>
                            </li>
                            <li><a href="{{ url('ui-video') }}"
                                    class="{{ Request::is('ui-video') ? 'active' : '' }}">Video</a></li>
                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="javascript:void(0);"
                            class="{{ Request::is('ui-ribbon', 'ui-clipboard', 'ui-drag-drop', 'ui-rating', 'ui-text-editor', 'ui-counter', 'ui-scrollbar', 'ui-stickynote', 'ui-timeline') ? 'active subdrop' : '' }} "><span>Advanced
                                UI</span><span class="menu-arrow"></span></a>
                        <ul>
                            <li><a href="{{ url('ui-ribbon') }}"
                                    class="{{ Request::is('ui-ribbon') ? 'active' : '' }}">Ribbon</a></li>
                            <li><a href="{{ url('ui-clipboard') }}"
                                    class="{{ Request::is('ui-clipboard') ? 'active' : '' }}">Clipboard</a></li>
                            <li><a href="{{ url('ui-drag-drop') }}"
                                    class="{{ Request::is('ui-drag-drop') ? 'active' : '' }}">Drag & Drop</a>
                            </li>
                            <li><a href="{{ url('ui-rating') }}"
                                    class="{{ Request::is('ui-rating') ? 'active' : '' }}">Rating</a></li>
                            <li><a href="{{ url('ui-text-editor') }}"
                                    class="{{ Request::is('ui-text-editor') ? 'active' : '' }}">Text Editor</a>
                            </li>
                            <li><a href="{{ url('ui-counter') }}"
                                    class="{{ Request::is('ui-counter') ? 'active' : '' }}">Counter</a></li>
                            <li><a href="{{ url('ui-scrollbar') }}"
                                    class="{{ Request::is('ui-scrollbar') ? 'active' : '' }}">Scrollbar</a></li>
                            <li><a href="{{ url('ui-stickynote') }}"
                                    class="{{ Request::is('ui-stickynote') ? 'active' : '' }}">Sticky Note</a>
                            </li>
                            <li><a href="{{ url('ui-timeline') }}"
                                    class="{{ Request::is('ui-timeline') ? 'active' : '' }}">Timeline</a></li>
                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="javascript:void(0);"
                            class="{{ Request::is('chart-apex', 'chart-c3', 'chart-js', 'chart-morris', 'chart-flot', 'chart-peity') ? 'active subdrop' : '' }} "><span>Charts</span><span
                                class="menu-arrow"></span></a>
                        <ul>
                            <li><a href="{{ url('chart-apex') }}"
                                    class="{{ Request::is('chart-apex') ? 'active' : '' }}">Apex Charts</a></li>
                            <li><a href="{{ url('chart-c3') }}"
                                    class="{{ Request::is('chart-c3') ? 'active' : '' }}">Chart C3</a></li>
                            <li><a href="{{ url('chart-js') }}"
                                    class="{{ Request::is('chart-js') ? 'active' : '' }}">Chart Js</a></li>
                            <li><a href="{{ url('chart-morris') }}"
                                    class="{{ Request::is('chart-morris') ? 'active' : '' }}">Morris Charts</a>
                            </li>
                            <li><a href="{{ url('chart-flot') }}"
                                    class="{{ Request::is('chart-flot') ? 'active' : '' }}">Flot Charts</a></li>
                            <li><a href="{{ url('chart-peity') }}"
                                    class="{{ Request::is('chart-peity') ? 'active' : '' }}">Peity Charts</a>
                            </li>
                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="javascript:void(0);"
                            class="{{ Request::is('icon-fontawesome', 'icon-feather', 'icon-ionic', 'icon-material', 'icon-pe7') ? 'active subdrop' : '' }} "><span>Primary
                                Icons</span><span class="menu-arrow"></span></a>
                        <ul>
                            <li><a href="{{ url('icon-fontawesome') }}"
                                    class="{{ Request::is('icon-fontawesome') ? 'active' : '' }}">Fontawesome
                                    Icons</a></li>
                            <li><a href="{{ url('icon-feather') }}"
                                    class="{{ Request::is('icon-feather') ? 'active' : '' }}">Feather Icons</a>
                            </li>
                            <li><a href="{{ url('icon-ionic') }}"
                                    class="{{ Request::is('icon-ionic') ? 'active' : '' }}">Ionic Icons</a></li>
                            <li><a href="{{ url('icon-material') }}"
                                    class="{{ Request::is('icon-material') ? 'active' : '' }}">Material Icons</a>
                            </li>
                            <li><a href="{{ url('icon-pe7') }}"
                                    class="{{ Request::is('icon-pe7') ? 'active' : '' }}">Pe7 Icons</a></li>

                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="javascript:void(0);"
                            class="{{ Request::is('icon-simpleline', 'icon-themify', 'icon-weather', 'icon-typicon', 'icon-flag') ? 'active subdrop' : '' }} "><span>Secondary
                                Icons</span><span class="menu-arrow"></span></a>
                        <ul>
                            <li><a href="{{ url('icon-simpleline') }}"
                                    class="{{ Request::is('icon-simpleline') ? 'active' : '' }}">Simpleline
                                    Icons</a></li>
                            <li><a href="{{ url('icon-themify') }}"
                                    class="{{ Request::is('icon-themify') ? 'active' : '' }}">Themify Icons</a>
                            </li>
                            <li><a href="{{ url('icon-weather') }}"
                                    class="{{ Request::is('icon-weather') ? 'active' : '' }}">Weather Icons</a>
                            </li>
                            <li><a href="{{ url('icon-typicon') }}"
                                    class="{{ Request::is('icon-typicon') ? 'active' : '' }}">Typicon Icons</a>
                            </li>
                            <li><a href="{{ url('icon-flag') }}"
                                    class="{{ Request::is('icon-flag') ? 'active' : '' }}">Flag Icons</a></li>
                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="javascript:void(0);"
                            class="{{ Request::is('form-wizard', 'form-select2', 'form-validation', 'form-floating-labels', 'form-vertical', 'form-horizontal', 'form-basic-inputs', 'form-checkbox-radios', 'form-input-groups', 'form-grid-gutters', 'form-select', 'form-mask', 'form-fileupload') ? 'active subdrop' : '' }} "><span>
                                Forms</span><span class="menu-arrow"></span></a>
                        <ul>
                            <li class="submenu submenu-two">
                                <a href="javascript:void(0);"><span>Form Elements</span><span
                                        class="menu-arrow inside-submenu"></span></a>
                                <ul>
                                    <li><a href="{{ url('form-basic-inputs') }}"
                                            class="{{ Request::is('form-basic-inputs') ? 'active' : '' }}">Basic
                                            Inputs</a></li>
                                    <li><a href="{{ url('form-checkbox-radios') }}"
                                            class="{{ Request::is('form-checkbox-radios') ? 'active' : '' }}">Checkbox
                                            & Radios</a></li>
                                    <li><a href="{{ url('form-input-groups') }}"
                                            class="{{ Request::is('form-input-groups') ? 'active' : '' }}">Input
                                            Groups</a></li>
                                    <li><a href="{{ url('form-grid-gutters') }}"
                                            class="{{ Request::is('form-grid-gutters') ? 'active' : '' }}">Grid &
                                            Gutters</a></li>
                                    <li><a href="{{ url('form-select') }}"
                                            class="{{ Request::is('form-select') ? 'active' : '' }}">Form
                                            Select</a></li>
                                    <li><a href="{{ url('form-mask') }}"
                                            class="{{ Request::is('form-mask') ? 'active' : '' }}">Input
                                            Masks</a></li>
                                    <li><a href="{{ url('form-fileupload') }}"
                                            class="{{ Request::is('form-fileupload') ? 'active' : '' }}">File
                                            Uploads</a></li>
                                </ul>
                            </li>
                            <li class="submenu submenu-two">
                                <a href="javascript:void(0);"
                                    class="{{ Request::is('form-horizontal', 'form-vertical', 'form-floating-labels') ? 'active subdrop' : '' }}"><span>
                                        Layouts</span><span class="menu-arrow inside-submenu"></span></a>
                                <ul>
                                    <li><a href="{{ url('form-horizontal') }}"
                                            class="{{ Request::is('form-horizontal') ? 'active' : '' }}">Horizontal
                                            Form</a></li>
                                    <li><a href="{{ url('form-vertical') }}"
                                            class="{{ Request::is('form-vertical') ? 'active' : '' }}">Vertical
                                            Form</a></li>
                                    <li><a href="{{ url('form-floating-labels') }}"
                                            class="{{ Request::is('form-floating-labels') ? 'active' : '' }}">Floating
                                            Labels</a></li>
                                </ul>
                            </li>
                            <li><a href="{{ url('form-validation') }}"
                                    class="{{ Request::is('form-validation') ? 'active' : '' }}">Form
                                    Validation</a></li>
                            <li><a href="{{ url('form-select2') }}"
                                    class="{{ Request::is('form-select2') ? 'active' : '' }}">Select2</a></li>
                            <li><a href="{{ url('form-wizard') }}"
                                    class="{{ Request::is('form-wizard') ? 'active' : '' }}">Form Wizard</a></li>
                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="javascript:void(0);"
                            class="{{ Request::is('tables-basic', 'data-tables') ? 'active subdrop' : '' }} "><span>Tables</span><span
                                class="menu-arrow"></span></a>
                        <ul>
                            <li><a href="{{ url('tables-basic') }}"
                                    class="{{ Request::is('tables-basic') ? 'active' : '' }}">Basic Tables </a>
                            </li>
                            <li><a href="{{ url('data-tables') }}"
                                    class="{{ Request::is('data-tables') ? 'active' : '' }}">Data Table </a></li>
                        </ul>
                    </li>
                </ul>
            </li>

            <li class="submenu">
                <a href="javascript:void(0);"
                    class="{{ Request::is('error-404', 'error-500', 'blank-page', 'coming-soon', 'under-maintenance', 'countries', 'states', 'employees-grid', 'employees-list','add-employee','edit-employee','department-grid', 'department-list','designation', 'shift', 'attendance-employee', 'attendance-admin', 'leaves-admin', 'leaves-employee', 'leave-types', 'holidays', 'payroll-list', 'payslip') ? 'active subdrop' : '' }}"><i
                        data-feather="user"></i><span>Profile</span> <span class="menu-arrow"></span></a>
                <ul>
                    <li><a href="{{ url('profile') }}"><span>Profile</span></a></li>
                    <li class="submenu">
                        <a href="javascript:void(0);"><span>Authentication</span><span class="menu-arrow"></span></a>
                        <ul>
                            <li class="submenu submenu-two"><a href="javascript:void(0);">Login<span
                                        class="menu-arrow inside-submenu"></span></a>
                                <ul>
                                    <li><a href="{{ url('signin') }}">Cover</a></li>
                                    <li><a href="{{ url('signin-2') }}">Illustration</a></li>
                                    <li><a href="{{ url('signin-3') }}">Basic</a></li>
                                </ul>
                            </li>
                            <li class="submenu submenu-two"><a href="javascript:void(0);">Register<span
                                        class="menu-arrow inside-submenu"></span></a>
                                <ul>
                                    <li><a href="{{ url('register') }}">Cover</a></li>
                                    <li><a href="{{ url('register-2') }}">Illustration</a></li>
                                    <li><a href="{{ url('register-3') }}">Basic</a></li>
                                </ul>
                            </li>
                            <li class="submenu submenu-two"><a href="javascript:void(0);">Forgot Password<span
                                        class="menu-arrow inside-submenu"></span></a>
                                <ul>
                                    <li><a href="{{ url('forgot-password') }}">Cover</a></li>
                                    <li><a href="{{ url('forgot-password-2') }}">Illustration</a></li>
                                    <li><a href="{{ url('forgot-password-3') }}">Basic</a></li>
                                </ul>
                            </li>
                            <li class="submenu submenu-two"><a href="javascript:void(0);">Reset Password<span
                                        class="menu-arrow inside-submenu"></span></a>
                                <ul>
                                    <li><a href="{{ url('reset-password') }}">Cover</a></li>
                                    <li><a href="{{ url('reset-password-2') }}">Illustration</a></li>
                                    <li><a href="{{ url('reset-password-3') }}">Basic</a></li>
                                </ul>
                            </li>
                            <li class="submenu submenu-two"><a href="javascript:void(0);">Email Verification<span
                                        class="menu-arrow inside-submenu"></span></a>
                                <ul>
                                    <li><a href="{{ url('email-verification') }}">Cover</a></li>
                                    <li><a href="{{ url('email-verification-2') }}">Illustration</a></li>
                                    <li><a href="{{ url('email-verification-3') }}">Basic</a></li>
                                </ul>
                            </li>
                            <li class="submenu submenu-two"><a href="javascript:void(0);">2 Step Verification<span
                                        class="menu-arrow inside-submenu"></span></a>
                                <ul>
                                    <li><a href="{{ url('two-step-verification') }}">Cover</a></li>
                                    <li><a href="{{ url('two-step-verification-2') }}">Illustration</a></li>
                                    <li><a href="{{ url('two-step-verification-3') }}">Basic</a></li>
                                </ul>
                            </li>
                            <li><a href="{{ url('lock-screen') }}">Lock Screen</a></li>
                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="javascript:void(0);"
                            class="{{ Request::is('error-404', 'error-500', 'blank-page', 'coming-soon', 'under-maintenance') ? 'active' : '' }} "><span>Pages</span><span
                                class="menu-arrow"></span></a>
                        <ul>
                            <li><a href="{{ url('error-404') }}"
                                    class="{{ Request::is('error-404') ? 'active' : '' }}">404 Error </a></li>
                            <li><a href="{{ url('error-500') }}"
                                    class="{{ Request::is('error-500') ? 'active' : '' }}">500 Error </a></li>
                            <li><a href="{{ url('blank-page') }}"
                                    class="{{ Request::is('blank-page') ? 'active' : '' }}"><span>Blank Page</span>
                                </a></li>
                            <li><a href="{{ url('coming-soon') }}"
                                    class="{{ Request::is('coming-soon') ? 'active' : '' }}"><span>Coming Soon</span>
                                </a></li>
                            <li><a href="{{ url('under-maintenance') }}"
                                    class="{{ Request::is('under-maintenance') ? 'active' : '' }}"><span>Under
                                        Maintenance</span> </a></li>
                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="javascript:void(0);"
                            class="{{ Request::is('countries', 'states') ? 'active subdrop' : '' }} "><span>Places</span><span
                                class="menu-arrow"></span></a>
                        <ul>
                            <li><a href="{{ url('countries') }}"
                                    class="{{ Request::is('countries') ? 'active' : '' }}">Countries</a></li>
                            <li><a href="{{ url('states') }}"
                                    class="{{ Request::is('states') ? 'active' : '' }}">States</a></li>
                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="javascript:void(0);"
                            class="{{ Request::is('employees-grid', 'employees-list','edit-employee','add-employee','department-grid','department-list', 'designation', 'shift') ? 'active subdrop' : '' }} "><span>Employees</span><span
                                class="menu-arrow"></span></a>
                        <ul>
                            <li><a class="{{ Request::is('employees-grid','employees-list','edit-employee','add-employee') ? 'active' : '' }}"
                                    href="{{ url('employees-grid') }}"><span>Employees</span></a></li>
                            <li><a class="{{ Request::is('department-grid','department-list') ? 'active' : '' }}"
                                    href="{{ url('department-grid') }}"><span>Departments</span></a></li>
                            <li><a class="{{ Request::is('designation') ? 'active' : '' }}"
                                    href="{{ url('designation') }}"><span>Designation</span></a></li>
                            <li><a class="{{ Request::is('shift') ? 'active' : '' }}"
                                    href="{{ url('shift') }}"><span>Shifts</span></a></li>
                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="javascript:void(0);"
                            class="{{ Request::is('attendance-employee', 'attendance-admin') ? 'active subdrop' : '' }} "><span>Attendence</span><span
                                class="menu-arrow"></span></a>
                        <ul>
                            <li><a href="{{ url('attendance-employee') }}"
                                    class="{{ Request::is('attendance-employee') ? 'active' : '' }}">Employee</a>
                            </li>
                            <li><a href="{{ url('attendance-admin') }}"
                                    class="{{ Request::is('attendance-admin') ? 'active' : '' }}">Admin</a></li>
                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="javascript:void(0);"
                            class="{{ Request::is('leaves-admin', 'leaves-employee', 'leave-types', 'holidays') ? 'active subdrop' : '' }} "><span>Leaves
                                &amp; Holidays</span><span class="menu-arrow"></span></a>
                        <ul>
                            <li><a href="{{ url('leaves-admin') }}"
                                    class="{{ Request::is('leaves-admin') ? 'active' : '' }}">Admin Leaves</a>
                            </li>
                            <li><a href="{{ url('leaves-employee') }}"
                                    class="{{ Request::is('leaves-employee') ? 'active' : '' }}">Employee
                                    Leaves</a></li>
                            <li><a href="{{ url('leave-types') }}"
                                    class="{{ Request::is('leave-types') ? 'active' : '' }}">Leave Types</a></li>
                            <li><a href="{{ url('holidays') }}"
                                    class="{{ Request::is('holidays') ? 'active' : '' }}"><span>Holidays</span></a>
                            </li>
                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="{{ url('payroll-list') }}"
                            class="{{ Request::is('payroll-list', 'payslip') ? 'active subdrop' : '' }} "><span>Payroll</span><span
                                class="menu-arrow"></span></a>
                        <ul>
                            <li><a href="{{ url('payroll-list') }}"
                                    class="{{ Request::is('payroll-list') ? 'active' : '' }}">Employee Salary</a>
                            </li>
                            <li><a href="{{ url('payslip') }}"
                                    class="{{ Request::is('payslip') ? 'active' : '' }}">Payslip</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="submenu">
                <a href="javascript:void(0);"
                    class="{{ Request::is('sales-report', 'purchase-report', 'inventory-report', 'invoice-report', 'supplier-report', 'customer-report', 'expense-report', 'income-report', 'tax-reports', 'profit-and-loss') ? 'active subdrop' : '' }}"><img
                        src="{{ URL::asset('/build/img/icons/printer.svg')}}" alt="img"><span>Reports</span> <span
                        class="menu-arrow"></span></a>
                <ul>
                    <li><a class="{{ Request::is('sales-report') ? 'active' : '' }}"
                            href="{{ url('sales-report') }}"><span>Sales
                                Report</span></a></li>
                    <li><a class="{{ Request::is('purchase-report') ? 'active' : '' }}"
                            href="{{ url('purchase-report') }}"><span>Purchase
                                report</span></a></li>
                    <li><a class="{{ Request::is('inventory-report') ? 'active' : '' }}"
                            href="{{ url('inventory-report') }}"><span>Inventory
                                Report</span></a></li>
                    <li><a class="{{ Request::is('invoice-report') ? 'active' : '' }}"
                            href="{{ url('invoice-report') }}"><span>Invoice
                                Report</span></a></li>
                    <li><a class="{{ Request::is('supplier-report') ? 'active' : '' }}"
                            href="{{ url('supplier-report') }}"><span>Supplier
                                Report</span></a></li>
                    <li><a class="{{ Request::is('customer-report') ? 'active' : '' }}"
                            href="{{ url('customer-report') }}"><span>Customer
                                Report</span></a></li>
                    <li><a class="{{ Request::is('expense-report') ? 'active' : '' }}"
                            href="{{ url('expense-report') }}"><span>Expense
                                Report</span></a></li>
                    <li><a class="{{ Request::is('income-report') ? 'active' : '' }}"
                            href="{{ url('income-report') }}"><span>Income
                                Report</span></a></li>
                    <li><a class="{{ Request::is('tax-reports') ? 'active' : '' }}"
                            href="{{ url('tax-reports') }}"><span>Tax
                                Report</span></a></li>
                    <li><a class="{{ Request::is('profit-and-loss') ? 'active' : '' }}"
                            href="{{ url('profit-and-loss') }}"><span>Profit &
                                Loss</span></a></li>
                </ul>
            </li>
            <li class="submenu">
                <a href="javascript:void(0);"
                    class="{{ Request::is('general-settings', 'security-settings', 'notification', 'connected-apps', 'system-settings', 'company-settings', 'localization-settings', 'prefixes', 'preference', 'appearance', 'social-authentication', 'language-settings','language-settings-web', 'invoice-settings', 'printer-settings', 'pos-settings', 'custom-fields', 'email-settings', 'sms-gateway', 'otp-settings', 'gdpr-settings', 'payment-gateway-settings', 'bank-settings-grid', 'bank-settings-list','tax-rates', 'currency-settings', 'storage-settings', 'ban-ip-address') ? 'active' : '' }}"><img
                        src="{{ URL::asset('/build/img/icons/settings.svg')}}" alt="img"><span>
                        Settings</span> <span class="menu-arrow"></span></a>
                <ul>
                    <li class="submenu">
                        <a href="javascript:void(0);"
                            class="{{ Request::is('general-settings', 'security-settings', 'notification', 'connected-apps') ? 'active subdrop' : '' }}"><span>General
                                Settings</span><span class="menu-arrow"></span></a>
                        <ul>
                            <li><a href="{{ url('general-settings') }}"
                                    class="{{ Request::is('general-settings') ? 'active' : '' }}">Profile</a>
                            </li>
                            <li><a href="{{ url('security-settings') }}"
                                    class="{{ Request::is('security-settings') ? 'active' : '' }}">Security</a>
                            </li>
                            <li><a href="{{ url('notification') }}"
                                    class="{{ Request::is('notification') ? 'active' : '' }}">Notifications</a>
                            </li>
                            <li><a href="{{ url('connected-apps') }}"
                                    class="{{ Request::is('connected-apps') ? 'active' : '' }}">Connected
                                    Apps</a></li>
                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="javascript:void(0);"
                            class="{{ Request::is('system-settings', 'company-settings', 'localization-settings', 'prefixes', 'preference', 'appearance', 'social-authentication', 'language-settings','language-settings-web') ? 'active subdrop' : '' }}"><span>Website
                                Settings</span><span class="menu-arrow"></span></a>
                        <ul>
                            <li><a href="{{ url('system-settings') }}"
                                    class="{{ Request::is('system-settings') ? 'active' : '' }}">System
                                    Settings</a></li>
                            <li><a href="{{ url('company-settings') }}"
                                    class="{{ Request::is('company-settings') ? 'active' : '' }}">Company
                                    Settings </a></li>
                            <li><a href="{{ url('localization-settings') }}"
                                    class="{{ Request::is('localization-settings') ? 'active' : '' }}">Localization</a>
                            </li>
                            <li><a href="{{ url('prefixes') }}"
                                    class="{{ Request::is('prefixes') ? 'active' : '' }}">Prefixes</a></li>
                            <li><a href="{{ url('preference') }}"
                                    class="{{ Request::is('preference') ? 'active' : '' }}">Preference</a></li>
                            <li><a href="{{ url('appearance') }}"
                                    class="{{ Request::is('appearance') ? 'active' : '' }}">Appearance</a></li>
                            <li><a href="{{ url('social-authentication') }}"
                                    class="{{ Request::is('social-authentication') ? 'active' : '' }}">Social
                                    Authentication</a></li>
                            <li><a href="{{ url('language-settings') }}"
                                    class="{{ Request::is('language-settings','language-settings-web') ? 'active' : '' }}">Language</a>
                            </li>
                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="javascript:void(0);"
                            class="{{ Request::is('invoice-settings', 'printer-settings', 'pos-settings', 'custom-fields') ? 'active subdrop' : '' }}"><span>App
                                Settings</span><span class="menu-arrow"></span></a>
                        <ul>
                            <li><a href="{{ url('invoice-settings') }}"
                                    class="{{ Request::is('invoice-settings') ? 'active' : '' }}">Invoice</a>
                            </li>
                            <li><a href="{{ url('printer-settings') }}"
                                    class="{{ Request::is('printer-settings') ? 'active' : '' }}">Printer</a>
                            </li>
                            <li><a href="{{ url('pos-settings') }}"
                                    class="{{ Request::is('pos-settings') ? 'active' : '' }}">POS</a></li>
                            <li><a href="{{ url('custom-fields') }}"
                                    class="{{ Request::is('custom-fields') ? 'active' : '' }}">Custom Fields</a>
                            </li>
                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="javascript:void(0);"
                            class="{{ Request::is('email-settings', 'sms-gateway', 'otp-settings', 'gdpr-settings') ? 'active subdrop' : '' }}"><span>System
                                Settings</span><span class="menu-arrow"></span></a>
                        <ul>
                            <li><a href="{{ url('email-settings') }}"
                                    class="{{ Request::is('email-settings') ? 'active' : '' }}">Email</a></li>
                            <li><a href="{{ url('sms-gateway') }}"
                                    class="{{ Request::is('sms-gateway') ? 'active' : '' }}">SMS Gateways</a>
                            </li>
                            <li><a href="{{ url('otp-settings') }}"
                                    class="{{ Request::is('otp-settings') ? 'active' : '' }}">OTP</a></li>
                            <li><a href="{{ url('gdpr-settings') }}"
                                    class="{{ Request::is('gdpr-settings') ? 'active' : '' }}">GDPR Cookies</a>
                            </li>
                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="javascript:void(0);"
                            class="{{ Request::is('payment-gateway-settings', 'bank-settings-grid', 'bank-settings-list','tax-rates', 'currency-settings') ? 'active subdrop' : '' }}"><span>Financial
                                Settings</span><span class="menu-arrow"></span></a>
                        <ul>
                            <li><a href="{{ url('payment-gateway-settings') }}"
                                    class="{{ Request::is('payment-gateway-settings') ? 'active' : '' }}">Payment
                                    Gateway</a></li>
                            <li><a href="{{ url('bank-settings-grid') }}"
                                    class="{{ Request::is('bank-settings-grid','bank-settings-list') ? 'active' : '' }}">Bank
                                    Accounts</a></li>
                            <li><a href="{{ url('tax-rates') }}"
                                    class="{{ Request::is('tax-rates') ? 'active' : '' }}">Tax Rates</a></li>
                            <li><a href="{{ url('currency-settings') }}"
                                    class="{{ Request::is('currency-settings') ? 'active' : '' }}">Currencies</a>
                            </li>
                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="javascript:void(0);"
                            class="{{ Request::is('storage-settings', 'ban-ip-address') ? 'active subdrop' : '' }} "><span>Other
                                Settings</span><span class="menu-arrow"></span></a>
                        <ul>
                            <li><a href="{{ url('storage-settings') }}"
                                    class="{{ Request::is('storage-settings') ? 'active' : '' }}">Storage</a>
                            </li>
                            <li><a href="{{ url('ban-ip-address') }}"
                                    class="{{ Request::is('ban-ip-address') ? 'active' : '' }}">Ban IP
                                    Address</a></li>
                        </ul>
                    </li>
                    <li><a href="javascript:void(0);"><span>Documentation</span></a></li>
                    <li><a href="javascript:void(0);"><span>Changelog v2.0.3</span></a></li>
                    <li class="submenu">
                        <a href="javascript:void(0);"><span>Multi Level</span><span class="menu-arrow"></span></a>
                        <ul>
                            <li><a href="javascript:void(0);">Level 1.1</a></li>
                            <li class="submenu submenu-two"><a href="javascript:void(0);">Level 1.2<span
                                        class="menu-arrow inside-submenu"></span></a>
                                <ul>
                                    <li><a href="javascript:void(0);">Level 2.1</a></li>
                                    <li class="submenu submenu-two submenu-three"><a href="javascript:void(0);">Level
                                            2.2<span class="menu-arrow inside-submenu inside-submenu-two"></span></a>
                                        <ul>
                                            <li><a href="javascript:void(0);">Level 3.1</a></li>
                                            <li><a href="javascript:void(0);">Level 3.2</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<!-- /Sidebar -->
