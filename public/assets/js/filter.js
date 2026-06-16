// $(function () {
//     $("#slider-range").slider({
//         range: true,
//         min: 20000,
//         max: 1000000,
//         values: [20000, 1000000],
//         slide: function (event, ui) {
//             // Cập nhật giá trị hiển thị trong input #amount
//             $("#amount").val(
//                 ui.values[0].toLocaleString("vi-VN") +
//                     "₫ - " +
//                     ui.values[1].toLocaleString("vi-VN") +
//                     "₫"
//             );

//             // Cập nhật giá trị của input ẩn (hidden input) price_range
//             $("#price-range-hidden").val(ui.values[0] + "-" + ui.values[1]);
//         },
//     });

//     $("#amount").val(
//         $("#slider-range").slider("values", 0).toLocaleString("vi-VN") +
//             "₫ - " +
//             $("#slider-range").slider("values", 1).toLocaleString("vi-VN") +
//             "₫"
//     );

//     $("#price-range-hidden").val(
//         $("#slider-range").slider("values", 0) +
//             "-" +
//             $("#slider-range").slider("values", 1)
//     );
// });
$(function () {
    // Lấy giá trị price_range từ thuộc tính data-price-range của label
    var priceRange = $("label[for='amount']").data("price-range");

    // Tách giá trị min và max từ priceRange
    var priceParts = priceRange.split("-");
    var minPrice = parseInt(priceParts[0]);
    var maxPrice = parseInt(priceParts[1]);

    // Khởi tạo slider với giá trị min và max đã lấy
    $("#slider-range").slider({
        range: true,
        min: 20000,
        max: 1000000,
        values: [minPrice, maxPrice],
        slide: function (event, ui) {
            // Cập nhật giá trị hiển thị trong input #amount
            $("#amount").val(
                ui.values[0].toLocaleString("vi-VN") +
                    "₫ - " +
                    ui.values[1].toLocaleString("vi-VN") +
                    "₫"
            );

            // Cập nhật giá trị của input ẩn (hidden input) price_range
            $("#price-range-hidden").val(ui.values[0] + "-" + ui.values[1]);
        },
    });

    // Cập nhật giá trị ban đầu khi trang được tải
    $("#amount").val(
        $("#slider-range").slider("values", 0).toLocaleString("vi-VN") +
            "₫ - " +
            $("#slider-range").slider("values", 1).toLocaleString("vi-VN") +
            "₫"
    );

    $("#price-range-hidden").val(
        $("#slider-range").slider("values", 0) +
            "-" +
            $("#slider-range").slider("values", 1)
    );
});
