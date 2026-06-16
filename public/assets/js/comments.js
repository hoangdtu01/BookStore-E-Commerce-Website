$(document).ready(function () {
    $("#comment-form").on("submit", function (e) {
        e.preventDefault();

        var bookId = $("#book-id").val();
        var nicInstance = nicEditors.findEditor("comment-review-text");
        var content = nicInstance.getContent();
        var rating = $("#rating").val();

        $.ajax({
            url: "/comments",
            type: "POST",
            data: {
                _token: $('meta[name="csrf-token"]').attr("content"),
                book_id: bookId,
                content: content,
                rating: rating,
            },
            success: function (response) {
                if (response.success) {
                    // Thêm bình luận mới vào danh sách
                    $("#total-comment").text(
                        "Đánh giá(" + response.total + ")"
                    );
                    $("#comment-list").prepend(`
                        <li class="comment-list">
                            <div class="comment-wrapper">
                                <div class="comment-img">
                                    <i class="icon-user"></i>
                                </div>
                                <div class="comment-content">
                                    <div class="comment-content-top">
                                        <div class="comment-content-left">
                                            <h6 class="comment-name">${
                                                response.comment.user
                                            }</h6>
                                            <ul class="review-star">
                                                ${[...Array(5)]
                                                    .map(
                                                        (_, i) => `
                                                    <li class="${
                                                        i <
                                                        response.comment.rating
                                                            ? "fill"
                                                            : "empty"
                                                    }">
                                                        <i class="ion-android-star"></i>
                                                    </li>`
                                                    )
                                                    .join("")}
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="para-content">
                                        <p>${content}</p>
                                    </div>
                                </div>
                            </div>
                        </li>
                    `);

                    // Reset form
                    $("#comment-review-text").val("");
                    $("#rating").val("5");
                }
            },
            error: function (xhr) {
                if (xhr.status === 401) {
                    // Lỗi chưa đăng nhập
                    const redirectUrl = xhr.responseJSON.redirect_url;

                    // Chuyển hướng đến trang đăng nhập
                    window.location.href = redirectUrl;
                } else {
                    console.error(xhr.responseText);
                    alert("Đã xảy ra lỗi. Vui lòng thử lại.");
                }
            },
        });
    });
});
