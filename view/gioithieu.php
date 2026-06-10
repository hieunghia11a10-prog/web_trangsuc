<h1 style="text-align:center;color:gold;margin-top:0;margin-bottom:20px; padding-top: 20px;">
GIỚI THIỆU VỀ TRANG SỨC
</h1>

<style>
/* Reset một vài thuộc tính cơ bản để banner có thể tràn viền */
body, html {
    margin: 0;
    padding: 0;
    overflow-x: hidden; /* Tránh thanh cuộn ngang */
}

/* CONTAINER - Giữ nội dung chữ gọn gàng, nhưng banner sẽ tràn ra ngoài */
.gioithieu {
    width: 100%; /* Chiều rộng full */
    margin-top: 40px;
    background: white;
    padding: 0; /* Bỏ padding mặc định để slider tràn viền */
    box-shadow: 0 0 10px #ccc;
    line-height: 1.6;
    font-family: sans-serif; /* Thêm font cơ bản cho đẹp */
}

/* Phần nội dung chữ bên dưới banner cần có padding lại */
.gioithieu-content {
    width: 90%;
    max-width: 1000px; /* Giới hạn chiều rộng tối đa cho nội dung chữ */
    margin: auto;
    padding: 30px;
}

/* SLIDER - Tràn viền (Full width) */
.slider {
    width: 100vw; /* Chiều rộng bằng 100% chiều rộng viewport */
    height: 80vh; /* Chiều cao chiếm 80% chiều cao màn hình (tùy chỉnh) */
    position: relative;
    overflow: hidden;
    margin-bottom: 20px;
    left: 50%;
    right: 50%;
    margin-left: -50vw;
    margin-right: -50vw;
}

.slide {
    width: 100%;
    height: 100%;
    position: absolute;
    opacity: 0;
    transition: opacity 0.8s ease-in-out; /* Chuyển cảnh mượt hơn, nhanh hơn tí */
    object-fit: cover; /* Quan trọng: Giúp ảnh không bị méo, tự cắt cúp */
}

.slide.active {
    opacity: 1;
}

/* BUTTON SLIDER */
.prev, .next {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background: rgba(0,0,0,0.3); /* Làm mờ nền nút hơn */
    color: white;
    border: none;
    padding: 15px 10px; /* Tăng kích thước vùng bấm */
    cursor: pointer;
    font-size: 24px;
    border-radius: 5px;
    z-index: 10; /* Đảm bảo nút luôn nằm trên */
    transition: background 0.3s;
}

.prev:hover, .next:hover {
    background: rgba(0,0,0,0.7); /* Đậm lên khi hover */
}

.prev { left: 20px; }
.next { right: 20px; }

/* CONTENT */
.gioithieu h2 {
    color: gold;
    margin-top: 25px;
    margin-bottom: 10px;
}

/* LIST */
.gioithieu ul {
    padding-left: 25px;
    margin-bottom: 15px;
}

.gioithieu li {
    margin: 8px 0;
}

/* Liên hệ */
.contact-info {
    background: #f9f9f9;
    padding: 20px;
    border-radius: 8px;
    border-left: 5px solid gold;
}
.l1, .l2, .l3, .l4{
    width: 50%;
    
}
.l2 img, .l3 img{
width: 100%;
height: 40%;
border-radius: 5px;
}
.row, .row1{
    display: flex;
    gap: 20px;
    align-items: center;
}
</style>

<div class="gioithieu">

<div class="slider">
    <img class="slide active" src="image/banner/banner5.jpg" alt="Banner Trang Sức 1">
    <img class="slide" src="image/banner/banner6.jpg" alt="Banner Trang Sức 2">
    <button class="prev">&#10094;</button> <button class="next">&#10095;</button>
</div>

<div class="gioithieu-content">
    <div class="row">
    <div class="l1">
    <h2>LUXURY JEWELRY</h2>
    <p>
    Chào mừng bạn đến với Luxury Jewelry, nơi những giá trị vĩnh cửu được kết tinh qua từng tuyệt tác trang sức cao cấp. Chúng tôi tự hào mang đến hành trình trải nghiệm đầy tâm huyết, từ khâu tuyển chọn những viên đá quý, kim cương đạt chuẩn quốc tế đến quy trình chế tác thủ công tinh xảo của những nghệ nhân lành nghề. Mỗi chiếc nhẫn, dây chuyền hay đôi bông tai tại Luxury Jewelry không chỉ đơn thuần là phụ kiện xa xỉ, mà còn là biểu tượng của tình yêu, sự thành đạt và gu thẩm mỹ độc bản. Với cam kết về chất lượng chính hãng từ các thương hiệu uy tín cùng dịch vụ hậu mãi tận tâm, chúng tôi khát khao được đồng hành cùng bạn trong việc tôn vinh vẻ đẹp kiêu sa và lưu giữ những khoảnh khắc hạnh phúc nhất trong cuộc đời.
    </p>
</div>
<div class="l2">
    <img src="image/banner/banner7.jpg" alt="">
</div>
</div>
 <div class="row1">
 <div class="l3">
    <img src="image/banner/banner8.jpg" alt="">
 </div>
 <div class="l4">
    <h2>HÀNH TRÌNH CỦA TRANG SỨC LUXURY JEWELRY</h2>
    <p>
    Tại Luxury Jewelry Store, chúng tôi tin rằng mỗi món trang sức không chỉ là phụ kiện xa xỉ từ vàng, bạc hay kim cương, mà còn là bản tuyên ngôn về phong cách và những giá trị cảm xúc vĩnh cửu. Hành trình từ Tâm huyết của chúng tôi bắt đầu từ những ý tưởng thiết kế độc bản, trải qua quy trình tuyển chọn nguyên liệu khắt khe đạt chuẩn quốc tế, và được hoàn thiện dưới bàn tay tài hoa của những nghệ nhân kim hoàn dày dặn kinh nghiệm. Từ những chiếc nhẫn cưới gắn kết tình yêu, những sợi dây chuyền tôn vinh nét kiêu sa, đến bông tai và vòng tay lấp lánh, mỗi sản phẩm đều phải vượt qua quy trình kiểm định nghiêm ngặt để đảm bảo độ tinh xảo tuyệt đối trước khi trao gửi đến tay khách hàng. Luxury Jewelry cam kết mang đến sự an tâm tuyệt đối với sản phẩm chính hãng, dịch vụ bảo hành uy tín và tâm thế luôn sẵn sàng đồng hành cùng quý khách trên hành trình khẳng định đẳng cấp và lưu giữ những khoảnh khắc hạnh phúc nhất trong cuộc đời.
    </p>
</div>
</div>
    <h2>CÁC LOẠI TRANG SỨC PHỔ BIẾN</h2>
    <p>Tại Luxury Jewelry, bạn có thể tìm thấy đầy đủ các dòng sản phẩm:</p>
    <ul>
    <li>Nhẫn (Ring): Từ nhẫn thời trang đến nhẫn cưới cao cấp.</li>
    <li>Dây chuyền (Necklace): Đa dạng thiết kế, từ thanh lịch đến cá tính.</li>
    <li>Bông tai (Earrings): Điểm nhấn hoàn hảo cho khuôn mặt.</li>
    <li>Vòng tay & Lắc tay (Bracelet): Tôn lên vẻ đẹp đôi tay.</li>
    </ul>

    <h2>VỀ CỬA HÀNG LUXURY JEWELRY</h2>
    <p>
    <b>Luxury Jewelry</b> tự hào là địa chỉ uy tín chuyên cung cấp các sản phẩm trang sức cao cấp, chính hãng từ các thương hiệu hàng đầu Việt Nam như PNJ, DOJI, SJC... Chúng tôi cam kết mang đến cho quý khách hàng những sản phẩm với chất lượng tuyệt hảo và thiết kế tinh xảo nhất.
    </p>

    <ul>
    <li>✔ 100% Sản phẩm chính hãng, đầy đủ giấy tờ kiểm định.</li>
    <li>✔ Mẫu mã đa dạng, cập nhật xu hướng mới nhất.</li>
    <li>✔ Giá cả cạnh tranh, nhiều chương trình ưu đãi hấp dẫn.</li>
    <li>✔ Dịch vụ tư vấn chuyên nghiệp, tận tâm.</li>
    <li>✔ Chế độ bảo hành và hậu mãi uy tín dài hạn.</li>
    </ul>



</div>

</div>

<script>
let slides = document.querySelectorAll(".slide");
let index = 0;
let slideInterval;

// Hàm hiển thị slide theo chỉ số i
function showSlide(i){
    // Reset chỉ số nếu vượt quá số lượng ảnh
    if (i >= slides.length) { index = 0; i = 0; }
    if (i < 0) { index = slides.length - 1; i = slides.length - 1; }

    slides.forEach(s => s.classList.remove("active"));
    slides[i].classList.add("active");
}

// Hàm chuyển sang slide tiếp theo
function nextSlide() {
    index++;
    showSlide(index);
}

// Hàm quay lại slide trước đó
function prevSlide() {
    index--;
    showSlide(index);
}

// Hàm bắt đầu auto chạy
function startSliding() {
    // THAY ĐỔI TỐC ĐỘ TẠI ĐÂY (ví dụ: 2000ms = 2 giây cho nhanh hơn)
    slideInterval = setInterval(nextSlide, 2000); 
}

// Hàm dừng auto chạy (khi người dùng click nút)
function stopSliding() {
    clearInterval(slideInterval);
}

// Khởi tạo slider
showSlide(index);
startSliding();

// Xử lý sự kiện nút next
document.querySelector(".next").onclick = ()=>{
    stopSliding(); // Dừng auto khi user click
    nextSlide();
    startSliding(); // Khởi động lại auto sau khi user click
}

// Xử lý sự kiện nút prev
document.querySelector(".prev").onclick = ()=>{
    stopSliding(); // Dừng auto khi user click
    prevSlide();
    startSliding(); // Khởi động lại auto sau khi user click
}

// Thêm tính năng: Pause khi di chuột vào slider, Play khi di chuột ra (tùy chọn)
// const sliderContainer = document.querySelector(".slider");
// sliderContainer.addEventListener('mouseover', stopSliding);
// sliderContainer.addEventListener('mouseout', startSliding);
</script>