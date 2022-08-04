@php
$module_active = session('module_active');

// dd($module_active);

@endphp


<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>

                {{-- @can('category-list') --}}

                @canany(['order-list'])
                    <a class="nav-link" href="{{ route('admin.order.list') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Đơn Hàng
                    </a>
                @endcanany
                {{-- info --}}
                <a class="nav-link" href="{{ route('admin.info.show') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Thông Tin Tài Khoản
                </a>
                <div class="sb-sidenav-menu-heading">Nội Dung</div>


                <!-- ///user -->

                @canany(['admin-add', 'admin-list'])
                    <a class="nav-link collapsed" href="" data-bs-toggle="collapse" data-bs-target="#user-layout"
                        aria-expanded="false" aria-controls="user-layout">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Quản Lý Tài Khoản Admin
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse {{ $module_active == 'admin' ? 'show' : '' }}" id="user-layout"
                        aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">

                            @can('admin-add')
                                <a class="nav-link" href="{{ route('admin.user.create') }}">Thêm</a>
                            @endcan
                            @can('admin-list')
                                <a class="nav-link" href="{{ route('admin.user.list') }}">Danh sách</a>
                            @endcan



                        </nav>
                    </div>
                @endcanany
                <!-- Post -->

                {{-- <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#post-layout"
                    aria-expanded="false" aria-controls="post-layout">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Bài Viết
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse {{ $module_active == 'post' ? 'show' : '' }}" id="post-layout"
                    aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('admin.post_category.create') }}">Thêm Danh Mục Bài Viết
                            Mới</a>
                        <a class="nav-link" href="{{ route('admin.post_category.list') }}">Danh Sách Danh Mục Bài
                            Viết
                        </a>
                        <a class="nav-link" href="{{ route('admin.post.create') }}">Thêm Bài Viết Mới
                        </a>

                        <a class="nav-link" href="{{ route('admin.post.list') }}">Danh Sách Bài Viết
                        </a>

                    </nav>
                </div> --}}

                <!-- end-Post -->




                <!-- Product -->
                @canany(['product-add', 'product-list'])
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#product-layout"
                        aria-expanded="false" aria-controls="product-layout">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Sản Phẩm
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse {{ $module_active == 'product' ? 'show' : '' }}" id="product-layout"
                        aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            @can('product-add')
                                <a class="nav-link" href="{{ route('admin.product.create') }}">Thêm Mới</a>
                            @endcan

                            @can('product-list')
                                <a class="nav-link" href="{{ route('admin.product.list') }}">Danh Sách</a>
                            @endcan


                        </nav>
                    </div>
                @endcanany

                <!-- end-Product -->




                <!-- promotion -->
                @can('other')
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                        data-bs-target="#promotion-layout" aria-expanded="false" aria-controls="promotion-layout">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Chương Trình Khuyến Mãi
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse {{ $module_active == 'promotion' ? 'show' : '' }}" id="promotion-layout"
                        aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="{{ route('admin.promotion.create') }}">Thêm Chương Trình khuyến
                                Mãi</a>
                            <a class="nav-link" href="{{ route('admin.promotion.list') }}">Danh sách Trình khuyến
                                Mãi</a>


                        </nav>
                    </div>
                @endcan

                <!-- end-promotuin-->



                <!-- Tag -->
                @canany(['tag-add', 'tag-list'])
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#tag-layout"
                        aria-expanded="false" aria-controls="product-layout">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Tag Sản Phẩm
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse {{ $module_active == 'tag' ? 'show' : '' }}" id="tag-layout"
                        aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            @can('tag-add')
                                <a class="nav-link" href="{{ route('admin.tag.create') }}">Thêm Mới</a>
                            @endcan
                            @can('tag-list')
                                <a class="nav-link" href="{{ route('admin.tag.list') }}">Danh Sách</a>
                            @endcan
                        </nav>
                    </div>
                @endcanany

                <!-- end-Tag -->



                <!-- category -->

                @canany(['category-add', 'category-list'])
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#category-layout"
                        aria-expanded="false" aria-controls="category-layout">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Danh Mục Sản Phẩm
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse {{ $module_active == 'category' ? 'show' : '' }}" id="category-layout"
                        aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            @can('category-add')
                                <a class="nav-link" href="{{ route('admin.category.create') }}">Thêm Mới</a>
                            @endcan
                            @can('category-list')
                                <a class="nav-link" href="{{ route('admin.category.list') }}">Danh Sách</a>
                            @endcan
                        </nav>
                    </div>
                @endcanany
                <!-- end-category -->









                <!-- ADD_PERMISSION -->

                @can('other')
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                        data-bs-target="#permission-layout" aria-expanded="false" aria-controls="permission-layout">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Thêm Các Module Cho Việc Phân Quyền
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="permission-layout" aria-labelledby="headingOne"
                        data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">

                            <a class="nav-link" href="{{ route('admin.permission.create') }}">Thêm Mới</a>
                        </nav>
                    </div>
                @endcan


                <!-- PERMISSION-->


                <!-- ADD_role -->
                @canany(['role-add', 'role-list'])
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#role-layout"
                        aria-expanded="false" aria-controls="role-layout">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Quyền
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse   {{ $module_active == 'role' ? 'show' : '' }}" id="role-layout"
                        aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            @can('role-add')
                                <a class="nav-link" href="{{ route('admin.role.create') }}">Thêm Mới Quyền</a>
                            @endcan

                            @can('role-list')
                                <a class="nav-link" href="{{ route('admin.role.list') }}">Danh Sách Quyền</a>
                            @endcan
                        </nav>
                    </div>
                @endcanany








                <!-- role-->



                <!-- header-cilent -->
                @can('other')
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                        data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                        <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                        Chỉnh Sửa Giao Diện Đầu Trang
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse {{ $module_active == 'header' ? 'show' : '' }}" id="collapsePages"
                        aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                data-bs-target="#pagesCollapseAuth" aria-expanded="false"
                                aria-controls="pagesCollapseAuth">
                                Banner Đầu Trang
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne"
                                data-bs-parent="#sidenavAccordionPages">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{ route('admin.header.edit_banner') }}">Tùy Chỉnh Banner
                                        Đầu Trang</a>
                                    <a class="nav-link" href="{{ route('admin.header.create_banner') }}">Thêm Banner

                                        Đầu Trang</a>

                                </nav>
                            </div>








                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                data-bs-target="#pagesCollapseError" aria-expanded="false"
                                aria-controls="pagesCollapseError">
                                Slider đầu trang
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne"
                                data-bs-parent="#sidenavAccordionPages">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{ route('admin.header.edit_slider') }}">Tùy Chỉnh
                                        Slider
                                        Đầu Trang</a>
                                    <a class="nav-link" href="{{ route('admin.header.create_slider') }}">Thêm Slider
                                        Đầu Trang</a>

                                </nav>
                            </div>
                        </nav>
                    </div>
                @endcan

                {{-- /////// --}}
                <div class="sb-sidenav-menu-heading">Addons</div>
                @can('other')
                    <a class="nav-link" href="{{ route('admin.chart.list') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                        Thống Kê Doanh Số
                    </a>

                    <a class="nav-link" href="tables.html">
                        <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                        Tables
                    </a>
                @endcan
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            Start Bootstrap
        </div>
    </nav>
</div>
