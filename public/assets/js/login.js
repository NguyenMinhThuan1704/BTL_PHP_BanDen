document.addEventListener('DOMContentLoaded', function () {
    var toggleIcons = document.querySelectorAll('.icon_eye');

    toggleIcons.forEach(function (icon) {
        icon.addEventListener('click', function () {
            var passwordInput = icon.parentElement.querySelector('.matkhau_pass');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
            } else {
                passwordInput.type = 'password';
            }
        });
    });

    // var taikhoanInput = document.getElementById("taikhoan");
    // var matkhauInput = document.getElementById("matkhau");
    // var dangnhapButton = document.querySelector(".btn-dangnhap");

    // dangnhapButton.addEventListener("click", function() {
    //     var taiKhoan = taikhoanInput.value;
    //     var matKhau = matkhauInput.value;

    //     if (taiKhoan === "user" && matKhau === "123") {
    //         alert("Đăng nhập thành công!")
    //         window.location.href = "index_main.html";
    //     } else if (taiKhoan === "admin" && matKhau === "123") {
    //         alert("Đăng nhập thành công!")
    //         window.location.href = "admin/TongQuan.html";
    //     } else {
    //         alert("Tài khoản hoặc mật khẩu không chính xác. Vui lòng thử lại.");
    //     }
    // });
});
