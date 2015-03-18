<?php
/*
 * cell for one image
 * on gallery page
 */
?>

<div class="col-md-4 team1">
    <div class="img_section magnifier2">
        <a class="fancybox" href="/assets/images/gallery/{album}/original/{path}" data-fancybox-group="gallery"><img src="/assets/images/gallery/{album}/{thumb_path}" class="img-responsive">
        </a>
      <form>
<input type="button" value="Delete" onclick="deleteImg('{album}','{path}')">
</form>  
    </div>
</div>