function deleteImage(imageId) {
    if (confirm("Bạn có thực sự muốn xóa ảnh này không?")) {
        $.ajax({
            url: `/books/images/${imageId}`,
            type: "DELETE",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (response) {
                if (response.success) {
                    alert("Ảnh đã được xóa thành công!");
                    location.reload();
                } else {
                    alert("Xóa ảnh thất bại: " + response.message);
                }
            },
            error: function (xhr) {
                console.error("Lỗi xóa ảnh:", xhr.responseText);
                alert("Đã xảy ra lỗi, vui lòng thử lại!");
            },
        });
    }
}
