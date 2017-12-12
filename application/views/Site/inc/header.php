<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
    <head>
        <title>Welcome To All Our Site</title>
        <link href="<?php echo base_url() ?>assets/site/css/bootstrap.css" rel='stylesheet' type='text/css' />
        <link href="<?php echo base_url() ?>assets/site/css/style.css" rel='stylesheet' type='text/css' />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Blogname Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
              Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" 
              />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <!----webfonts---->
        <link href='http://fonts.googleapis.com/css?family=Oswald:100,400,300,700' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,300italic,400italic,600italic' rel='stylesheet' type='text/css'>
        <!----//webfonts---->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <!--end slider -->
        <!--script-->
        <script type="text/javascript" src="<?php echo base_url() ?>assets/site/js/move-top.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/site/js/easing.js"></script>
        <!--/script-->
        <script type="text/javascript">
            jQuery(document).ready(function ($) {
                $(".scroll").click(function (event) {
                    event.preventDefault();
                    $('html,body').animate({scrollTop: $(this.hash).offset().top}, 900);
                });
            });
        </script>
        <!---->

    </head>
    <body>

        <div id="fb-root"></div>
        <script>(function (d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id))
                    return;
                js = d.createElement(s);
                js.id = id;
                js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.10&appId=255762141567694";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>
        <!---strat-banner---->
        <div class="banner">				
            <div class="header">  
                <div class="container">
                    <div class="logo" style="margin-top:10px;">
                        <a style="font-size:35px;" href="<?php echo base_url() ?>"><?php get_option('logo'); ?></a>
                    </div>
                    <!---start-top-nav---->
                    <div class="top-menu">
                        <span class="menu"> </span> 
                        <ul>
                            <li class="<?php
                            if ($this->uri->uri_string() == '') {
                                echo "active";
                            }
                            ?>"><a href="<?php echo base_url() ?>">HOME</a></li>						
                            <li class="<?php
                            if ($this->uri->uri_string() == 'Site/contact') {
                                echo "active";
                            }
                            ?>"><a href="<?php echo base_url() ?>Site/contact">CONTACT</a></li>	
                            				
                        </ul>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="clearfix"></div>
                    <script>
                        $("span.menu").click(function () {
                            $(".top-menu ul").slideToggle("slow", function () {
                            });
                        });
                    </script>
                    <!---//End-top-nav---->					
                </div>
            </div>
            <div class="container">
                <div class="banner-head">
                    <h1>Welcome To All Our Site</h1>
                </div>
            </div>
        </div>
        <!---//End-banner---->