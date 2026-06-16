<!-- Start Cart Single Item-->
@if(isset($detailItems))
@foreach ($detailItems as $item)
    <tr>
        <td class="product_remove"><a href="#" onclick="event.preventDefault(); RemoveItem('{{ $item->book->BookID }}', '{{ asset('storage/' . ($item->book->images->first()?->ImgPath)) }}')"><i class="fa fa-trash-o"></i></a>
        </td>
        <td class="product_thumb"><a href="{{ route('book.detail',  ['id' => $item->book->BookID]) }}"><img
                    src="{{ asset('storage/' . ($item->book->images->first()?->ImgPath))}}"
                    alt="Ảnh Sách"></a></td>
        <td class="product_name"><a href="{{ route('book.detail',  ['id' => $item->book->BookID]) }}">{{ $item->book->TenSach }}</a></td>
        <td class="product-price">{{ number_format($item->book->Gia, 0, ',', '.') }}₫</td>
        <td class="product_quantity">
            <label>Số lượng</label>
            <input min="1" max="100" value="{{ $item->SoLuong }}" type="number" name="quantities[{{ $item->book->BookID }}]">
            <input type="hidden" name="book_ids[]" value="{{ $item->book->BookID }}">
        </td>
    </tr> 
@endforeach
@endif
<!-- End Cart Single Item-->