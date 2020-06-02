
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from designarc.biz/demos/cake/theme/cake-html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 01 Jun 2020 02:06:16 GMT -->
<head>
    <x-head/>
</head>
<body>

<!--================Main Header Area =================-->
<x-header/>
<!--================End Main Header Area =================-->

<!--================Slider Area =================-->
@yield("content")

<!--================Footer Area =================-->
<x-footer/>
<!--================End Footer Area =================-->


<!--================Search Box Area =================-->
<div class="search_area zoom-anim-dialog mfp-hide" id="test-search">
    <div class="search_box_inner">
        <h3>Search</h3>
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
                        <button class="btn btn-default" type="button"><i class="icon icon-Search"></i></button>
                    </span>
        </div>
    </div>
</div>
<!--================End Search Box Area =================-->





<x-script/>
</body>

<!-- Mirrored from designarc.biz/demos/cake/theme/cake-html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 01 Jun 2020 02:07:49 GMT -->
</html>
