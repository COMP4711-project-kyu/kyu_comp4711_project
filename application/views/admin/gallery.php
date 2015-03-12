<!-- light-box -->
<script type="text/javascript" src="/assets/js/jquery.fancybox.js"></script>
<link rel="stylesheet" type="text/css" href="/assets/css/jquery.fancybox.css" media="screen" />
<script type="text/javascript">
    $(document).ready(function () {
        /*
         *  Simple image gallery. Uses default settings
         */

        $('.fancybox').fancybox();

    });
</script>
<div class="main">
    <div class="shop_top">
        <div class="container">
            <div class="row ex_box">
                <h3 class="m_2">Gallery</h3>
                <dl id="sample" class="dropdown">
                    <dt><a href="#"><span><h4>{album}</h4></span></a></dt>
                    <dd>
                        <ul>
                            <li><a href="/admin/gallery">All Pictures</a></li>
                            {album_link}
                        </ul>
                    </dd>
                </dl>
                {img_row1}
            </div>
            <div class="row ex_box">
                {img_row2}
            </div>
            <div class="row ex_box">
                {img_row3}
            </div>

            <div style="display: table;margin: 0 auto;">
                {left_arrow}
                {page} / {num_page}
                {right_arrow}                    
            </div>

            <div class="to">
                <h2>Upload new pictures</h2><br/>
                <form action="/admin/gallery/confirm" method="post" enctype="multipart/form-data">
                    Date<input type='date' name='date'/><br/><br/>
                    Images<input type="file" id="file" name="files[]" multiple="multiple" accept="image/*" /><br/>
                    <div class="error">{error}</div><br/>
                    <div class="form-submit">
                        <input name="submit" type="submit" id="submit" value="Save">
                    </div>

                </form>

            </div>

        </div>
    </div>

</div>


