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

    <script src="public/js/blog.js"></script>
    <!-- css -->
    <link rel="stylesheet" href="public/css/blog.css">

    <link rel="stylesheet" href="public/css/responsive.css">
</head>

<body>
    <div class="wrapper container-fluid">
        <!-- scroll-to-top{} -->


        <div class="btn-scroll-top">
            <img src="images/scroll top.png" alt="">

        </div>

        <!-- endscrolltotop -->



        <div class="header container">
            <div class="header-top">
                <div class="header-top__logo">
                    <img src="images/logo-post-edited.png" alt="">
                </div>

            </div>

            <div class="header-nav">
                <ul class="header-nav-parent">
                    <li>
                        <a>Sản Phẩm Mới</a>
                        <ul class="header-nav-children">
                            <li><a>Danh mục con 1</a> </li>
                            <li><a>Danh mục con 1</a> </li>
                            <li><a>Danh mục con 1</a> </li>




                        </ul>
                    </li>


                    <li>
                        <a>Meo hay</a>
                        <ul class="header-nav-children">
                            <li><a>Danh mục con 1</a> </li>
                            <li><a>Danh mục con 1</a> </li>
                            <li><a>Danh mục con 1</a> </li>
                            <li><a>Danh mục con 1</a> </li>
                            <li><a>Danh mục con 1</a> </li>
                            <li><a>Danh mục con 1</a> </li>




                        </ul>
                    </li>
                    <li>
                        <a>Khuyến Mãi</a>
                    </li>
                    <li>
                        <a>Tin Game</a>
                    </li>
                    <li>
                        <a>Tư Vấn</a>
                    </li>

                </ul>


                <div class="header-nav-search">
                    <input type="text">
                    <button class="btn"> <i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
            </div>
        </div>


        <!-- ///starcontent -->
        <?php
        require_once "layouts/blog-cat.php";



        ?>








        <!-- endcontent -->











    </div>


</body>

</html>