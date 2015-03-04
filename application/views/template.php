<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
    <head>
        <title>{pagetitle}</title>
        <link href="assets/css/bootstrap.css" rel='stylesheet' type='text/css' />
        <link href="assets/css/style.css" rel='stylesheet' type='text/css' />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <script src="assets/js/jquery.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $(".dropdown img.flag").addClass("flagvisibility");

                $(".dropdown dt a").click(function () {
                    $(".dropdown dd ul").toggle();
                });

                $(".dropdown dd ul li a").click(function () {
                    var text = $(this).html();
                    $(".dropdown dt a span h4").html(text);
                    $(".dropdown dd ul").hide();
                    $("#result").html("Selected value is: " + getSelectedValue("sample"));
                });

                function getSelectedValue(id) {
                    return $("#" + id).find("dt a span.value").html();
                }

                $(document).bind('click', function (e) {
                    var $clicked = $(e.target);
                    if (!$clicked.parents().hasClass("dropdown"))
                        $(".dropdown dd ul").hide();
                });


                $("#flagSwitcher").click(function () {
                    $(".dropdown img.flag").toggleClass("flagvisibility");
                });

            });
        </script>
    </head>
    <body>
        <div class="header" style="background:{role_color}">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="header-left">
                            <!--<div class="logo">
                                   <a href="/"><img src="images/logo.png" alt=""/></a>
                            </div>-->
                            <div class="menu">
                                <a class="toggleMenu" href="#"><img src="images/nav.png" alt="" /></a>
                                {menubar}

                                <script type="text/javascript" src="js/responsive-nav.js"></script>
                            </div>	

                            <div class="clear"></div>
                        </div>

                        <div class="header_right">
                            <ul class="icon1 sub-icon1 profile_img">
                                <li><a class="active-icon c1" href="#"> </a>
                                    <ul class="sub-icon1 list">
                                        <div class="product_control_buttons">
                                            <form action="" method="post" name="login" id="login-form">
                                                <fieldset class="input">
                                                    <p id="login-form-username">
                                                        <label for="modlgn_username">Email</label>
                                                        <input id="modlgn_username" type="text" name="email" class="inputbox" size="18" autocomplete="off">
                                                    </p>
                                                    <p id="login-form-password">
                                                        <label for="modlgn_passwd">Password</label>
                                                        <input id="modlgn_passwd" type="password" name="password" class="inputbox" size="18" autocomplete="off">
                                                    </p>
                                                    <div class="remember">
                                                        <p id="login-form-remember">
                                                            <label for="modlgn_remember"><a href="#">Forget Your Password ? </a></label>
                                                        </p>
                                                        <input type="submit" name="Submit" class="button" value="Login"><div class="clear"></div>
                                                    </div>
                                                </fieldset>
                                            </form>
                                        </div>
                                    </ul>
                                </li>
                            </ul>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        {content}
        <div class="footer" style="background:{role_color}">
            <div class="container">

                <div class="copy">
                    <p>© 2014 Template by <a href="http://w3layouts.com" target="_blank">w3layouts</a></p>


                </div>

            </div>
        </div>
    </body>	
</html>