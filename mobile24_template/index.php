<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <!-- jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- lazy-load -->
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.plugins.min.js"></script>
    <!-- boootraps -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    <!-- //icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- slick slider -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js" integrity="sha512-HGOnQO9+SP1V92SrtZfjqxxtLmVzqZpjFFekvzZVWoiASSQgSr4cw9Kqd2+l8Llp4Gm0G8GIFJ4ddwZilcdb8A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- js -->

    <script src="public/js/main.js"></script>

    <script src="public/js/product.js"></script>
    <script src="public/js/sale.js"></script>
    <script src="public/js/cart.js"></script>
    <script src="public/js/product-detail.js"></script>
    <!-- //css -->
    <!-- <link rel="stylesheet" href="public/css/reset.css"> -->


    <link rel="stylesheet" href="public/css/style.css">

    <link rel="stylesheet" href="public/css/responsive.css">

    <!-- chen animate -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <!-- chen wowjf -->
    <link rel='stylesheet' href='https://cdn.rawgit.com/daneden/animate.css/v3.1.0/animate.min.css'>
    <script src='https://cdn.rawgit.com/matthieua/WOW/1.0.1/dist/wow.min.js'></script>


</head>

<body>

    <div id="wrapper" class="wrapper active">

        <!-- modal box -login -->
        <div class="login-modal container">

            <!-- ////btn_close -->
            <div class="login-modal__btn--close">
                <i class="fa-solid fa-xmark"></i>
            </div>


            <div class="login-modal__img">
                <img src="images/login-.png" alt="">
            </div>
            <div class="login-modal__main">


                <form action="">
                    <h3 class="login-modal__main__title">????ng Nh???p</h3>


                    <hr class="login-modal__main__line">


                    </hr>
                    <div class="login-modal__main__name">
                        <label for="name">T??i Kho???n</label>
                        <input type="text" name="name">
                    </div>


                    <div class="login-modal__main__password">
                        <label for="name">M???t Kh???u</label>
                        <input type="text" name="name">
                    </div>

                    <div class="login-modal__main__remember">
                        <input name="remember" type="checkbox">
                        <label for="">nh??? m???t kh???u</label>
                    </div>

                    <div class="login-modal__main__btn">
                        <button class="" type="submit">????ng Nh???p</button>
                        <button class=""><a href="">????ng K??</a></button>
                    </div>

                    <div class="login-modal__main__forget">
                        <a href="">Qu??n M???t Kh???u?</a>
                    </div>

            </div>

        </div>
    </div>
    </div>



    <!-- over-layer -->
    <div class="over-layer">

    </div>



    <!-- banner-left-right -->

    <div class="banner-left">
        <a><img src="images/banner-left.png" alt=""></a>

    </div>



    <!-- btn-scroll-top -->
    <div class="btn-scroll-top">
        <img src="images/scroll top.png" alt="">

    </div>




    <!-- //header -->

    <div class="header">
        <div class="header-top container">
            <div class="row">
                <div class="header-top__logo">
                    <img src="images/low-res-logo (3).png" alt="">
                </div>

                <div class="header-top__search">

                    <input type="text" placeholder="">
                    <button class="btn"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>

                <div class="header-top__history">
                    <span><a>L???ch s??? ????n h??ng</a></span>
                </div>
                <div class="header-top__cart ">

                    <!-- layer-fake -->

                    <i class="fa-solid fa-cart-shopping">
                        <div class="header-top__cart-total">
                            <span> 25</span>
                        </div>
                    </i>
                    <span><a>Gi??? h??ng</a></span>

                    <div class="header-top__cart-detail">

                        <ul class="row">

                            <li>

                                <div class="header-top__cart-detail__img"> <img src="images/tab1.jpg" alt=""></div>
                                <div class="header-top__cart-detail-main">
                                    <div class="header-top__cart-detail-main__name"> Sam Sung GlaxyUltra</div>
                                    <div class="header-top__cart-detail-main__number"> S??? l?????ng : <span>3</span></div>

                                    <div class="header-top__cart-detail-main__price"> Gi?? : <span>560.000</span></div>
                                </div>
                            </li>
                            <li>

                                <div class="header-top__cart-detail__img"> <img src="images/tab1.jpg" alt=""></div>
                                <div class="header-top__cart-detail-main">
                                    <div class="header-top__cart-detail-main__name"> Sam Sung GlaxyUltra</div>
                                    <div class="header-top__cart-detail-main__number"> S??? l?????ng : <span>3</span></div>

                                    <div class="header-top__cart-detail-main__price"> Gi?? : <span>560.000</span></div>
                                </div>
                            </li>
                            <li>

                                <div class="header-top__cart-detail__img"> <img src="images/tab1.jpg" alt=""></div>
                                <div class="header-top__cart-detail-main">
                                    <div class="header-top__cart-detail-main__name"> Sam Sung GlaxyUltra</div>
                                    <div class="header-top__cart-detail-main__number"> S??? l?????ng : <span>3</span></div>

                                    <div class="header-top__cart-detail-main__price"> Gi?? : <span>560.000</span></div>
                                </div>
                            </li>
                            <li>

                                <div class="header-top__cart-detail__img"> <img src="images/tab1.jpg" alt=""></div>
                                <div class="header-top__cart-detail-main">
                                    <div class="header-top__cart-detail-main__name"> Sam Sung GlaxyUltra</div>
                                    <div class="header-top__cart-detail-main__number"> S??? l?????ng : <span>3</span></div>

                                    <div class="header-top__cart-detail-main__price"> Gi?? : <span>560.000</span></div>
                                </div>
                            </li>
                            <li>

                                <div class="header-top__cart-detail__img"> <img src="images/tab1.jpg" alt=""></div>
                                <div class="header-top__cart-detail-main">
                                    <div class="header-top__cart-detail-main__name"> Sam Sung GlaxyUltra</div>
                                    <div class="header-top__cart-detail-main__number"> S??? l?????ng : <span>3</span></div>

                                    <div class="header-top__cart-detail-main__price"> Gi?? : <span>560.000</span></div>
                                </div>
                            </li>
                            <li>

                                <div class="header-top__cart-detail__img"> <img src="images/tab2.jpg" alt=""></div>
                                <div class="header-top__cart-detail-main">
                                    <div class="header-top__cart-detail-main__name"> Sam Sung GlaxyUltra</div>
                                    <div class="header-top__cart-detail-main__number"> S??? l?????ng : <span>3</span></div>

                                    <div class="header-top__cart-detail-main__price"> Gi?? : <span>560.000</span></div>
                                </div>
                            </li>










                        </ul>

                        <div class="header-top__cart-detail-end">
                            <span class="header-top__cart-detail-end__number">
                                T???ng ti???n <span> 6</span> s???n ph???m
                            </span>

                            <span class="header-top__cart-detail-end__total">
                                650.000 ??
                            </span>
                        </div>

                        <div class="header-top__cart-detail-btn">
                            <a> <span>Xem gi??? h??ng</span></a>
                        </div>




                    </div>

                </div>

                <ul class="header-top__nav">

                    <li><a><i class="fa-solid fa-newspaper"></i> Tin T???c </a></li>


                    <!-- <li class="btn--login"><a> <i class="fa-solid fa-user-astronaut"></i> ????ng Nh???p </a></li> -->
                    <li class="header-top__nav--info"><a> <i class="fa-solid fa-user-astronaut"></i> L?? Th??? Vinh </a>

                        <ul class="account--info">
                            <li><i class="fa-solid fa-user-astronaut"></i><a href="">Th??ng tin t??i kho???n</a></li>
                            <li><i class="fa-solid fa-calendar-minus"></i><a href="">Qu???n l?? ????n h??ng</a></li>
                            <li class="log--out"><a href="">????ng xu???t</a></li>
                        </ul>
                    </li>



                </ul>
            </div>
        </div>

        <div class="header-main container">
            <ul class="menu-parent row">
                <li class="col-md-2"><i class="fa-solid fa-dumpster"></i><a>T???ng H???p S???n Ph???m</a>


                </li>
                <li class="col-md-2"><i class="fa-solid fa-mobile-screen-button"></i><a>??i???n tho???i</a>

                    <ul class="menu-children">
                        <li>H??ng ??i???n Tho???i </li>
                        <li><a>H??ng 1</a></li>
                        <li><a>H??ng 1</a></li>
                        <li><a>H??ng 1</a></li>


                    </ul>
                </li>
                <li class="col-md-2"><i class="fa-solid fa-laptop"></i><a>Laptop</a>

                    <ul class="menu-children">
                        <li>H??ng ??i???n Tho???i </li>
                        <li><a>H??ng 1</a></li>
                        <li><a>H??ng 1</a></li>
                        <li><a>H??ng 1</a></li>


                    </ul>
                </li>
                <li class="col-md-2"><i class="fa-solid fa-tablet-button"></i><a>Tablet</a></li>
                <li class="col-md-2"><i class="fa-solid fa-headphones"></i><a>Ph??? Ki???n</a></li>
                <li class="col-md-2"><i class="fa-solid fa-chair"></i><a>Gia d???ng</a></li>

                <li class="col-md-2"><i class="fa-solid fa-computer"></i><a>M??y t??nh</a></li>

            </ul>

        </div>

    </div>



    <?php
    require_once "layouts/home.php"
    ?>










    <!-- ///end-content -->







    <div class=" footer container-fluid">

        <div class="container">


            <div class="row">

                <div class="col-md-3">

                    <ul class="footer-list">

                        <li class=""><a href="">T??ch ??i???m Qu?? t???ng VIP</a></li>
                        <li><a href="">L???ch s??? mua h??ng</a></li>
                        <li><a href="">C???ng t??c b??n h??ng c??ng TGD??</a></li>
                        <li><a href="">T??m hi???u v??? mua tr??? g??p</a></li>
                        <li><a href="">Ch??nh s??ch b???o h??nh</a></li>
                    </ul>
                </div>

                <div class="col-md-3">

                    <ul class="footer-list">

                        <li><a class="" href="">Gi???i thi???u c??ng ty (MWG.vn)</a></li>
                        <li><a href="">Tuy???n d???ng</a></li>
                        <li><a href="">G???i g??p ??, khi???u n???i</a></li>
                        <li><a href="">T??m si??u th??? (3.160 shop)</a></li>
                        <li><a href="">Ch??nh s??ch b???o h??nh</a></li>
                    </ul>
                </div>

                <div class="col-md-3">

                    <ul class="footer-list">

                        <li><a class="footer-list__title">T???ng ????i h??? tr??? (Mi???n ph?? g???i)</a></li>
                        <li><a href="">G???i mua: 1800.1060 (7:30 - 22:00)</a></li>
                        <li><a href="">K??? thu???t: 1800.1763 (7:30 - 22:00)</a></li>
                        <li><a href="">Khi???u n???i: 1800.1062 (8:00 - 21:30)</a></li>
                        <li><a href="">B???o h??nh: 1800.1064 (8:00 - 21:00)</a></li>
                    </ul>
                </div>

                <div class="col-md-3">

                    <div class="footer-group">
                        <h3>Website c??ng t???p ??o??n</h3>
                        <div class="footer-group-main">
                            <div class="row">

                                <div class="col-md-4">
                                    <div class="footer-group-main__img">

                                        <img src="images/footer1.png" alt="">
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <div class="footer-group-main__img">

                                        <img src="images/footer2.jpg" alt="">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="footer-group-main__img">

                                        <img src="images/footer3.jpg" alt="">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="footer-group-main__img">

                                        <img src="images/footer4.png" alt="">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="footer-group-main__img">

                                        <img src="images/footer5.png" alt="">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="footer-group-main__img">

                                        <img src="images/footer6.jpg" alt="">
                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <div class="footer-group-main__img">

                                        <img src="images/footer7.png" alt="">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="footer-group-main__img">

                                        <img src="images/footer8.png" alt="">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="container">
            <div class="footer-end">

                <p>?? 2018. C??ng ty c??? ph???n Th??? Gi???i Di ?????ng. GPDKKD: 0303217354 do s??? KH & ??T TP.HCM c???p ng??y 02/01/2007. GPMXH: 238/GP-BTTTT do B??? Th??ng Tin v?? Truy???n Th??ng c???p ng??y 04/06/2020.
                    ?????a ch???: 128 Tr???n Quang Kh???i, P. T??n ?????nh, Q.1, TP.H??? Ch?? Minh. ??i???n tho???i: 028 38125960. Email: cskh@thegioididong.com. Ch???u tr??ch nhi???m n???i dung: Hu???nh V??n T???t. <a href="">Xem ch??nh s??ch s??? d???ng</a></p>
            </div>
        </div>

    </div>
    </div>

</body>



</html>