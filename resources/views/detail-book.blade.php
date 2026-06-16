@extends('layouts.app')
@section('content')
<!-- ...:::: Start Breadcrumb Section:::... -->
<div class="breadcrumb-section breadcrumb-bg-color--golden">
  <div class="breadcrumb-wrapper">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h3 class="breadcrumb-title">Chi tiết sách</h3>
          <div
            class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden"
          >
            <nav aria-label="breadcrumb">
              <ul>
                <li><a href="{{ route('home.index') }}">Home</a></li>
                <li><a href="{{ route('shop.index') }}">Shop</a></li>
                <li class="active" aria-current="page">
                  Chi tiết sách
                </li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- ...:::: End Breadcrumb Section:::... -->

<!-- Start Product Details Section -->
<div class="product-details-section">
  <div class="container">
    <div class="row">
      <div class="col-xl-5 col-lg-6">
        <div
          class="product-details-gallery-area"
          data-aos="fade-up"
          data-aos-delay="0"
        >
          <!-- Start Large Image -->
          <div
            class="product-large-image product-large-image-horaizontal swiper-container"
          >
            <div class="swiper-wrapper">
              @foreach ($book->images as $image)
                  <div class="product-image-large-image swiper-slide zoom-image-hover img-responsive">
                      <img src="{{ asset('storage/' . $image->ImgPath) }}" alt="{{ $book->TenSach }}" />
                  </div>
              @endforeach
            </div>
          </div>
          <!-- End Large Image -->
          <!-- Start Thumbnail Image -->
          <div
            class="product-image-thumb product-image-thumb-horizontal swiper-container pos-relative mt-5"
          >
            <div class="swiper-wrapper">
              @foreach ($book->images as $image)
              <div class="product-image-thumb-single swiper-slide">
                  <img class="img-fluid" src="{{ asset('storage/' . $image->ImgPath) }}" alt="{{ $book->TenSach }}" />
              </div>
              @endforeach
            </div>
            <!-- Add Arrows -->
            <div class="gallery-thumb-arrow swiper-button-next"></div>
            <div class="gallery-thumb-arrow swiper-button-prev"></div>
          </div>
          <!-- End Thumbnail Image -->
        </div>
      </div>
      <div class="col-xl-7 col-lg-6">
        <div
          class="product-details-content-area product-details--golden"
          data-aos="fade-up"
          data-aos-delay="200"
        >
          <!-- Start  Product Details Text Area-->
          <div class="product-details-text">
            <h4 class="title" id="{{ $book->BookID }}">{{ $book->TenSach }}</h4>
            <div class="d-flex align-items-center">
              <ul class="review-star">
                <li class="fill"><i class="ion-android-star"></i></li>
                <li class="fill"><i class="ion-android-star"></i></li>
                <li class="fill"><i class="ion-android-star"></i></li>
                <li class="fill"><i class="ion-android-star"></i></li>
                <li class="empty"><i class="ion-android-star"></i></li>
              </ul>
              <a href="#" class="customer-review ml-2"
                >(Đánh giá của khách )</a
              >
            </div>
            <div class="price">{{ number_format($book->Gia, 0, ',', '.') }} VND</div>
          </div>
          <!-- End  Product Details Text Area-->
          <!-- Start Product Variable Area -->
          <div class="product-details-variable">
            <h4 class="title">Tùy chọn có sẵn</h4>
            <!-- Product Variable Single Item -->
            <div class="variable-single-item">
              <div class="product-stock">
                <span class="product-stock-in"
                  ><i class="ion-checkmark-circled"></i
                ></span>
                Còn {{ $book->SoLuong }} cuốn sách 
              </div>
            </div>
            <!-- Product Variable Single Item -->
            <div class="d-flex align-items-center">
              <div class="variable-single-item">
                <span>Số lượng</span>
                <div class="product-variable-quantity">
                  <input min="1" max="100" value="1" type="number" />
                </div>
              </div>

              <div class="product-add-to-cart-btn">
                <a
                  href="#" onclick="event.preventDefault(); addToCart('{{ $book->BookID }}', '{{ asset('storage/' . ($book->images->first()?->ImgPath)) }}')"
                  class="btn btn-block btn-lg btn-black-default-hover"
                  >+ Thêm vào giỏ hàng</a
                >
              </div>
            </div>
            <!-- Start  Product Details Meta Area-->
            <div class="product-details-meta mb-20">
              <a href="wishlist.html" class="icon-space-right"
                ><i class="icon-heart"></i>Thêm vào yêu thích</a
              >
            </div>
            <!-- End  Product Details Meta Area-->
          </div>
          <!-- End Product Variable Area -->

          <!-- Start  Product Details Catagories Area-->
          <div class="product-details-catagory mb-2">
            <span class="title">Thể loại:</span>
            <ul>
              @foreach ($book->theloais as $theloai)
              <li><a href="{{ route('shop.filter', ['theloais' => [$theloai->TheLoaiID]]) }}">{{ $theloai->TenTheLoai }}</a></li>
              @endforeach
            </ul>
          </div>
          <!-- End  Product Details Catagories Area-->
          <!-- Start  Product Details Social Area-->
          <div class="product-details-social">
            <span class="title">Chia sẻ cuốn sách này:</span>
            <ul>
              <li>
                <a href="#"><i class="fa fa-facebook"></i></a>
              </li>
              <li>
                <a href="#"><i class="fa fa-twitter"></i></a>
              </li>
              <li>
                <a href="#"><i class="fa fa-pinterest"></i></a>
              </li>
              <li>
                <a href="#"><i class="fa fa-google-plus"></i></a>
              </li>
              <li>
                <a href="#"><i class="fa fa-linkedin"></i></a>
              </li>
            </ul>
          </div>
          <!-- End  Product Details Social Area-->
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Product Details Section -->

<!-- Start Product Content Tab Section -->
<div class="product-details-content-tab-section section-top-gap-100">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div
          class="product-details-content-tab-wrapper"
          data-aos="fade-up"
          data-aos-delay="0"
        >
          <!-- Start Product Details Tab Button -->
          <ul
            class="nav tablist product-details-content-tab-btn d-flex justify-content-center"
          >
            <li>
              <a
                class="nav-link active"
                data-bs-toggle="tab"
                href="#description"
              >
                Mô tả
              </a>
            </li>
            <li>
              <a
                class="nav-link"
                data-bs-toggle="tab"
                href="#specification"
              >
              Thông tin chi tiết
              </a>
            </li>
            <li>
              <a class="nav-link" data-bs-toggle="tab" href="#review" id="total-comment">
                Đánh giá({{ $total }})
              </a>
            </li>
          </ul>
          <!-- End Product Details Tab Button -->

          <!-- Start Product Details Tab Content -->
          <div class="product-details-content-tab">
            <div class="tab-content">
              <!-- Start Product Details Tab Content Singel -->
              <div class="tab-pane active show" id="description">
                <div class="single-tab-content-item">
                  <p>
                    {{ $book->MoTa }}
                  </p>
                </div>
              </div>
              <!-- End Product Details Tab Content Singel -->
              <!-- Start Product Details Tab Content Singel -->
              <div class="tab-pane" id="specification">
                <div class="single-tab-content-item">
                  <table class="table table-bordered mb-20">
                    <tbody>
                      <tr>
                        <th scope="row">Tác Giả</th>
                        <td>{{  $book->tacGia->TenTacGia  }}</td>
                      </tr>
                      <tr>
                        <th scope="row">Nhà Xuất Bản</th>
                        <td>{{ $book->NXB }}</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <!-- End Product Details Tab Content Singel -->
              <!-- Start Product Details Tab Content Singel -->
              <div class="tab-pane" id="review">
                <div class="single-tab-content-item">
                  <!-- Danh sách bình luận -->
                  <ul class="comment" id="comment-list">
                    @foreach($comments as $comment)
                    <li class="comment-list">
                        <div class="comment-wrapper">
                            <div class="comment-img">
                                <i class="icon-user"></i>
                            </div>
                            <div class="comment-content">
                                <div class="comment-content-top">
                                    <div class="comment-content-left">
                                        <h6 class="comment-name">{{ $comment->user->name }}</h6>
                                        <ul class="review-star">
                                            @for($i = 1; $i <= 5; $i++)
                                                <li class="{{ $i <= $comment->Sao ? 'fill' : 'empty' }}">
                                                    <i class="ion-android-star"></i>
                                                </li>
                                            @endfor
                                        </ul>
                                    </div>
                                </div>
                                <div class="para-content">
                                    <p>{!! $comment->NoiDung !!}</p>
                                </div>
                            </div>
                        </div>
                    </li>
                    @endforeach
                  </ul>
                  <!-- End - Review Comment -->
                  <!-- Start - Đánh giá -->
                  <div class="review-form">
                    <div class="review-form-text-top">
                        <h5>Thêm đánh giá</h5>
                        <p>
                            Địa chỉ email của bạn sẽ không được công bố. <span style="color: red">*</span>
                        </p>
                    </div>
                
                    <form id="comment-form">
                      @csrf
                      <input type="hidden" id="book-id" value="{{ $book->BookID }}">
                      <div class="row">
                          <div class="col-12">
                            <div class="default-form-box">
                                <label for="comment-review-text">
                                    Đánh giá của bạn <span style="color: red">*</span>
                                </label>
                                <textarea id="comment-review-text" placeholder="Write a review" ></textarea>
                            </div>
                          </div>
                          <div class="col-12">
                            <div class="default-form-box">
                              <label for="rating">Đánh giá (sao) <span style="color: red">*</span> </label>
                              <select id="rating" name="rating" required>
                                  <option value="5">5 sao</option>
                                  <option value="4">4 sao</option>
                                  <option value="3">3 sao</option>
                                  <option value="2">2 sao</option>
                                  <option value="1">1 sao</option>
                              </select>
                            </div>  
                          </div>
                          <div class="col-12">
                              <button class="btn btn-md btn-black-default-hover" type="submit"  style="margin-top: 10px;">Submit</button>
                          </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <!-- End Product Details Tab Content Singel -->
            </div>
          </div>
          <!-- End Product Details Tab Content -->
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Product Content Tab Section -->

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
<script src="{{ asset('assets/js/comments.js') }}"></script>
<script type="text/javascript" src="//js.nicedit.com/nicEdit-latest.js"></script> 
<script type="text/javascript">

        bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
</script>
@endsection