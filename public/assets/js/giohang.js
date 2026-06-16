// Hàm để hiển thị modal
function showAddToCartModal() {
    var modalElement = document.getElementById("modalAddcart");
    var modal = new bootstrap.Modal(modalElement);
    modal.show();
}

// Hàm để ẩn modal
function hideAddToCartModal() {
    var modalElement = document.getElementById("modalAddcart");
    var modal = bootstrap.Modal.getInstance(modalElement);
    if (modal) {
        modal.hide();
    }
}

// Ẩn modal bằng nút "CONTINUE SHOPPING"
document
    .querySelector(".modal-continue-button a")
    .addEventListener("click", function () {
        hideAddToCartModal();
    });

// Gọi AJAX khi thêm sản phẩm
function addToCart(bookId, imgPath) {
    let SoLuong = 1; // Số lượng mặc định là 1
    if ($(".product-variable-quantity").length > 0) {
        SoLuong = $(".product-variable-quantity input").val();
    }
    $.ajax({
        url: "/giohang/add",
        type: "POST",
        data: {
            _token: $('meta[name="csrf-token"]').attr("content"),
            BookID: bookId,
            SoLuong: SoLuong,
        },
        success: function (response) {
            if (response.success) {
                // Cập nhật nội dung modal
                $(".modal-add-cart-product-img img").attr("src", imgPath);
                $(".modal-add-cart-info").html(
                    `<i class="fa fa-check-square"></i> ${response.message}`
                );
                $(
                    ".modal-add-cart-product-shipping-info li:first-child strong"
                ).html(
                    `<i class="icon-shopping-cart"></i> Hiện có ${response.cartQuantity} cuốn sách trong giỏ hàng.`
                );
                $(
                    ".modal-add-cart-product-shipping-info li:nth-child(2) span"
                ).text(response.totalPrice);

                console.log(response.SoLuong);
                // Cập nhật số lượng sản phẩm trong detail page
                if ($(".product-stock").length > 0) {
                    $(".product-stock").html(
                        `<span class="product-stock-in"><i class="ion-checkmark-circled"></i></span> Còn ${response.SoLuong} cuốn sách`
                    );
                }

                // Cập nhật Offcanvas Addcart Section
                $(".offcanvas-add-cart-wrapper .offcanvas-cart").html(
                    response.cartItems
                );
                $(".offcanvas-cart-total-price-value").text(
                    response.totalPrice
                );

                // Hiển thị modal
                showAddToCartModal();
            } else {
                // Cập nhật nội dung modal
                $(".modal-add-cart-product-img img").attr("src", imgPath);
                $(".modal-add-cart-info").html(
                    `<i class="fa fa-window-close"></i> ${response.message}`
                );
                $(
                    ".modal-add-cart-product-shipping-info li:first-child strong"
                ).html(
                    `<i class="icon-shopping-cart"></i> Hiện có ${response.cartQuantity} cuốn sách trong giỏ hàng.`
                );
                $(
                    ".modal-add-cart-product-shipping-info li:nth-child(2) span"
                ).text(response.totalPrice);
            }
        },
        error: function (xhr) {
            if (xhr.status === 401) {
                // Lỗi chưa đăng nhập
                const redirectUrl = xhr.responseJSON.redirect_url;

                // Chuyển hướng đến trang đăng nhập
                window.location.href = redirectUrl;
            } else {
                console.error(xhr.responseText); // Debug lỗi từ server
                alert("Đã xảy ra lỗi. Vui lòng thử lại.");
            }
        },
    });
}

function deleteCartItem(bookId) {
    if (confirm("Bạn có thực sự muốn xóa sách này không?")) {
        const book_Id =
            $(".product-details-text").length > 0
                ? $(".product-details-text .title").attr("id")
                : null;

        $.ajax({
            url: `/giohang/delete/${bookId}`,
            type: "DELETE",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (response) {
                if (response.success) {
                    // Cập nhật giỏ hàng (số lượng và tổng giá trị)
                    $(".offcanvas-add-cart-wrapper .offcanvas-cart").html(
                        response.cartItems
                    );
                    $(".offcanvas-cart-total-price-value").text(
                        response.totalPrice
                    );

                    console.log(response.SoLuong, response.BookID, book_Id);
                    // Cập nhật số lượng sản phẩm trong detail page
                    if (
                        $(".product-stock").length > 0 &&
                        response.BookID == book_Id
                    ) {
                        $(".product-stock").html(
                            `<span class="product-stock-in"><i class="ion-checkmark-circled"></i></span> Còn ${response.SoLuong} cuốn sách`
                        );
                    }
                } else {
                    alert("Xóa sách thất bại: " + response.message);
                }
            },
            error: function (xhr) {
                console.error("Lỗi xóa sách:", xhr.responseText);
                alert("Đã xảy ra lỗi, vui lòng thử lại!");
            },
        });
    }
}

function RemoveItem(bookId, imgPath) {
    if (confirm("Bạn có thực sự muốn xóa sách này không?")) {
        $.ajax({
            url: `/giohang/remove/${bookId}`,
            type: "DELETE",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (response) {
                if (response.success) {
                    // Cập nhật nội dung modal
                    $(".modal-add-cart-product-img img").attr("src", imgPath);
                    $(".modal-add-cart-info").html(
                        `<i class="fa fa-check-square"></i> ${response.message}`
                    );
                    $(
                        ".modal-add-cart-product-shipping-info li:first-child strong"
                    ).html(
                        `<i class="icon-shopping-cart"></i> Hiện có ${response.cartQuantity} cuốn sách trong giỏ hàng.`
                    );
                    $(
                        ".modal-add-cart-product-shipping-info li:nth-child(2) span"
                    ).text(response.totalPrice);

                    console.log(response.SoLuong);

                    // Cập nhật Offcanvas Addcart Section
                    $(".offcanvas-add-cart-wrapper .offcanvas-cart").html(
                        response.cartItems
                    );
                    $(".offcanvas-cart-total-price-value").text(
                        response.totalPrice
                    );

                    // Cập nhật số lượng sách trong detail cart
                    $(".tbody-sub-cart").html(response.detailItems);
                    $("#TotalBookPrice").text(response.totalPrice);
                    $("#TotalBook").text(response.totalPricehaveShip);
                    // Hiển thị modal
                    showAddToCartModal();
                } else {
                    alert("Xóa sách thất bại: " + response.message);
                }
            },
            error: function (xhr) {
                console.error("Lỗi xóa sách:", xhr.responseText);
                alert("Đã xảy ra lỗi, vui lòng thử lại!");
            },
        });
    }
}
