<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="robots" content="noindex">
    <base href="https://www.woshiru.com/creditcard/">
    <title>おすすめクレジットカードを知る - クレジットカード比較サイト</title>
    <!-- Bootstrap -->
    <script src="<?php echo base_url("lib/jQuery/jquery-3.1.1.min.js"); ?>"></script>
    <script src="<?php echo base_url("lib/bootstrap-3.3.7/js/bootstrap.min.js"); ?>"></script>
    <link href="<?php echo base_url("lib/bootstrap-3.3.7/css/bootstrap.min.css"); ?>" rel="stylesheet">
    <link href="<?php echo base_url("lib/bootstrap-3.3.7/css/bootstrap-theme.min.css"); ?>" rel="stylesheet">
    <!-- End Bootstrap -->
    <link rel="stylesheet" href="/creditcard/assets/templates/washiru_common/css/font-awesome.css">
    <link rel="canonical" href="https://www.woshiru.com/creditcard/search/view" />
    <link rel="stylesheet" href="https://www.woshiru.com/creditcard/assets/templates/washiru_common/css/customize.css" type="text/css">
    <link rel="stylesheet" href="https://www.woshiru.com/creditcard/assets/templates/washiru_common/css/styles_sp.css" type="text/css">
    <link rel="stylesheet" href="https://www.woshiru.com/creditcard/assets/templates/washiru_common/css/gendogaku.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <!--[if gt IE 6]><!-->
    <!--<![endif]-->

    <!--[if lt IE 9]>
    <script src="/creditcard/assets/templates/washiru_common/js/html5shiv-printshiv.js"></script>
    <![endif]-->
    <script>
        $(function(){
            $("#menu").css("display","none");
            $("#button-toggle").on("click", function() {
                $("#menu").slideToggle();
            });
        });
        $(function(){
            $("#side_area .side_nav02 nav h2").click(function(){
                $(this).next("ul").slideToggle();
                $(this).next("ul").siblings("ul").slideUp();
                $(this).toggleClass("open");
                $(this).siblings("h2").removeClass("open");
            });
        })
    </script>

    <script type="text/javascript" src="https://www.woshiru.com/creditcard/assets/templates/washiru_common/js/jquery.meerkat.1.3.min.js"></script>
    <script type="text/javascript">
        $(function(){
            $('.meerkat').meerkat({
                //height: '250px',
                width: '100%',
                position: 'bottom',
                close: '.close-meerkat',
                animationIn: 'slide',
                animationSpeed: 1000,
                removeCookie: '.reset',
                delay: 1
            }).addClass('pos-bot');
        });
    </script>

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-T7VKPG');</script>
    <!-- End Google Tag Manager -->
</head>

<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-T7VKPG"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
