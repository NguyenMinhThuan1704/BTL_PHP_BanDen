let cartProducts = [];

document.addEventListener('DOMContentLoaded', function () {

    const storedProducts = localStorage.getItem('carts');
    if (storedProducts) {
        cartProducts = JSON.parse(storedProducts);
    }

    const list_giohang = document.querySelector('.gio_hang');

    // Hàm cập nhật số lượng
    const updateQuantity = (index, newQuantity) => {
        const product = cartProducts[index];

        if (product) {
            const quantityInput = list_giohang.querySelector(`#quantity-${index}`);

            // Cập nhật số lượng
            product.quantity = newQuantity;

            // Hiển thị số lượng mới
            quantityInput.value = newQuantity;

            // Lưu mảng cartProducts vào local storage
            localStorage.setItem('carts', JSON.stringify(cartProducts));

            // Cập nhật tổng tiền
            updateTotalPrice();
        }
    };

    const updateTotalPrice = () => {
        const totalPriceElement = document.getElementById('totalPrice');
        let totalPrice = 0;

        cartProducts.forEach((product) => {
            totalPrice += product.giagiam * product.quantity;
        });

        // Hiển thị tổng tiền
        totalPriceElement.textContent = `${formatCurrency(totalPrice)}đ`;
    };

    // Hàm định dạng số tiền thành chuỗi có dấu phân cách ngàn
    const formatCurrency = (amount) => {
        return amount.toLocaleString('vi-VN');
    };

    const html_giohang = cartProducts.map((product, index) => {
        return `
            <div class="row grid wide" style="margin-top: 10px;">
                <div class="col c-12" style="padding: 0; display: flex;">
                    <div class="col c-2 product__img">
                        <a href="" class="product__img-link">
                            <img src="${product.img}" alt="" class="img">
                        </a>
                    </div>
                    <div class="col c-10 product__thongtin">
                        <div class="name-cart">
                            <span>${product.title}</span>
                        </div>

                        <div class="price__wrapper">
                            <div class="row grid wide price__chitiet">
                                <div class="col c-5">
                                    <div class="number">
                                        <div class="number__left">Số lượng:</div>
                                        <div class="number__right">
                                            <div class="col c-4 quantity_down">
                                                <i class="fa-solid fa-minus" onclick="decrementQuantity(${index})"></i>
                                            </div>
                                            <div class="col c-4" style="background-color: #eee;">
                                                <input name="qty" type="text" class="qty" id="quantity-${index}" value="${product.quantity}">
                                            </div>
                                            <div class="col c-4 quantity_up">
                                                <i class="fa-solid fa-plus" onclick="incrementQuantity(${index})"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col c-7" style="display: flex;">
                                    <div class="price">
                                        Giá bán : <span id="price-${index}">${formatCurrency(product.giagiam)}đ</span>
                                    </div>
                                    <a href="" class="delete" onclick="deleteSP(${index})">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        `;
    });

    list_giohang.innerHTML = html_giohang.join(" ");

    // Làm tăng/giảm số lượng
    window.incrementQuantity = function (index) {
        const currentQuantity = cartProducts[index].quantity || 1;
        const newQuantity = currentQuantity + 1;
        updateQuantity(index, newQuantity);
    };

    window.decrementQuantity = function (index) {
        const currentQuantity = Math.max((cartProducts[index].quantity || 1) - 1, 1);
        updateQuantity(index, currentQuantity);
    };

    // Cập nhật tổng tiền khi trang được tải
    updateTotalPrice();

});

function deleteSP(index) {
    var userConfirmed = confirm('Bạn có chắc chắn muốn xóa sản phẩm khỏi giỏ hàng không?');

    if (userConfirmed) {
        cartProducts.splice(index, 1);

        localStorage.setItem('carts', JSON.stringify(cartProducts));

        // Cập nhật lại giao diện và tổng tiền
        updateTotalPrice();
        location.reload();
    } else {
        alert('Hủy bỏ xóa sản phẩm khỏi giỏ hàng');
    }
}

function confirmDelete() {
    var userConfirmed = confirm('Bạn có chắc chắn muốn xóa hết sản phẩm trong giỏ hàng không?');

    if (userConfirmed) {
        localStorage.removeItem('carts');
        alert('Đã xóa hết giỏ hàng');
        location.reload();
    } else {
        alert('Hủy bỏ xóa giỏ hàng');
    }
}

function DatHang() {
    var TenKH = document.getElementById("name").value;
    var SDT = document.getElementById("phone").value;
    var DiaChi = document.getElementById("address").value;
    var Email = document.getElementById("email").value;
    var number = /^[0-9]+$/;
    var atposition = Email.indexOf("@");
    var dotposition = Email.lastIndexOf(".");

    if (TenKH == null || TenKH == "") {
        alert("Tên khách hàng không được để trống! Vui lòng nhập lại!");
    }
    else if (SDT == null || SDT == "") {
        alert("Số điện thoại khách hàng không được để trống! Vui lòng nhập lại!");
    }
    else if (!SDT.match(number) || SDT.length != 10) {
        alert("Số điện thoại khách hàng phải là kiểu số và có độ dài là 10 ký tự! Vui lòng nhập lại!");
    }
    else if (DiaChi == null || DiaChi == "") {
        alert("Địa chỉ khách hàng không được để trống! Vui lòng nhập lại!");
    }
    else if (Email == null || Email == "") {
        alert("Email khách hàng không được để trống! Vui lòng nhập lại!");
    }
    else if ((atposition < 1 || dotposition < (atposition + 2) || (dotposition + 2) >= Email.length)) {
        alert("Email khách hàng không hợp lệ! Vui lòng nhập lại!");
    }
    else {
        alert("Đặt hàng thành công!");
        localStorage.removeItem('carts');
        window.location.href = './InHoaDonBan.html'
    }
}
