@extends('layouts.app')
@section('content')

<!-- ...:::: Start Breadcrumb Section:::... -->
<div class="breadcrumb-section breadcrumb-bg-color--golden">
    <div class="breadcrumb-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="breadcrumb-title">Cửa hàng bán sách</h3>
                    <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                        <nav aria-label="breadcrumb">
                            <ul>
                                <li><a href="{{ route('home.index') }}">Home</a></li>
                                <li class="active" aria-current="page">Shop</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- ...:::: End Breadcrumb Section:::... -->

<!-- ...:::: Start Shop Section:::... -->
<div class="shop-section">
    <div class="container">
        <div class="row flex-column-reverse flex-lg-row">
            <div class="col-lg-3">
                <!-- Start Sidebar Area -->
                <div class="siderbar-section" data-aos="fade-up" data-aos-delay="0">

                    <!-- Start Single Sidebar Widget -->
                    <div class="sidebar-single-widget">
                        <h6 class="sidebar-title">TÁC GIẢ</h6>
                        <div class="sidebar-content">
                            <ul class="sidebar-menu">
                                @foreach ($tacgias as $tacgia)
                                    <li><a href="{{ route('filterbyAuthor', ['tacGiaID' => $tacgia->TacGiaID]) }}">{{ $tacgia->TenTacGia }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div> 
                    <!-- End Single Sidebar Widget -->

                    <!-- Start Single Sidebar Widget -->
                    <div class="sidebar-single-widget">
                        <h6 class="sidebar-title">LỌC THEO GIÁ</h6>
                        <div class="sidebar-content">
                            <div id="slider-range"></div>
                            <div class="filter-type-price">
                                <label for="amount" @if(request('price_range')) data-price-range="{{ request('price_range') }}"@else data-price-range="20000-1000000" @endif>Khoảng giá:</label>
                                <input type="text" id="amount" readonly style="width: 150px ">
                            </div>
                        </div>
                    </div> <!-- End Single Sidebar Widget -->

                    <!-- Start Single Sidebar Widget -->
                    <div class="sidebar-single-widget">
                        <h6 class="sidebar-title">THỂ LOẠI</h6>
                        <div class="sidebar-content">
                            <div class="filter-type-select">
                                <form action="{{ route('shop.filter') }}" method="GET">
                                    <ul>
                                        @foreach ($theloais as $theloai)
                                        <li>
                                            <label class="checkbox-default" for="{{ $theloai->TenTheLoai }}">
                                                <input type="checkbox" name="theloais[]" value="{{ $theloai->TheLoaiID }}" id="{{ $theloai->TenTheLoai }}"
                                                    @if(in_array($theloai->TheLoaiID, request('theloais', []))) checked @endif>
                                                <span>{{ $theloai->TenTheLoai }}</span>
                                            </label>
                                        </li>
                                        @endforeach
                                    </ul>

                                    <!-- Thêm input ẩn cho khoảng giá -->
                                    <input type="hidden" name="price_range" id="price-range-hidden">

                                    <button type="submit" class="btn btn-success" style="margin-top: 20px">Lọc</button>
                                </form>
                            </div>
                        </div>
                    </div> <!-- End Single Sidebar Widget -->
                </div> <!-- End Sidebar Area -->
            </div>
            <div class="col-lg-9">
                <!-- Start Shop Product Sorting Section -->
                <div class="shop-sort-section">
                    <div class="container">
                        <div class="row">
                            <!-- Start Sort Wrapper Box -->
                            <div class="sort-box d-flex justify-content-between align-items-md-center align-items-start flex-md-row flex-column"
                                data-aos="fade-up" data-aos-delay="0">
                                <!-- Start Sort tab Button -->
                                <div class="sort-tablist d-flex align-items-center">
                                    <ul class="tablist nav sort-tab-btn">
                                        <li><a class="nav-link active" data-bs-toggle="tab"
                                                href="#layout-3-grid"><img src="{{ asset('assets/images/icons/bkg_grid.png') }}"
                                                    alt=""></a></li>
                                    </ul>

                                    <!-- Start Page Amount -->
                                    <div class="page-amount ml-2">
                                        <span>Showing {{ $books->firstItem() }}–{{ $books->lastItem() }} of {{ $books->total() }} results</span>
                                    </div> <!-- End Page Amount -->
                                </div> <!-- End Sort tab Button -->

                                <!-- Start Sort Select Option -->
                                <div class="sort-select-list d-flex align-items-center">
                                    <label class="mr-2">Sắp xếp theo:</label>
                                    <form action="#">
                                        <fieldset>
                                            <select name="speed" id="speed">
                                                <option selected="selected">Sắp xếp theo ngày</option>
                                                <option>Sắp xếp theo giá: thấp đến cao</option>
                                                <option>Sắp xếp theo giá: cao đến thấp</option>
                                            </select>
                                        </fieldset>
                                    </form>
                                </div> <!-- End Sort Select Option -->



                            </div> <!-- Start Sort Wrapper Box -->
                        </div>
                    </div>
                </div> <!-- End Section Content -->

                <!-- Start Tab Wrapper -->
                <div class="sort-product-tab-wrapper">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                @if(request('search'))
                                    <p class="search-results" style="font-size: 20px; ">Kết quả tìm kiếm cho: <strong>"{{ request('search') }}"</strong></p>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="tab-content tab-animate-zoom">
                                    <!-- Start Grid View Product -->
                                    <div class="tab-pane active show sort-layout-single" id="layout-3-grid">
                                        <div class="row">
                                            @foreach ($books as $book)
                                            <div class="col-xl-4 col-sm-6 col-12">
                                                <!-- Start Product Default Single Item -->
                                                <div class="product-default-single-item product-color--golden"
                                                    data-aos="fade-up" data-aos-delay="0">
                                                    <div class="image-box">
                                                        <a href="{{ route('book.detail',  ['id' => $book->BookID]) }}" class="image-link">
                                                            <img src="{{ asset('storage/' . ($book->images->first()?->ImgPath)) }}" alt="Ảnh sách">
                                                            <img src="{{ asset('storage/' . ($book->images->first()?->ImgPath)) }}" alt="Ảnh sách">
                                                        </a>
                                                        <div class="action-link">
                                                            <div class="action-link-left">
                                                                <a href="#" onclick="event.preventDefault(); addToCart('{{ $book->BookID }}', '{{ asset('storage/' . ($book->images->first()?->ImgPath)) }}')"> Thêm vào giỏ hàng </a>
                                                            </div>
                                                            <div class="action-link-right">
                                                                <a href="#"><i
                                                                        class="icon-heart"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="content">
                                                        <div class="content-left">
                                                            <h6 class="title"><a href="product-details-default.html">{{ $book->TenSach }}</a></h6>
                                                            <ul class="review-star">
                                                                <li class="fill"><i class="ion-android-star"></i>
                                                                </li>
                                                                <li class="fill"><i class="ion-android-star"></i>
                                                                </li>
                                                                <li class="fill"><i class="ion-android-star"></i>
                                                                </li>
                                                                <li class="fill"><i class="ion-android-star"></i>
                                                                </li>
                                                                <li class="empty"><i class="ion-android-star"></i>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="content-right">
                                                            <span class="price">{{ number_format($book->Gia, 0, ',', '.') }} VND</span>
                                                        </div>

                                                    </div>
                                                </div>
                                                <!-- End Product Default Single Item -->
                                            </div>
                                            @endforeach
                                        </div>
                                    </div> <!-- End Grid View Product -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- End Tab Wrapper -->

                <!-- Start Pagination -->
                <div class="page-pagination text-center" data-aos="fade-up" data-aos-delay="0">
                    {{-- <ul>
                        <li><a class="active" href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#"><i class="ion-ios-skipforward"></i></a></li>
                    </ul> --}}
                    <!-- Nút Trang Trước -->
                    @if ($books->onFirstPage())
                    <li><a href="#" class="disabled"><i class="ion-ios-skipbackward"></i></a></li>
                    @else
                        <li><a href="{{ $books->previousPageUrl() }}"><i class="ion-ios-skipbackward"></i></a></li>
                    @endif

                    <!-- Các Trang -->
                    @foreach ($books->getUrlRange(1, $books->lastPage()) as $page => $url)
                        <li>
                            <a href="{{ $url }}" class="{{ $page == $books->currentPage() ? 'active' : '' }}">
                                {{ $page }}
                            </a>
                        </li>
                    @endforeach

                    <!-- Nút Trang Tiếp -->
                    @if ($books->hasMorePages())
                        <li><a href="{{ $books->nextPageUrl() }}"><i class="ion-ios-skipforward"></i></a></li>
                    @else
                        <li><a href="#" class="disabled"><i class="ion-ios-skipforward"></i></a></li>
                    @endif
                </div> <!-- End Pagination -->
            </div>
        </div>
    </div>
</div> <!-- ...:::: End Shop Section:::... -->

<!-- Start Modal Add cart -->
<div class="modal fade" id="modalAddcart" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col text-right">
                            <button type="button" class="close modal-close" data-bs-dismiss="modal"
                                aria-label="Close">
                                <span aria-hidden="true"> <i class="fa fa-times"></i></span>
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-7">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="modal-add-cart-product-img">
                                        <img class="img-fluid"
                                            src="assets/images/product/default/home-1/default-1.jpg" alt="Ảnh Sách">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="modal-add-cart-info"><i class="fa fa-check-square"></i>Added to cart
                                        successfully!</div>
                                    <div class="modal-add-cart-product-cart-buttons">
                                        <a href="cart.html">View Cart</a>
                                        <a href="checkout.html">Checkout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 modal-border">
                            <ul class="modal-add-cart-product-shipping-info">
                                <li> <strong><i class="icon-shopping-cart"></i> Có 5 cuốn sách trong giỏ hàng.</strong></li>
                                <li> <strong>Tổng giá: </strong> <span>$187.00</span></li>
                                <li class="modal-continue-button"><a href="#" data-bs-dismiss="modal">CONTINUE
                                        SHOPPING</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- End Modal Add cart -->
<script src="{{ asset('assets/js/giohang.js') }}"></script>
<script src="{{ asset('assets/js/filter.js') }}"></script>
@endsection