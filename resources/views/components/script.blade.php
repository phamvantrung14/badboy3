<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{asset("frontend/js/jquery-3.2.1.min.js")}}"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{asset("frontend/js/popper.min.js")}}"></script>
<script src="{{asset("frontend/js/bootstrap.min.js")}}"></script>
<!-- Rev slider js -->
<script src="{{asset("frontend/vendors/revolution/js/jquery.themepunch.tools.min.js")}}"></script>
<script src="{{asset("frontend/vendors/revolution/js/jquery.themepunch.revolution.min.js")}}"></script>
<script src="{{asset("frontend/vendors/revolution/js/extensions/revolution.extension.actions.min.js")}}"></script>
<script src="{{asset("frontend/vendors/revolution/js/extensions/revolution.extension.video.min.js")}}"></script>
<script src="{{asset("frontend/vendors/revolution/js/extensions/revolution.extension.slideanims.min.js")}}"></script>
<script src="{{asset("frontend/vendors/revolution/js/extensions/revolution.extension.layeranimation.min.js")}}"></script>
<script src="{{asset("frontend/vendors/revolution/js/extensions/revolution.extension.navigation.min.js")}}"></script>
<!-- Extra plugin js -->
<script src="{{asset("frontend/vendors/owl-carousel/owl.carousel.min.js")}}"></script>
<script src="{{asset("frontend/vendors/magnifc-popup/jquery.magnific-popup.min.js")}}"></script>
<script src="{{asset("frontend/vendors/datetime-picker/js/moment.min.js")}}"></script>
<script src="{{asset("frontend/vendors/datetime-picker/js/bootstrap-datetimepicker.min.js")}}"></script>
<script src="{{asset("frontend/vendors/nice-select/js/jquery.nice-select.min.js")}}"></script>
<script src="{{asset("frontend/vendors/jquery-ui/jquery-ui.min.js")}}"></script>
<script src="{{asset("frontend/vendors/lightbox/simpleLightbox.min.js")}}"></script>

<!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>


<script src="{{asset("frontend/js/theme.js")}}"></script>
@yield("script")
<script type="text/javascript">

        function addToCart(productId) {
            $.ajax({
                url: "{{url("cart/add")}}/" + productId,
            }).done(function (response) {
                $("body").empty();
                $("body").html(response);
                alertify.success('Đã Thêm Mới Sản Phẩm !!');
            })
        }
        function updateQuantity(productId) {

            var _qty = $("#qty"+productId).val();
            console.log(_qty);
            $.ajax({
                url: "{{url("cart/update")}}/"+productId,
                method:"GET",
                data:{
                    qty:_qty,
                }
            }).done(function (response) {
                console.log(response);
                $("body").empty();
                $("body").html(response);
                alertify.success('Cập Nhật Số Lượng Thành Công !!');

            })
        }
        function deleteOrder(productId) {
            // console.log(productId);
            $.ajax({
                url:"{{url("cart/remove")}}/"+productId,
                method:"GET",

            }).done(function (response) {
                console.log(response);
                $("body").empty();
                $("body").html(response);
                alertify.error('Xóa Thành Công !!');

            })
        }
        function clearAll() {
            $.ajax({
                url:"{{url("cart/clear")}}",
                method:"GET",
            }).done(function (response) {
                console.log(response);
                $("body").empty();
                $("body").html(response);
                alertify.error('Xóa Đơn Hàng Thành Công !!');

            })
        }
        function modalOrder(id) {
            $.ajax({
                url:"{{url("customer/chitiet-donmua")}}/"+id,
                method:"GET",
            }).done(function (response) {
                $(".modal-dialog .modal-content .modal-body").empty();
                $(".modal-dialog .modal-content .modal-body").html(response);
            })
        }

        function orderDangGiao(customer) {
            $.ajax({
                url:"{{url("customer/danggiao")}}/"+customer,
                method:"GET",
            }).done(function (response) {
                // console.log(response);
                $(".content-order-account .body1").empty();
                $(".content-order-account .body1").html(response);
            })
        }
        function orderLayHang(customer) {
            $.ajax({
                url:"{{url("customer/layhang")}}/"+customer,
                method:"GET",
            }).done(function (response) {
                $(".content-order-account .body1").empty();
                $(".content-order-account .body1").html(response);
            })
        }
        function orderDaHuy(customer) {
            // console.log(customer);
            $.ajax({
                url:"{{url("customer/dahuy")}}/"+customer,
                method:"GET",
            }).done(function (response) {
                $(".content-order-account .body1").empty();
                $(".content-order-account .body1").html(response);
            })
        }
        $(function () {
            $(".nav-donmua").click(function (event) {
                $(".menu-ul .nav-donmua").removeClass("active1");
                $(this).addClass("active1");

            })
        })
        $(function () {
            $(".nav-item").click(function (event) {
                $(".menu-ul .nav-item").removeClass("nav-item-a");
                $(this).addClass("nav-item-a");


            })
        })
        function serchProducts() {
            var _st =$("#keysearch").val();
            var _token = $("#token").val();
            console.log(_token);
            $.ajax({
                url:"{{url("/search-pd")}}",
                method:"GET",
                data:{
                    stk:_st,
                    _token:_token,
                    _method:"GET"
                }
            }).done(function (response) {
                $(".product_item_inner").empty();
                $(".product_item_inner").html(response);
            })
        }

</script>
