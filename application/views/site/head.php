<meta http-equiv="Content-Type" content="text/html ;charset=utf-8" />
<!-- the CSS -->
<link rel="stylesheet" href="<?php echo public_url('bootstrap/') ?>bootstrap.min.css" />
<link rel="stylesheet" href="<?php echo public_url('font-awesome/') ?>css/font-awesome.min.css" />
<link type="text/css" href="<?php echo public_url('site/') ?>css/reset.css" rel="stylesheet" />
<link type="text/css" href="<?php echo public_url('site/') ?>css/style.css" rel="stylesheet" />
<link type="text/css" href="<?php echo public_url('site/') ?>css/menu.css" rel="stylesheet" />
<link type="text/css" href="<?php echo public_url('site/') ?>css/input.css" rel="stylesheet" />
<link type="text/css" href="<?php echo public_url('site/') ?>css/product.css" rel="stylesheet" />
<link type="text/css" href="<?php echo public_url('site/') ?>css/slide-flim.css" rel="stylesheet" />
<link type="text/css" href="<?php echo public_url('site/') ?>css/cart.css" rel="stylesheet" />
<link type="text/css" href="<?php echo public_url('site/') ?>css/thien.css" rel="stylesheet" />
<link type="text/css" href="<?php echo public_url('site/') ?>css/login.css" rel="stylesheet" />
<link type="text/css" href="<?php echo public_url('site/') ?>css/register.css" rel="stylesheet" />
<link type="text/css" href="<?php echo public_url('site/') ?>css/dropdown_cart.css" rel="stylesheet" />
<link type="text/css" href="<?php echo public_url('site/') ?>css/forgot_password.css" rel="stylesheet" />
<link type="text/css" href="<?php echo public_url('site/') ?>css/comment.css" rel="stylesheet" />


<!-- End CSS -->

<!-- the Javascript -->

<!-- Sau 60s tu dong load lai trang web -->
<script type="text/javascript">
    //     init_reload();
    //     function init_reload(){
    //         setInterval( function() {
    //                    window.location.reload();

    //           },60000);
    //     }
</script>

<script src="<?php echo public_url() ?>bootstrap/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo public_url() ?>js/jquery/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo public_url() ?>js/jquery/jquery-ui.min.js"></script>	
<script src="https://www.google.com/recaptcha/api.js?hl=vi"></script>

<link rel="stylesheet" href="<?php echo public_url() ?>js/jquery/jquery-ui/custom-theme/jquery-ui-1.8.21.custom.css" type="text/css">

<script src="<?php echo public_url() ?>js/script.js"></script>

<!-- raty -->
<script type="text/javascript" src="<?php echo public_url('site/') ?>raty/jquery.raty.min.js"></script>
<script type="text/javascript">
    $(function() {
        $.fn.raty.defaults.path = '<?php echo public_url('site/') ?>raty/img';
        $('.raty').raty({
            score: function() {
                return $(this).attr('data-score');
            },
            readOnly: true,
        });
    });
</script>

<!-- Tro ve trang truoc -->
<script type="text/javascript">
    function site_back() {
        history.back();
    }
</script>

<!-- ======================== -->

<script type="text/javascript" src="<?php echo public_url('js/') ?>addToCart.js"></script>

<!-- raty -->
<style>
    .raty img {
        width: 16px !important;
        height: 16px;
    }
</style>
<!--End raty -->

<!-- End Javascript -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#back_to_top').click(function() {
            $('html, body').animate({
                scrollTop: 0
            }, "slow");
        });
        // go top
        $(window).scroll(function() {
            if ($(window).scrollTop() != 0) {
                $('#back_to_top').fadeIn();
            } else {
                $('#back_to_top').fadeOut();
            }
        });
    });
</script>
<style>
    #back_to_top {
        bottom: 10px;
        color: #666;
        cursor: pointer;
        padding: 5px;
        position: fixed;
        right: 55px;
        text-align: center;
        text-decoration: none;
        width: auto;
    }
</style>

<title>Website bán điện máy Triplet</title>