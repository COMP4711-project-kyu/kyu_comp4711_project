
<div class="main">
    <div class="shop_top">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="map">
                        <iframe  width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2607.235016112319!2d-122.812231!3d49.1961011!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0xe68460e2819ce75d!2z44Ob44O844Oq44O844O744OR44O844Kv!5e0!3m2!1sja!2sca!4v1422435735150"></iframe>
                        <small><a href="http://goo.gl/2fL3kl" style="color:#666;text-align:left;font-size:12px"></a></small>
                    </div>
                </div>
                <div class="col-md-5">
                        <div class="admin">
                            Contact Information
                            <textarea id="info" name="info">{info}</textarea>
                        </div>
                    
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 contact">
                    <form method="post" action="/contact/confirm">
                        <div class="to">
                            Destination Email address
                            <input id="email" name="email" type="text" class="text" >
                            <div class="error">{error}</div>
                        </div>
                        <div class="text">
                            <div class="form-submit">
                                <input name="submit" type="submit" id="submit" value="Save"><br>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
