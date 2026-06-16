@if(isset($cartItems))
    @foreach ($cartItems as $item)
    <li class="offcanvas-cart-item-single">
        <div class="offcanvas-cart-item-block">
            <a href="{{ route('book.detail',  ['id' => $item->book->BookID]) }}" class="offcanvas-cart-item-image-link">
                <img src="{{ asset('storage/' . ($item->book->images->first()?->ImgPath))}}" alt="Ảnh Sách"
                    class="offcanvas-cart-image">
            </a>
            <div class="offcanvas-cart-item-content">
                <a href="#" class="offcanvas-cart-item-link">{{ $item->book->TenSach }}</a>
                <div class="offcanvas-cart-item-details">
                    <span class="offcanvas-cart-item-details-quantity">{{ $item->SoLuong }} x </span>
                    <span class="offcanvas-cart-item-details-price">{{ number_format($item->book->Gia, 0, ',', '.') }}₫</span>
                </div>
            </div>
        </div>
        <div class="offcanvas-cart-item-delete text-right">
            <a href="#" onclick="event.preventDefault(); deleteCartItem('{{ $item->book->BookID }}')" class="offcanvas-cart-item-delete"><i class="fa fa-trash-o"></i></a>
        </div>
    </li>
    @endforeach
@endif