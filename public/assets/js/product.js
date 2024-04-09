document.addEventListener("DOMContentLoaded", function() {
    // Lấy số lượng ban đầu từ trường nhập liệu
    var quantity = parseInt(document.querySelector(".product-quantity input.qty").value);
    var selectProduct = document.querySelector(".product-quantity input.qty");
    var tang =  document.querySelector(".quantity_up");
    var giam =  document.querySelector(".quantity_down");
  
    // Xử lý sự kiện khi nhấn nút giảm
    giam.addEventListener("click", function () {
      if (quantity > 1) {
        quantity -= 1;
      } else {
        quantity = 1;
      }
      selectProduct.value = quantity;
    });
  
    // Xử lý sự kiện khi nhấn nút tăng
    tang.addEventListener("click", function () {
      if (quantity < 100) {
        quantity += 1;
      } else {
        quantity = 100;
      }
      selectProduct.value = quantity;
    });
    

    // Lấy dữ liệu sản phẩm đã lưu từ local
    const storedProductData = localStorage.getItem('CTSP');

    if (storedProductData) {
      const productData = JSON.parse(storedProductData);
  
      // Hiển thị dữ liệu sản phẩm trên trang chi tiết
      document.querySelector('.img').src = productData.img;
      document.querySelector('.name_product').textContent = productData.title;
      document.querySelector('.gia_giam').textContent = productData.giagiam;
      document.querySelector('.gia').textContent = productData.gia;
  
      // Xóa dữ liệu đã lưu từ local
      localStorage.removeItem('CTSP');
    }
  });



