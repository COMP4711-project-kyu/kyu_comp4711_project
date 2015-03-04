
<!--start slider -->
<link rel="stylesheet" href="assets/css/fwslider.css" media="all">
<script src="assets/js/jquery-ui.min.js"></script>
<script src="assets/js/fwslider.js"></script>
<!--end slider -->

<!-- start slider -->
<div id="fwslider">
    <div class="slider_container">
        <div class="slide"> 
            <!-- Slide image -->
            <img src="assets/images/slider1.jpg" class="img-responsive" alt=""/>
            <!-- /Slide image -->
            <!-- Texts container -->
            <div class="slide_content">
                <div class="slide_content_wrap">
                    <!-- Text title -->
                    <h1 class="title">Van Dragons</h1>
                    <!-- /Text title -->
                </div>
            </div>
            <!-- /Texts container -->
        </div>
        <!-- /Duplicate to create more slides -->
        <div class="slide">
            <img src="assets/images/slider2.jpg" class="img-responsive" alt=""/>
            <div class="slide_content">
                <div class="slide_content_wrap">
                    <h1 class="title">Van Dragons</h1>
                </div>
            </div>
        </div>
        <div class="slide">
            <img src="assets/images/slider3.jpg" class="img-responsive" alt=""/>
            <div class="slide_content">
                <div class="slide_content_wrap">
                    <h1 class="title">Van Dragons</h1>
                </div>
            </div>
        </div>
        <!--/slide -->
    </div>
    <div class="timers"></div>
    <div class="slidePrev"><span></span></div>
    <div class="slideNext"><span></span></div>
</div>
<!--/slider -->


<div class="main">
    <div class="shop_top">
        <div class="container">
            <div class="row">

                <div class="col-md-6 team_bottom">
                    <ul class="team_list">
                        <h4>Announcement</h4>
                        <li><a>Activity for Week</a>
                            <p>The weather forcast says it is going to rain the coming Saturday. We will be playing badminton at ~~gym instead. </p></li>


                        <h4>Updates</h4>
                        {updates}

                    </ul>
                </div>


                <div class="col-md-6">
                    <ul class="team_list">
                        <h4>Recent Pictures</h4>
                        <div class="row ex_box">
                            {img_row1}
                        </div>

                        <div class="row ex_box">
                            {img_row2}
                        </div>
                    </ul>
                    <div class="button1">
                        <a href="gallery"><input type="submit" name="Submit" value="See More"></a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</div>
