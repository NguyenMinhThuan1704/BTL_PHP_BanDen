//-------------- slide----------------------
var bannerWrapper = document.querySelector('.banner-top');
var bannerItems = document.querySelectorAll('.banner-item');
var numberOfItems = bannerItems.length;
// Index của slide đang hiển thị
var currentIndex = 0;

setInterval(function () {
    // Tăng index lên 1
    currentIndex = (currentIndex + 1) % numberOfItems;
    
    // Tính giá trị transform để lướt sang slide tiếp theo
    var transformValue = -currentIndex * 100 + '%';
    bannerWrapper.style.transform = 'translateX(' + transformValue + ')';
}, 5000);

//-------------------slider-new-product----------------
const rightbtn = document.querySelector('.btn-right')
const leftbtn = document.querySelector('.fa-angle-left')
const newproductlength = document.querySelector('.new__product-item').offsetWidth
const sildeWrapper = document.querySelector('.new__product-item-wrapper')

rightbtn.addEventListener("click", function(){
    sildeWrapper.scrollLeft += newproductlength
})

leftbtn.addEventListener("click", function(){
    sildeWrapper.scrollLeft -= newproductlength
})

// ------------- Tìm kiếm -----------------
const searchInput = document.querySelector('.pass');
  const searchIcon = document.querySelector('.search-icon');

  searchIcon.addEventListener('click', () => {
    const searchTerm = searchInput.value.trim().toLowerCase();

    // Lọc danh sách sản phẩm từ các mảng khác nhau
    const searchResults = filterProductsByTerm(searchTerm, denchums, denmamoptrans, denthas, dentuongs, denchuyendungs, densois, denleds, denngoaithats, dennangluongs, denphukiens, dentrungbays);

    // Lưu kết quả tìm kiếm vào local storage để sử dụng ở trang search
    localStorage.setItem('searchResults', JSON.stringify(searchResults));

    window.location.href = './search';
  });

  // Hàm lọc sản phẩm theo từ khóa tìm kiếm trong các danh sách
  function filterProductsByTerm(searchTerm, ...productLists) {
    // flatMap được sử dụng để duyệt qua mỗi danh sách sản phẩm trong productLists và trả về một mảng 1D chứa tất cả các sản phẩm thỏa mãn điều kiện.
    return productLists.flatMap(productList => {
       // filter được sử dụng để lọc các sản phẩm từ mỗi danh sách sản phẩm dựa trên điều kiện được đưa ra.
      return productList.filter(product => product.title.toLowerCase().includes(searchTerm));
      // Điều kiện lọc ở đây là product.title.toLowerCase().includes(searchTerm). 
      // Nó kiểm tra xem tên của sản phẩm (đã chuyển thành chữ thường để làm cho tìm kiếm không phân biệt chữ hoa và chữ thường) có chứa searchTerm hay không.
    });
  }

//-------------- Sản phẩm mới--------------
const denmois = [
    {
      img: './assets/img/New product/1.jpg',
      sale: '30%',
      title: 'Đèn ốp trần hiệu ứng ánh sáng hình ngôi sao mặt trăng D600mm DR-NC596',
      gia: '12,580,000đ',
      giagiam: '8,177,000đ'
    },
    {
        img: './assets/img/New product/2.jpg',
        sale: '30%',
        title: 'Đèn chùm thả trần phòng khách có hiệu ứng ánh sáng D900mm DR-NC1143/8',
        gia: '5,960,000đ',
        giagiam: '3,874,000đ'
    },
    {
        img: './assets/img/New product/3.jpg',
        sale: '30%',
        title: 'Đèn ốp trần hiệu ứng ánh sáng hình ngôi sao mặt trăng D600mm DR-NC596',
        gia: '9,280,000đ',
        giagiam: '6,032,000đ'
    },
    {
      img: './assets/img/New product/4.jpg',
      sale: '30%',
      title: 'Đèn thả trần pha lê 3 vòng trang trí phòng khách sang trọng DR-NB2176B',
      gia: '5,850,000đ',
      giagiam: '3,803,000đ'
    },
    {
        img: './assets/img/New product/5.jpg',
        sale: '30%',
        title: 'Đèn pha lê thả trần phòng khách vẽ họa tiết độc lạ D800mm DR-NB03B',
        gia: '46,600,000đ',
        giagiam: '32,620,000đ'
    },
    {
        img: './assets/img/New product/6.jpg',
        sale: '30%',
        title: 'Quạt trần cánh cụp cánh xòe bằng nhựa màu nâu có gắn đèn led DR-Q9315',
        gia: '4,540,000đ',
        giagiam: '3,178,000đ'
    },
    {
        img: './assets/img/New product/7.jpg',
        sale: '30%',
        title: 'Đèn tường led trang trí phòng ngủ hình chim đậu cành cây DC-VKT10A',
        gia: '6,990,000đ',
        giagiam: '4,893,000đ'
    },
    {
        img: './assets/img/New product/8.jpg',
        sale: '30%',
        title: 'Đèn chùm pha lê thả trần phòng khách 18 tay nến D1200mm HP-CFL3521',
        gia: '12,500,000đ',
        giagiam: '8,750,000đ'
    },
    {
        img: './assets/img/New product/9.jpg',
        sale: '30%',
        title: 'Đèn treo tường thân sơn vàng gắn phòng khách, phòng ngủ H340mm EC-V881',
        gia: '12,500,000đ',
        giagiam: '8,750,000đ'
    },
    {
        img: './assets/img/New product/10.jpg',
        sale: '30%',
        title: 'Đèn ốp trần trang trí phòng khách hiện đại cao cấp 1100x700mm EC-ML50',
        gia: '12,500,000đ',
        giagiam: '8,750,000đ'
    },
    {
        img: './assets/img/New product/11.jpg',
        sale: '30%',
        title: 'Đèn mâm ốp trần phòng khách tạo hiệu ứng ánh sáng trăng sao EC-ML51',
        gia: '12,500,000đ',
        giagiam: '8,750,000đ'
    },
    {
        img: './assets/img/New product/12.jpg',
        sale: '30%',
        title: 'Đèn chùm nhánh cây phòng khách, chung cư 15 bóng D1000mm PH-THCN293',
        gia: '12,500,000đ',
        giagiam: '8,750,000đ'
    }
  ]
  const list_denmoi = document.querySelector('.den_moi')
  const html_denmoi = denmois.map((denmoi)=> {
    return `
        <div class="new__product-item col l-3 m-4 c-6">
            <div class="new__product-img-wrapper">
                <a href="./index_product">
                    <img src="${denmoi.img}" alt="" class="new__product-img">
                </a>
            </div>

            <div class="sale-hot">
                <span>${denmoi.sale}</span>
            </div>

            <div class="product__title">
                <div class="product__title-name">
                    <a href="./index_product">${denmoi.title}</a>
                </div>
                <div class="product__title-price">
                    <ul class="price-list">
                        <li class="price-item">${denmoi.giagiam}</li>
                        <li class="price-item">${denmoi.gia}</li>
                    </ul>
                </div>
            </div>

            <div class="item-title-add">
                <a href="./giohang" class="item-title-link">Mua ngay</a>
            </div>
        </div>
    `
  })
  list_denmoi.innerHTML = html_denmoi.join(" ")

// ------------- Đèn chùm ------------------
// const denchums = [
//     {
//       img: './assets/img/Product/Đèn chùm/1.jpg',
//       sale: '30%',
//       title: 'Đèn chùm hiện đại trang trí phòng khách cao cấp D900mm DR-NC5613/8+4',
//       quantity: 1,
//       gia: '12580000',
//       giagiam: '8177000'
//     },
//     {
//         img: './assets/img/Product/Đèn chùm/2.jpg',
//         sale: '30%',
//         title: 'Đèn chùm sát trần thân sơn đen có 3 chế độ ánh sáng D950mm DR-NC02/10',
//         quantity: 1,
//         gia: '5960000',
//         giagiam: '3874000'
//     },
//     {
//         img: './assets/img/Product/Đèn chùm/3.jpg',
//         sale: '30%',
//         title: 'Đèn chùm thả trần phòng khách có hiệu ứng ánh sáng D1300mm DR-NC692',
//         quantity: 1,
//         gia: '9280000',
//         giagiam: '6032000'
//     },
//     {
//       img: './assets/img/Product/Đèn chùm/4.jpg',
//       sale: '30%',
//       title: 'Quạt trần đèn chùm phòng khách tân cổ điển, 5 cánh bằng gỗ DR-Q2490',
//       quantity: 1,
//       gia: '5850000',
//       giagiam: '3803000'
//     },
//     {
//         img: './assets/img/Product/Đèn chùm/5.jpg',
//         sale: '30%',
//         title: 'Đèn chùm pha lê thả trần phòng khách 12 tay nến D1200mm HP-CFL3524',
//         quantity: 1,
//         gia: '46600000',
//         giagiam: '32620000'
//     },
//     {
//         img: './assets/img/Product/Đèn chùm/6.jpg',
//         sale: '30%',
//         title: 'Đèn chùm phòng khách sát trần hiệu ứng ánh sáng D1100mm PH-TH8239',
//         quantity: 1,
//         gia: '4540000',
//         giagiam: '3178000'
//     },
//     {
//         img: './assets/img/Product/Đèn chùm/7.jpg',
//         sale: '30%',
//         title: 'Quạt trần có đèn led 6 cánh nhựa ABS giả vân gỗ cao cấp PH-QVifa64',
//         quantity: 1,
//         gia: '6990000',
//         giagiam: '4893000'
//     },
//     {
//         img: './assets/img/Product/Đèn chùm/8.jpg',
//         sale: '30%',
//         title: 'Đèn chùm cổ điển phong cách Châu Âu 15 tay chao vải D1040mm DC-9088T15',
//         quantity: 1,
//         gia: '12500000',
//         giagiam: '8750000'
//     },
//   ]
//   const list_denchum = document.querySelector('.den_chum')
//   const html_denchum = denchums.map((denchum, index)=> {
//     return `
//         <div class="col l-3 c-6 item-product-wrap">
//             <div class="new__product-img-wrapper item-product">
//                 <a href="#" class="product-img-link" data-index="${index}">
//                     <img src="${denchum.img}" alt="" class="new__product-img item-product-img">
//                 </a>
//             </div>

//             <div class="sale-hot sale">
//                 <span>${denchum.sale}</span>
//             </div>

//             <div class="product__title">
//                 <div class="product__title-name">
//                     <a href="" title="${denchum.title}">${denchum.title}</a>
//                 </div>
//                 <div class="product__title-price">
//                     <ul class="price-list">
//                         <li class="price-item">${denchum.giagiam}đ</li>
//                         <li class="price-item">${denchum.gia}đ</li>
//                     </ul>
//                 </div>
//             </div>

//             <div class="item-title-add">
//                 <a class="item-title-link">Mua ngay</a>
//             </div>
//         </div>
//     `
//   })
//   list_denchum.innerHTML = html_denchum.join(" ")

let carts = [];
// Lấy dữ liệu từ local storage (nếu có)
const storedProducts = localStorage.getItem('carts');
if (storedProducts) {
    // Chuyển đổi chuỗi JSON thành mảng
    carts = JSON.parse(storedProducts);
}

// Thêm vào giỏ hàng
list_denchum.addEventListener('click', (event) => {
    if (event.target.classList.contains('item-title-link')) {
        const selectedProductIndex = Array.from(list_denchum.children).indexOf(event.target.closest('.item-product-wrap'));
        const cart = denchums[selectedProductIndex];

        // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng hay chưa
        const isProductExist = carts.some(product => product.title === cart.title);

        if (isProductExist) {
            alert('Sản phẩm đã có trong giỏ hàng.');
        } else {
            carts.push(cart);

            localStorage.setItem('carts', JSON.stringify(carts));

            const isConfirmed = window.confirm('Sản phẩm đã được thêm vào giỏ hàng. Bạn có muốn chuyển đến trang giỏ hàng không?');

            if (isConfirmed) {
                window.location.href = './giohang';
            }
        }
    }
});

// Thêm sự kiện click cho từng ảnh sản phẩm
const productImages = document.querySelectorAll('.product-img-link');
productImages.forEach((image, index) => {
  image.addEventListener('click', (event) => {
    event.preventDefault();

    // Lưu dữ liệu sản phẩm được nhấp vào local
    localStorage.setItem('CTSP', JSON.stringify(denchums[index]));

    window.location.href = './index_product';
  });
});

// ------------- Đèn mâm ốp trần ------------------
const denmamoptrans = [
    {
      img: './assets/img/Product/Đèn mâm ốp trần/1.jpg',
      sale: '30%',
      title: 'Đèn ốp trần hiệu ứng ánh sáng hình ngôi sao mặt trăng D1100mm DR-NC853',
      gia: '12,580,000đ',
      giagiam: '8,177,000đ'
    },
    {
        img: './assets/img/Product/Đèn mâm ốp trần/2.jpg',
        sale: '30%',
        title: 'Đèn ốp trần led 3 chế độ ánh sáng trang trí phòng ngủ D500mm DR-C2317',
        gia: '5,960,000đ',
        giagiam: '3,874,000đ'
    },
    {
        img: './assets/img/Product/Đèn mâm ốp trần/3.jpg',
        sale: '30%',
        title: 'Đèn ốp trần led 3 màu trang trí phòng ngủ hiện đại 500x500mm EC-ML39',
        gia: '9,280,000đ',
        giagiam: '6,032,000đ'
    },
    {
      img: './assets/img/Product/Đèn mâm ốp trần/4.jpg',
      sale: '30%',
      title: 'Đèn ốp trần trang trí phòng khách hiện đại cao cấp 1100x700mm EC-ML49',
      gia: '5,850,000đ',
      giagiam: '3,803,000đ'
    },
    {
        img: './assets/img/Product/Đèn mâm ốp trần/5.jpg',
        sale: '30%',
        title: 'Đèn chùm ốp trần led 3 chế độ màu trang trí hiện đại D870mm SE-CLA748',
        gia: '46,600,000đ',
        giagiam: '32,620,000đ'
    },
    {
        img: './assets/img/Product/Đèn mâm ốp trần/6.jpg',
        sale: '30%',
        title: 'Đèn mâm pha lê ốp trần tròn trang trí gắn phòng khách D800mm DR-C1035B',
        gia: '4,540,000đ',
        giagiam: '3,178,000đ'
    },
    {
        img: './assets/img/Product/Đèn mâm ốp trần/7.jpg',
        sale: '30%',
        title: 'Đèn chùm ốp sát trần 8 bóng trang trí hiện đại 950x950mm DC-TTK112T4+4',
        gia: '6,990,000đ',
        giagiam: '4,893,000đ'
    },
    {
        img: './assets/img/Product/Đèn mâm ốp trần/8.jpg',
        sale: '30%',
        title: 'Đèn mâm ốp trần led hiện đại 8 cánh đính hạt pha lê D800mm PH-MO9052',
        gia: '12,500,000đ',
        giagiam: '8,750,000đ'
    },
  ]
  const list_denmamoptran = document.querySelector('.den_mam')
  const html_denmamoptran = denmamoptrans.map((denmamoptran)=> {
    return `
        <div class="col l-3 c-6 item-product-wrap">
            <div class="new__product-img-wrapper item-product">
                <a href="./index_product">
                    <img src="${denmamoptran.img}" alt="" class="new__product-img item-product-img">
                </a>
            </div>

            <div class="sale-hot sale">
                <span>${denmamoptran.sale}</span>
            </div>

            <div class="product__title">
                <div class="product__title-name">
                    <a href="" title="${denmamoptran.title}">${denmamoptran.title}</a>
                </div>
                <div class="product__title-price">
                    <ul class="price-list">
                        <li class="price-item">${denmamoptran.giagiam}</li>
                        <li class="price-item">${denmamoptran.gia}</li>
                    </ul>
                </div>
            </div>

            <div class="item-title-add">
                <a href="./giohang" class="item-title-link">Mua ngay</a>
            </div>
        </div>
    `
  })
  list_denmamoptran.innerHTML = html_denmamoptran.join(" ")

// ------------- Đèn thả------------------
const denthas = [
    {
      img: './assets/img/Product/Đèn thả/1.jpg',
      sale: '30%',
      title: 'Đèn Thả Pha Lê Sang Trọng Gắn Phòng Khách, Sảnh Khách Sạn DR-NB2011B',
      gia: '12,580,000đ',
      giagiam: '8,177,000đ'
    },
    {
        img: './assets/img/Product/Đèn thả/2.jpg',
        sale: '30%',
        title: 'Đèn Thả Thông Tầng Cầu Thang Hình Con Ong Làm Bằng Mica DR-NB2198/6',
        gia: '5,960,000đ',
        giagiam: '3,874,000đ'
    },
    {
        img: './assets/img/Product/Đèn thả/3.jpg',
        sale: '30%',
        title: 'Đèn Chùm Pha Lê Thả Trần Bàn Ăn, Phòng Khách Đẹp L850mm EC-CFL133',
        gia: '9,280,000đ',
        giagiam: '6,032,000đ'
    },
    {
      img: './assets/img/Product/Đèn thả/4.jpg',
      sale: '30%',
      title: 'Đèn Thả Trần Phòng Khách Hiện Đại Sang Trọng EC-T48/17',
      gia: '5,850,000đ',
      giagiam: '3,803,000đ'
    },
    {
        img: './assets/img/Product/Đèn thả/5.jpg',
        sale: '30%',
        title: 'Đèn Thả Thông Tầng 15 Con Bướm Led Treo Cầu Thang H2800mm VA-T9666/15',
        gia: '46,600,000đ',
        giagiam: '32,620,000đ'
    },
    {
        img: './assets/img/Product/Đèn thả/6.jpg',
        sale: '30%',
        title: 'Đèn Thả Trần Led Hiệu Ứng Trang Trí Bàn Ăn, Phòng Ngủ D200mm SE-TKD799',
        gia: '4,540,000đ',
        giagiam: '3,178,000đ'
    },
    {
        img: './assets/img/Product/Đèn thả/7.jpg',
        sale: '30%',
        title: 'Đèn Thả Pha Lê Phòng Khách Nhỏ, Bàn Ăn DR-B1012',
        gia: '6,990,000đ',
        giagiam: '4,893,000đ'
    },
    {
        img: './assets/img/Product/Đèn thả/8.jpg',
        sale: '30%',
        title: 'Đèn Thả Trần Bàn Ăn Có Đèn Chiếu Điểm HP-TL6535/3',
        gia: '12,500,000đ',
        giagiam: '8,750,000đ'
    },
  ]
  const list_dentha = document.querySelector('.den_tha')
  const html_dentha = denthas.map((dentha)=> {
    return `
        <div class="col l-3 c-6 item-product-wrap">
            <div class="new__product-img-wrapper item-product">
                <a href="./index_product">
                    <img src="${dentha.img}" alt="" class="new__product-img item-product-img">
                </a>
            </div>

            <div class="sale-hot sale">
                <span>${dentha.sale}</span>
            </div>

            <div class="product__title">
                <div class="product__title-name">
                    <a href="" title="${dentha.title}">${dentha.title}</a>
                </div>
                <div class="product__title-price">
                    <ul class="price-list">
                        <li class="price-item">${dentha.giagiam}</li>
                        <li class="price-item">${dentha.gia}</li>
                    </ul>
                </div>
            </div>

            <div class="item-title-add">
                <a href="./giohang" class="item-title-link">Mua ngay</a>
            </div>
        </div>
    `
  })
  list_dentha.innerHTML = html_dentha.join(" ")

// ------------- Đèn tường------------------
const dentuongs = [
    {
      img: './assets/img/Product/Đèn tường/1.jpg',
      sale: '30%',
      title: 'Đèn Treo Tường Phòng Khách Hiện Đại Hình Chim Công Nhìn Phải HP-V9278A',
      gia: '12,580,000đ',
      giagiam: '8,177,000đ'
    },
    {
        img: './assets/img/Product/Đèn tường/2.jpg',
        sale: '30%',
        title: 'Đèn Gắn Tường Trang Trí Phòng Khách, Phòng Ngủ Đẹp Hiện Đại DC-VK130T',
        gia: '5,960,000đ',
        giagiam: '3,874,000đ'
    },
    {
        img: './assets/img/Product/Đèn tường/3.jpg',
        sale: '30%',
        title: 'Đèn Gắn Tường Pha Lê Trang Trí Phòng Ngủ Hiện Đại Sang Trọng EC-V700',
        gia: '9,280,000đ',
        giagiam: '6,032,000đ'
    },
    {
      img: './assets/img/Product/Đèn tường/4.jpg',
      sale: '30%',
      title: 'Đèn Tường Pha Lê Trang Trí Phòng Khách Hiện Đại Cao Cấp PH-GT451-23',
      gia: '5,850,000đ',
      giagiam: '3,803,000đ'
    },
    {
        img: './assets/img/Product/Đèn tường/5.jpg',
        sale: '30%',
        title: 'Đèn Tranh Ốp Tường Hình Cá Chép Trang Trí Phòng Ngủ Hiện Đại SE-VLE118',
        gia: '46,600,000đ',
        giagiam: '32,620,000đ'
    },
    {
        img: './assets/img/Product/Đèn tường/6.jpg',
        sale: '30%',
        title: 'Đèn Ốp Tường Pha Lê Trang Trí Phòng Khách Hiện Đại Cao Cấp SE-VLE221',
        gia: '4,540,000đ',
        giagiam: '3,178,000đ'
    },
    {
        img: './assets/img/Product/Đèn tường/7.jpg',
        sale: '30%',
        title: 'Đèn Tường Đồng H430mm HP-VD6202',
        gia: '6,990,000đ',
        giagiam: '4,893,000đ'
    },
    {
        img: './assets/img/Product/Đèn tường/8.jpg',
        sale: '30%',
        title: 'Đèn Gắn Tường Hiện Đại Trang Trí Trong Nhà Hình Con Bướm HP-VL4656',
        gia: '12,500,000đ',
        giagiam: '8,750,000đ'
    },
  ]
  const list_dentuong = document.querySelector('.den_tuong')
  const html_dentuong = dentuongs.map((dentuong)=> {
    return `
        <div class="col l-3 c-6 item-product-wrap">
            <div class="new__product-img-wrapper item-product">
                <a href="./index_product">
                    <img src="${dentuong.img}" alt="" class="new__product-img item-product-img">
                </a>
            </div>

            <div class="sale-hot sale">
                <span>${dentuong.sale}</span>
            </div>

            <div class="product__title">
                <div class="product__title-name">
                    <a href="" title="${dentuong.title}">${dentuong.title}</a>
                </div>
                <div class="product__title-price">
                    <ul class="price-list">
                        <li class="price-item">${dentuong.giagiam}</li>
                        <li class="price-item">${dentuong.gia}</li>
                    </ul>
                </div>
            </div>

            <div class="item-title-add">
                <a href="./giohang" class="item-title-link">Mua ngay</a>
            </div>
        </div>
    `
  })
  list_dentuong.innerHTML = html_dentuong.join(" ")

// ------------- Đèn chuyên dụng------------------
const denchuyendungs = [
    {
      img: './assets/img/Product/Đèn chuyên dụng/1.jpg',
      sale: '30%',
      title: 'Đèn Pha Led Bảng Hiệu Ngoài Trời Chống Nước Cao Cấp IP65 70W HP-FA46',
      gia: '12,580,000đ',
      giagiam: '8,177,000đ'
    },
    {
        img: './assets/img/Product/Đèn chuyên dụng/2.jpg',
        sale: '30%',
        title: 'Đèn Để Bàn Trang Trí Phòng Ngủ Và Khách Sạn Đẹp Sang Trọng HP-DB1919',
        gia: '5,960,000đ',
        giagiam: '3,874,000đ'
    },
    {
        img: './assets/img/Product/Đèn chuyên dụng/3.jpg',
        sale: '30%',
        title: 'Đèn Led Rọi Ray 10W Chiếu Shop Quần Áo, Sản Phẩm Trưng Bày HP-SL211',
        gia: '9,280,000đ',
        giagiam: '6,032,000đ'
    },
    {
      img: './assets/img/Product/Đèn chuyên dụng/4.jpg',
      sale: '30%',
      title: 'Đèn Cây Đứng Trang Trí Góc Sofa Phòng Khách, Phòng Ngủ Đẹp DC-DD15',
      gia: '5,850,000đ',
      giagiam: '3,803,000đ'
    },
    {
        img: './assets/img/Product/Đèn chuyên dụng/5.jpg',
        sale: '30%',
        title: 'Đèn Cây Đứng Trang Trí Góc Sofa Phòng Khách, Phòng Ngủ DC-DD33T12',
        gia: '46,600,000đ',
        giagiam: '32,620,000đ'
    },
    {
        img: './assets/img/Product/Đèn chuyên dụng/6.jpg',
        sale: '30%',
        title: 'Đèn Led Rọi Thanh Ray 7W Làm Nổi Bật Sản Phẩm Shop, Cửa Hàng AN-PR101',
        gia: '4,540,000đ',
        giagiam: '3,178,000đ'
    },
    {
        img: './assets/img/Product/Đèn chuyên dụng/7.jpg',
        sale: '30%',
        title: 'Đèn Đọc Sách Để Bàn Làm Việc, Bàn Học Kiểu Dáng Sang Trọng PH-DB503-19',
        gia: '6,990,000đ',
        giagiam: '4,893,000đ'
    },
    {
        img: './assets/img/Product/Đèn chuyên dụng/8.jpg',
        sale: '30%',
        title: 'Đèn Bàn Phòng Làm Việc, Bàn Đọc Sách, Bàn Học Sinh Led 6W EC-BL1328',
        gia: '12,500,000đ',
        giagiam: '8,750,000đ'
    },
  ]
  const list_denchuyendung = document.querySelector('.den_chuyen_dung')
  const html_denchuyendung = denchuyendungs.map((denchuyendung)=> {
    return `
        <div class="col l-3 c-6 item-product-wrap">
            <div class="new__product-img-wrapper item-product">
                <a href="./index_product">
                    <img src="${denchuyendung.img}" alt="" class="new__product-img item-product-img">
                </a>
            </div>

            <div class="sale-hot sale">
                <span>${denchuyendung.sale}</span>
            </div>

            <div class="product__title">
                <div class="product__title-name">
                    <a href="" title="${denchuyendung.title}">${denchuyendung.title}</a>
                </div>
                <div class="product__title-price">
                    <ul class="price-list">
                        <li class="price-item">${denchuyendung.giagiam}</li>
                        <li class="price-item">${denchuyendung.gia}</li>
                    </ul>
                </div>
            </div>

            <div class="item-title-add">
                <a href="./giohang" class="item-title-link">Mua ngay</a>
            </div>
        </div>
    `
  })
  list_denchuyendung.innerHTML = html_denchuyendung.join(" ")

// ------------- Đèn soi tranh gương------------------
const densois = [
    {
      img: './assets/img/Product/Đèn soi tranh - gương/1.jpg',
      sale: '30%',
      title: 'Đèn Soi Gương Gắn Tường Sơn Đen 3 Chế Độ Chiếu Ánh Sáng DC-RT5834T600',
      gia: '12,580,000đ',
      giagiam: '8,177,000đ'
    },
    {
        img: './assets/img/Product/Đèn soi tranh - gương/2.jpg',
        sale: '30%',
        title: 'Đèn Soi Tranh 1 Bóng HP-SG2214/1',
        gia: '5,960,000đ',
        giagiam: '3,874,000đ'
    },
    {
        img: './assets/img/Product/Đèn soi tranh - gương/3.jpg',
        sale: '30%',
        title: 'Đèn Soi Tranh 2 Bóng HP-SG2225/2',
        gia: '9,280,000đ',
        giagiam: '6,032,000đ'
    },
    {
      img: './assets/img/Product/Đèn soi tranh - gương/4.jpg',
      sale: '30%',
      title: 'Đèn Soi Tranh 3 Bóng HP-SG2201/3',
      gia: '5,850,000đ',
      giagiam: '3,803,000đ'
    },
    {
        img: './assets/img/Product/Đèn soi tranh - gương/5.jpg',
        sale: '30%',
        title: 'Đèn Soi Gương Lavabo Nhà Tắm DC-RT5677/58NAU',
        gia: '46,600,000đ',
        giagiam: '32,620,000đ'
    },
    {
        img: './assets/img/Product/Đèn soi tranh - gương/6.jpg',
        sale: '30%',
        title: 'Đèn Rọi Gương Nhà Tắm Rẻ, Đẹp DC-RT5543/58',
        gia: '4,540,000đ',
        giagiam: '3,178,000đ'
    },
    {
        img: './assets/img/Product/Đèn soi tranh - gương/7.jpg',
        sale: '30%',
        title: 'Đèn Rọi Gương, Soi Tranh Giá Rẻ DC-RT5533/42NAU',
        gia: '6,990,000đ',
        giagiam: '4,893,000đ'
    },
    {
        img: './assets/img/Product/Đèn soi tranh - gương/8.jpg',
        sale: '30%',
        title: 'Đèn Rọi Gương Led L550mm PH-RG773',
        gia: '12,500,000đ',
        giagiam: '8,750,000đ'
    },
  ]
  const list_densoi = document.querySelector('.den_soi')
  const html_densoi = densois.map((densoi)=> {
    return `
        <div class="col l-3 c-6 item-product-wrap">
            <div class="new__product-img-wrapper item-product">
                <a href="./index_product">
                    <img src="${densoi.img}" alt="" class="new__product-img item-product-img">
                </a>
            </div>

            <div class="sale-hot sale">
                <span>${densoi.sale}</span>
            </div>

            <div class="product__title">
                <div class="product__title-name">
                    <a href="" title="${densoi.title}">${densoi.title}</a>
                </div>
                <div class="product__title-price">
                    <ul class="price-list">
                        <li class="price-item">${densoi.giagiam}</li>
                        <li class="price-item">${densoi.gia}</li>
                    </ul>
                </div>
            </div>

            <div class="item-title-add">
                <a href="./giohang" class="item-title-link">Mua ngay</a>
            </div>
        </div>
    `
  })
  list_densoi.innerHTML = html_densoi.join(" ")

// ------------- Đèn led------------------
const denleds = [
    {
      img: './assets/img/Product/Đèn led/1.jpg',
      sale: '30%',
      title: 'Đèn Led Âm Trần 7W, Ánh Sáng 3 Chế Độ Màu, Khoét Lỗ D105mm HP-AKCOB07',
      gia: '12,580,000đ',
      giagiam: '8,177,000đ'
    },
    {
        img: './assets/img/Product/Đèn led/2.jpg',
        sale: '30%',
        title: 'Đèn Led Âm Trần Downlight 7W, Ánh Sáng 3 Màu, Khoét Lỗ D85mm HP-AT110',
        gia: '5,960,000đ',
        giagiam: '3,874,000đ'
    },
    {
        img: './assets/img/Product/Đèn led/3.jpg',
        sale: '30%',
        title: 'Đèn Led Âm Trần Downlight 9W, Ánh Sáng 3 Màu, Khoét Lỗ D130mm HP-AT80',
        gia: '9,280,000đ',
        giagiam: '6,032,000đ'
    },
    {
      img: './assets/img/Product/Đèn led/4.jpg',
      sale: '30%',
      title: 'Đèn Led Âm Trần Downlight 12W, Ánh Sáng 3 Màu, Khoét Lỗ D150mm HP-AT85',
      gia: '5,850,000đ',
      giagiam: '3,803,000đ'
    },
    {
        img: './assets/img/Product/Đèn led/5.jpg',
        sale: '30%',
        title: 'Đèn Led Gắn Nổi 12W Góc Xoay 90 Độ, Ánh Sáng Đơn D100xH105mm EC-LN71',
        gia: '46,600,000đ',
        giagiam: '32,620,000đ'
    },
    {
        img: './assets/img/Product/Đèn led/6.jpg',
        sale: '30%',
        title: 'Đèn Led Gắn Nổi 10W Chip Led USA, Trắng - Vàng, D105xH100mm HP-LN27',
        gia: '4,540,000đ',
        giagiam: '3,178,000đ'
    },
    {
        img: './assets/img/Product/Đèn led/7.jpg',
        sale: '30%',
        title: 'Máng Led Dẹp 36W 1.2m HP-MANGDEP/36W',
        gia: '6,990,000đ',
        giagiam: '4,893,000đ'
    },
    {
        img: './assets/img/Product/Đèn led/8.jpg',
        sale: '30%',
        title: 'Máng Đèn Tuýp Đơn T8 1m2 HP-MANGT8',
        gia: '12,500,000đ',
        giagiam: '8,750,000đ'
    },
  ]
  const list_denled = document.querySelector('.den_led')
  const html_denled = denleds.map((denled)=> {
    return `
        <div class="col l-3 c-6 item-product-wrap">
            <div class="new__product-img-wrapper item-product">
                <a href="./index_product">
                    <img src="${denled.img}" alt="" class="new__product-img item-product-img">
                </a>
            </div>

            <div class="sale-hot sale">
                <span>${denled.sale}</span>
            </div>

            <div class="product__title">
                <div class="product__title-name">
                    <a href="" title="${denled.title}">${denled.title}</a>
                </div>
                <div class="product__title-price">
                    <ul class="price-list">
                        <li class="price-item">${denled.giagiam}</li>
                        <li class="price-item">${denled.gia}</li>
                    </ul>
                </div>
            </div>

            <div class="item-title-add">
                <a href="./giohang" class="item-title-link">Mua ngay</a>
            </div>
        </div>
    `
  })
  list_denled.innerHTML = html_denled.join(" ")

// ------------- Đèn ngoại thất------------------
const denngoaithats = [
    {
      img: './assets/img/Product/Đèn ngoại thất/1.jpg',
      sale: '30%',
      title: 'Đèn Tường Ngoài Trời Trang Trí Hàng Rào, Trụ Cổng Cao Cấp AN-VC1290A',
      gia: '12,580,000đ',
      giagiam: '8,177,000đ'
    },
    {
        img: './assets/img/Product/Đèn ngoại thất/2.jpg',
        sale: '30%',
        title: 'Đèn Hắt Tường Led 8 Đầu Dùng Cho Trong Nhà Và Mái Hiên IP54 PH-VNT6013',
        gia: '5,960,000đ',
        giagiam: '3,874,000đ'
    },
    {
        img: './assets/img/Product/Đèn ngoại thất/3.jpg',
        sale: '30%',
        title: 'Đèn Hắt Tường Led 2 Đầu Sử Dụng Trong Nhà Và Ngoài Trời IP65 EC-CN305',
        gia: '9,280,000đ',
        giagiam: '6,032,000đ'
    },
    {
      img: './assets/img/Product/Đèn ngoại thất/4.jpg',
      sale: '30%',
      title: 'Đèn Trụ Cổng Gắn Sân Vườn Ngoài Trời Phong Cách Hiện Đại HP-LG0857',
      gia: '5,850,000đ',
      giagiam: '3,803,000đ'
    },
    {
        img: './assets/img/Product/Đèn ngoại thất/5.jpg',
        sale: '30%',
        title: 'Đèn Trụ Đồng H400mm PH-TD24/400',
        gia: '46,600,000đ',
        giagiam: '32,620,000đ'
    },
    {
        img: './assets/img/Product/Đèn ngoại thất/6.jpg',
        sale: '30%',
        title: 'Đèn Trụ Sân Vườn H270=>590mm PH-SVNT06',
        gia: '4,540,000đ',
        giagiam: '3,178,000đ'
    },
    {
        img: './assets/img/Product/Đèn ngoại thất/7.jpg',
        sale: '30%',
        title: 'Đèn Trụ Sân Vườn 2 Bóng Chiếu Cảnh Quan Ngoài Trời H4570mm TT-3516/2',
        gia: '6,990,000đ',
        giagiam: '4,893,000đ'
    },
    {
        img: './assets/img/Product/Đèn ngoại thất/8.jpg',
        sale: '30%',
        title: 'Đèn Gắn Tường Đồng Ngoài Trời Nguyên Chất Chống Nước H770mm DR-NV0621',
        gia: '12,500,000đ',
        giagiam: '8,750,000đ'
    },
  ]
  const list_denngoaithat = document.querySelector('.den_ngoai_that')
  const html_denngoaithat = denngoaithats.map((denngoaithat)=> {
    return `
        <div class="col l-3 c-6 item-product-wrap">
            <div class="new__product-img-wrapper item-product">
                <a href="./index_product">
                    <img src="${denngoaithat.img}" alt="" class="new__product-img item-product-img">
                </a>
            </div>

            <div class="sale-hot sale">
                <span>${denngoaithat.sale}</span>
            </div>

            <div class="product__title">
                <div class="product__title-name">
                    <a href="" title="${denngoaithat.title}">${denngoaithat.title}</a>
                </div>
                <div class="product__title-price">
                    <ul class="price-list">
                        <li class="price-item">${denngoaithat.giagiam}</li>
                        <li class="price-item">${denngoaithat.gia}</li>
                    </ul>
                </div>
            </div>

            <div class="item-title-add">
                <a href="./giohang" class="item-title-link">Mua ngay</a>
            </div>
        </div>
    `
  })
  list_denngoaithat.innerHTML = html_denngoaithat.join(" ")

// ------------- Đèn năng lượng mặt trời------------------
const dennangluongs = [
    {
      img: './assets/img/Product/Đèn năng lượng mặt trời/1.jpg',
      sale: '30%',
      title: 'Đèn Trụ Sân Vườn Năng Lượng Mặt Trời 300W EC-TRU157',
      gia: '12,580,000đ',
      giagiam: '8,177,000đ'
    },
    {
        img: './assets/img/Product/Đèn năng lượng mặt trời/2.jpg',
        sale: '30%',
        title: 'Đèn Trụ Năng Lượng Mặt Trời H310mm HP-TĐ2109',
        gia: '5,960,000đ',
        giagiam: '3,874,000đ'
    },
    {
        img: './assets/img/Product/Đèn năng lượng mặt trời/3.jpg',
        sale: '30%',
        title: 'Đèn Trụ Năng Lượng Mặt Trời Ø145mm EC-Solar228',
        gia: '9,280,000đ',
        giagiam: '6,032,000đ'
    },
    {
      img: './assets/img/Product/Đèn năng lượng mặt trời/4.jpg',
      sale: '30%',
      title: 'Đèn Trụ Năng Lượng Mặt Trời EC-Solar36',
      gia: '5,850,000đ',
      giagiam: '3,803,000đ'
    },
    {
        img: './assets/img/Product/Đèn năng lượng mặt trời/5.jpg',
        sale: '30%',
        title: 'Đèn Treo Tường Năng Lượng Mặt Trời Gắn Thêm Bóng Điện H450mm HP-VNL01',
        gia: '46,600,000đ',
        giagiam: '32,620,000đ'
    },
    {
        img: './assets/img/Product/Đèn năng lượng mặt trời/6.jpg',
        sale: '30%',
        title: 'Đèn Tường Năng Lượng Mặt Trời Gắn Thêm Bóng Điện H500mm PH-TD21-20VÀNG',
        gia: '4,540,000đ',
        giagiam: '3,178,000đ'
    },
    {
        img: './assets/img/Product/Đèn năng lượng mặt trời/7.jpg',
        sale: '30%',
        title: 'Đèn Tường Năng Lượng Mặt Trời Gắn Thêm Bóng Điện H500mm PH-TD22-20ĐEN',
        gia: '6,990,000đ',
        giagiam: '4,893,000đ'
    },
    {
        img: './assets/img/Product/Đèn năng lượng mặt trời/8.jpg',
        sale: '30%',
        title: 'Đèn Trụ Cổng Năng Lượng Mặt Trời 3 Kích Thước D150-210-260mm PH-TD07',
        gia: '12,500,000đ',
        giagiam: '8,750,000đ'
    },
  ]
  const list_dennangluong = document.querySelector('.den_nang_luong')
  const html_dennangluong = dennangluongs.map((dennangluong)=> {
    return `
        <div class="col l-3 c-6 item-product-wrap">
            <div class="new__product-img-wrapper item-product">
                <a href="./index_product">
                    <img src="${dennangluong.img}" alt="" class="new__product-img item-product-img">
                </a>
            </div>

            <div class="sale-hot sale">
                <span>${dennangluong.sale}</span>
            </div>

            <div class="product__title">
                <div class="product__title-name">
                    <a href="" title="${dennangluong.title}">${dennangluong.title}</a>
                </div>
                <div class="product__title-price">
                    <ul class="price-list">
                        <li class="price-item">${dennangluong.giagiam}</li>
                        <li class="price-item">${dennangluong.gia}</li>
                    </ul>
                </div>
            </div>

            <div class="item-title-add">
                <a href="./giohang" class="item-title-link">Mua ngay</a>
            </div>
        </div>
    `
  })
  list_dennangluong.innerHTML = html_dennangluong.join(" ")

// ------------- Đèn và phụ kiện------------------
const denphukiens = [
    {
      img: './assets/img/Product/Bóng đèn và phụ kiện/1.jpg',
      sale: '30%',
      title: 'Dây Thả Dù Màu Vàng Đui Đèn Edison E27 Có Đế Gắn Trần Dài 1m2',
      gia: '12,580,000đ',
      giagiam: '8,177,000đ'
    },
    {
        img: './assets/img/Product/Bóng đèn và phụ kiện/2.jpg',
        sale: '30%',
        title: 'Bóng Đèn Led Bông Edison Hình Bí Ngô Lớn VA-G150-BĐ',
        gia: '5,960,000đ',
        giagiam: '3,874,000đ'
    },
    {
        img: './assets/img/Product/Bóng đèn và phụ kiện/3.jpg',
        sale: '30%',
        title: 'Dây Thả Đui Đèn E27 Có Đế Gắn Trần Dây Dài 1m2',
        gia: '9,280,000đ',
        giagiam: '6,032,000đ'
    },
    {
      img: './assets/img/Product/Bóng đèn và phụ kiện/4.jpg',
      sale: '30%',
      title: 'Dây Thả Dù Màu Vàng Cuộn 100m',
      gia: '5,850,000đ',
      giagiam: '3,803,000đ'
    },
    {
        img: './assets/img/Product/Bóng đèn và phụ kiện/5.jpg',
        sale: '30%',
        title: 'Bóng Bắp LED 6+6W 3 Chế Độ Ánh Sáng',
        gia: '46,600,000đ',
        giagiam: '32,620,000đ'
    },
    {
        img: './assets/img/Product/Bóng đèn và phụ kiện/6.jpg',
        sale: '30%',
        title: 'Bóng Đèn LED Edison G45 Công Suất 4w',
        gia: '4,540,000đ',
        giagiam: '3,178,000đ'
    },
    {
        img: './assets/img/Product/Bóng đèn và phụ kiện/7.jpg',
        sale: '30%',
        title: 'Bóng Đèn LED Edison G125/6w PH-B256',
        gia: '6,990,000đ',
        giagiam: '4,893,000đ'
    },
    {
        img: './assets/img/Product/Bóng đèn và phụ kiện/8.jpg',
        sale: '30%',
        title: 'Bóng Đèn Trụ LED 80W IC Tốt Tải Nhiệt Nhôm HP-BN12',
        gia: '12,500,000đ',
        giagiam: '8,750,000đ'
    },
  ]
  const list_denphukien = document.querySelector('.den_phu_kien')
  const html_denphukien = denphukiens.map((denphukien)=> {
    return `
        <div class="col l-3 c-6 item-product-wrap">
            <div class="new__product-img-wrapper item-product">
                <a href="./index_product">
                    <img src="${denphukien.img}" alt="" class="new__product-img item-product-img">
                </a>
            </div>

            <div class="sale-hot sale">
                <span>${denphukien.sale}</span>
            </div>

            <div class="product__title">
                <div class="product__title-name">
                    <a href="" title="${denphukien.title}">${denphukien.title}</a>
                </div>
                <div class="product__title-price">
                    <ul class="price-list">
                        <li class="price-item">${denphukien.giagiam}</li>
                        <li class="price-item">${denphukien.gia}</li>
                    </ul>
                </div>
            </div>

            <div class="item-title-add">
                <a href="./giohang" class="item-title-link">Mua ngay</a>
            </div>
        </div>
    `
  })
  list_denphukien.innerHTML = html_denphukien.join(" ")

// ------------- Đèn trừng bày thanh lý------------------
const dentrungbays = [
    {
      img: './assets/img/Product/Đèn trưng bày thanh lý/1.jpg',
      sale: '30%',
      title: 'Đèn Chùm Led Phòng Khách, Chung Cư 12 Tay D680mm EC-C2097/12 - Trưng Bày',
      gia: '12,580,000đ',
      giagiam: '8,177,000đ'
    },
    {
        img: './assets/img/Product/Đèn trưng bày thanh lý/2.jpg',
        sale: '30%',
        title: 'Đèn Thả Trần Trang Trí Phòng Khách HP-TL6384 - Trưng Bày',
        gia: '5,960,000đ',
        giagiam: '3,874,000đ'
    },
    {
        img: './assets/img/Product/Đèn trưng bày thanh lý/3.jpg',
        sale: '30%',
        title: 'Đèn Chùm Phòng Khách Cổ Điển HP-CN622/8 - Trưng Bày',
        gia: '9,280,000đ',
        giagiam: '6,032,000đ'
    },
    {
      img: './assets/img/Product/Đèn trưng bày thanh lý/4.jpg',
      sale: '30%',
      title: 'Đèn Pha Lê Thả Trần Phòng Khách PH-TH8040 - Trưng Bày',
      gia: '5,850,000đ',
      giagiam: '3,803,000đ'
    },
    {
        img: './assets/img/Product/Đèn trưng bày thanh lý/5.jpg',
        sale: '30%',
        title: 'Đèn Mâm Pha Lê Ốp Trần Ø800mm DR-C9112B -Trưng Bày',
        gia: '46,600,000đ',
        giagiam: '32,620,000đ'
    },
    {
        img: './assets/img/Product/Đèn trưng bày thanh lý/6.jpg',
        sale: '30%',
        title: 'Đèn Thả Led L1200mm HP-TL224/16-Trưng Bày',
        gia: '4,540,000đ',
        giagiam: '3,178,000đ'
    },
    {
        img: './assets/img/Product/Đèn trưng bày thanh lý/7.jpg',
        sale: '30%',
        title: 'Đèn Thả Pha Lê Ø560mm AN22-CPL2009 - Trưng Bày',
        gia: '6,990,000đ',
        giagiam: '4,893,000đ'
    },
    {
        img: './assets/img/Product/Đèn trưng bày thanh lý/8.jpg',
        sale: '30%',
        title: 'Đèn Pha Lê Thả Trần Phòng Khách PH-TH8193 - Trưng Bày',
        gia: '12,500,000đ',
        giagiam: '8,750,000đ'
    },
  ]
  const list_dentrungbay = document.querySelector('.den_thanh_ly')
  const html_dentrungbay = dentrungbays.map((dentrungbay)=> {
    return `
        <div class="col l-3 c-6 item-product-wrap">
            <div class="new__product-img-wrapper item-product">
                <a href="./index_product">
                    <img src="${dentrungbay.img}" alt="" class="new__product-img item-product-img">
                </a>
            </div>

            <div class="sale-hot sale">
                <span>${dentrungbay.sale}</span>
            </div>

            <div class="product__title">
                <div class="product__title-name">
                    <a href="" title="${dentrungbay.title}">${dentrungbay.title}</a>
                </div>
                <div class="product__title-price">
                    <ul class="price-list">
                        <li class="price-item">${dentrungbay.giagiam}</li>
                        <li class="price-item">${dentrungbay.gia}</li>
                    </ul>
                </div>
            </div>

            <div class="item-title-add">
                <a href="./giohang" class="item-title-link">Mua ngay</a>
            </div>
        </div>
    `
  })
  list_dentrungbay.innerHTML = html_dentrungbay.join(" ")