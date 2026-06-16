@extends('layouts.app')
@section('content')
<!-- Start Hero Slider Section-->
<div class="hero-slider-section">
    <!-- Slider main container -->
    <div class="hero-slider-active swiper-container">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            <!-- Start Hero Single Slider Item -->
            <div class="hero-single-slider-item swiper-slide">
                <!-- Hero Slider Image -->
                <div class="hero-slider-bg">
                    <img src="{{ asset('assets/images/hero-slider/home-1/slider-picture2.jpg') }}" alt="">
                </div>
                <!-- Hero Slider Content -->
                <div class="hero-slider-wrapper">
                    <div class="container">
                        <div class="row">
                            <div class="col-auto">
                                <div class="hero-slider-content">
                                    <h4 class="subtitle">Trang sách mới</h4>
                                    <h2 class="title">Hành trình mới</h2>
                                    <a href="{{ route('shop.index') }}"
                                        class="btn btn-lg btn-outline-golden">Đặt hàng ngay </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- End Hero Single Slider Item -->
            <!-- Start Hero Single Slider Item -->
            <div class="hero-single-slider-item swiper-slide">
                <!-- Hero Slider Image -->
                <div class="hero-slider-bg">
                    <img src="{{ asset('assets/images/hero-slider/home-1/slider-picture3.jpg') }}" alt="">
                </div>
                <!-- Hero Slider Content -->
                <div class="hero-slider-wrapper">
                    <div class="container">
                        <div class="row">
                            <div class="col-auto">
                                <div class="hero-slider-content">
                                    <h4 class="subtitle">Khơi nguồn tri thức</h4>
                                    <h2 class="title">Mở lối tương lai</h2>
                                    <a href="{{ route('shop.index') }}"
                                        class="btn btn-lg btn-outline-golden">Đặt hàng ngay </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- End Hero Single Slider Item -->
        </div>

        <!-- If we need pagination -->
        <div class="swiper-pagination active-color-golden"></div>

        <!-- If we need navigation buttons -->
        <div class="swiper-button-prev d-none d-lg-block"></div>
        <div class="swiper-button-next d-none d-lg-block"></div>
    </div>
</div>
<!-- End Hero Slider Section-->

<!-- Start Service Section -->
<div class="service-promo-section section-top-gap-100">
    <div class="service-wrapper">
        <div class="container">
            <div class="row">
                <!-- Start Service Promo Single Item -->
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="service-promo-single-item" data-aos="fade-up" data-aos-delay="0">
                        <div class="image">
                            <img src=" {{ asset('assets/images/icons/service-promo-1.png') }}" alt="">
                        </div>
                        <div class="content">
                            <h6 class="title">MIỄN PHÍ VẬN CHUYỂN</h6>
                            <p>Nhận lại 10% tiền mặt, giao hàng miễn phí, trả lại miễn phí và hơn thế nữa tại hơn 1000 nhà bán lẻ hàng đầu!</p>
                        </div>
                    </div>
                </div>
                <!-- End Service Promo Single Item -->
                <!-- Start Service Promo Single Item -->
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="service-promo-single-item" data-aos="fade-up" data-aos-delay="200">
                        <div class="image">
                            <img src="{{ asset('assets/images/icons/service-promo-2.png') }}" alt="">
                        </div>
                        <div class="content">
                            <h6 class="title">30 NGÀY ĐỔI TRẢ</h6>
                            <p>Đảm bảo sự hài lòng 100% hoặc nhận lại tiền trong vòng 30 ngày!</p>
                        </div>
                    </div>
                </div>
                <!-- End Service Promo Single Item -->
                <!-- Start Service Promo Single Item -->
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="service-promo-single-item" data-aos="fade-up" data-aos-delay="400">
                        <div class="image">
                            <img src="{{ asset('assets/images/icons/service-promo-3.png') }}" alt="">
                        </div>
                        <div class="content">
                            <h6 class="title">THANH TOÁN AN TOÀN</h6>
                            <p>Thanh toán sau khi nhận hàng.</p>
                        </div>
                    </div>
                </div>
                <!-- End Service Promo Single Item -->
                <!-- Start Service Promo Single Item -->
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="service-promo-single-item" data-aos="fade-up" data-aos-delay="600">
                        <div class="image">
                            <img src="{{ asset('assets/images/icons/service-promo-4.png') }}" alt="">
                        </div>
                        <div class="content">
                            <h6 class="title">KHÁCH HÀNG THÂN THIẾT</h6>
                            <p>Giảm 30% giao dịch mua còn lại của họ với tỷ lệ hoàn lại tiền là 1%.</p>
                        </div>
                    </div>
                </div>
                <!-- End Service Promo Single Item -->
            </div>
        </div>
    </div>
</div>
<!-- End Service Section -->

<!-- Start Product Default Slider Section -->
<div class="product-default-slider-section section-top-gap-100 section-fluid">
    <!-- Start Section Content Text Area -->
    <div class="section-title-wrapper" data-aos="fade-up" data-aos-delay="0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-content-gap">
                        <div class="secton-content">
                            <h3 class="section-title">SÁCH MỚI</h3>
                            <p>Đặt hàng ngay để nhận ưu đãi & quà tặng độc quyền</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Start Section Content Text Area -->
    <div class="product-wrapper" data-aos="fade-up" data-aos-delay="200">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product-slider-default-2rows default-slider-nav-arrow">
                        <!-- Slider main container -->
                        <div class="swiper-container product-default-slider-4grid-2row">
                            <!-- Additional required wrapper -->
                            <div class="swiper-wrapper">
                                <!-- Start Product Default Single Item -->
                                @foreach($newBooks as $book)
                                <div class="product-default-single-item product-color--golden swiper-slide">
                                    <div class="image-box">
                                        <a href="product-details-default.html" class="image-link">
                                            <img src="{{ asset('storage/' . $book->images->first()->ImgPath) }}" alt="{{ $book->TenSach }}">
                                            @if($book->images->count() > 1)
                                                <img src="{{ asset('storage/' . $book->images->skip(1)->first()->ImgPath) }}" alt="{{ $book->TenSach }}">
                                            @else
                                                <!-- Nếu không có bức ảnh thứ 2, hiển thị ảnh mặc định -->
                                                <img src="{{ asset('storage/default.jpg') }}" alt="default">
                                            @endif
                                        </a>
                                        <div class="action-link">
                                            <div class="action-link-left">
                                                <a href="#" data-bs-toggle="modal"
                                                    data-bs-target="#modalAddcart">Thêm vào giỏ hàng</a>
                                            </div>
                                            <div class="action-link-right">
                                                <a href="#" data-bs-toggle="modal"
                                                    data-bs-target="#modalQuickview"><i
                                                        class="icon-magnifier"></i></a>
                                                <a href="wishlist.html"><i class="icon-heart"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="content">
                                        <div class="content-left">
                                            <h6 class="title"><a href="{{ route('book.detail',  ['id' => $book->BookID]) }}">{{ $book->TenSach }}</a></h6>
                                            <ul class="review-star">
                                                <li class="fill"><i class="ion-android-star"></i></li>
                                                <li class="fill"><i class="ion-android-star"></i></li>
                                                <li class="fill"><i class="ion-android-star"></i></li>
                                                <li class="fill"><i class="ion-android-star"></i></li>
                                                <li class="empty"><i class="ion-android-star"></i></li>
                                            </ul>
                                        </div>
                                        <div class="content-right">
                                            <span class="price">{{ number_format($book->Gia, 0, ',', '.') }} VND</span>
                                        </div>

                                    </div>
                                </div>
                                @endforeach
                                <!-- End Product Default Single Item -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Product Default Slider Section -->

@endsection