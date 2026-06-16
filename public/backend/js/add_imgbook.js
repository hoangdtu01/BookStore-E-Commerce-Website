function previewImages(event) {
    const files = event.target.files; // Lấy danh sách tệp đã chọn
    const previewContainer = document.getElementById("imagePreview"); // Khu vực hiển thị ảnh
    previewContainer.innerHTML = ""; // Xóa nội dung cũ nếu người dùng chọn lại

    if (files) {
        Array.from(files).forEach((file) => {
            // Kiểm tra định dạng file có phải là ảnh
            if (file.type.startsWith("image/")) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    // Tạo một thẻ img để hiển thị ảnh
                    const img = document.createElement("img");
                    img.src = e.target.result;
                    img.alt = file.name;
                    img.style.width = "100px"; // Kích thước ảnh nhỏ
                    img.style.height = "100px";
                    img.style.objectFit = "cover";
                    img.style.border = "1px solid #ccc";
                    img.style.borderRadius = "5px";

                    previewContainer.appendChild(img); // Thêm ảnh vào khu vực preview
                };
                reader.readAsDataURL(file); // Đọc tệp ảnh
            }
        });
    }
}

// function validateAndPreviewImages(event) {
//     const maxFileSize = 1024 *1024 ; // 1 MB
//     const files = event.target.files;
//     const previewContainer = document.getElementById("imagePreview");
//     const errorMessages = document.getElementById("errorMessages");

//     // Xóa nội dung trước đó
//     previewContainer.innerHTML = "";
//     errorMessages.innerHTML = "";

//     // Lặp qua từng file để kiểm tra và hiển thị
//     Array.from(files).forEach((file, index) => {
//         if (file.size > maxFileSize) {
//             // Hiển thị thông báo lỗi nếu file quá lớn
//             const errorMessage = `Hình ảnh "${file.name}" vượt quá dung lượng cho phép (1 MB).`;
//             errorMessages.innerHTML += `<p>${errorMessage}</p>`;
//         } else if (file.type.startsWith("image/")) {
//             // Hiển thị ảnh nếu hợp lệ
//             const reader = new FileReader();
//             reader.onload = function (e) {
//                 const img = document.createElement("img");
//                 img.src = e.target.result;
//                 img.style.width = "100px";
//                 img.style.height = "100px";
//                 img.style.objectFit = "cover";
//                 img.style.border = "1px solid #ddd";
//                 img.style.borderRadius = "5px";
//                 previewContainer.appendChild(img);
//             };
//             reader.readAsDataURL(file);
//         }
//     });
// }
function validateAndPreviewImages(event) {
    const maxFileSize = 1024 * 1024; // 1 MB
    const files = event.target.files;
    const previewContainer = document.getElementById("imagePreview");
    const errorMessages = document.getElementById("errorMessages");

    // Xóa nội dung trước đó
    previewContainer.innerHTML = "";
    errorMessages.innerHTML = "";

    // Lặp qua từng file để kiểm tra và hiển thị
    Array.from(files).forEach((file) => {
        if (file.size > maxFileSize) {
            // Hiển thị thông báo lỗi nếu file quá lớn
            const errorMessage = `Hình ảnh "${file.name}" vượt quá dung lượng cho phép (1 MB).`;
            errorMessages.innerHTML += `<p>${errorMessage}</p>`;
        } else if (file.type.startsWith("image/")) {
            const reader = new FileReader();
            reader.onload = function (e) {
                const img = new Image();
                img.src = e.target.result;

                img.onload = function () {
                    // Kiểm tra kích thước ảnh
                    if (img.width !== 750 || img.height !== 750) {
                        const errorMessage = `Hình ảnh "${file.name}" không đúng kích thước yêu cầu (750 x 750 px).`;
                        errorMessages.innerHTML += `<p>${errorMessage}</p>`;
                    } else {
                        // Hiển thị ảnh nếu hợp lệ
                        const imgPreview = document.createElement("img");
                        imgPreview.src = img.src;
                        imgPreview.style.width = "100px";
                        imgPreview.style.height = "100px";
                        imgPreview.style.objectFit = "cover";
                        imgPreview.style.border = "1px solid #ddd";
                        imgPreview.style.borderRadius = "5px";
                        previewContainer.appendChild(imgPreview);
                    }
                };
            };
            reader.readAsDataURL(file); // Đọc file ảnh
        }
    });
}
