<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <meta name="keywords" content="aswini kumar dausa, aswinikumar, aswini kumar, aswini kumar health" />
    <title>Mochii Tea&Coffee</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
    <!-- HTML -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="shortcut icon" href="img/logo_Mochii.png" type="img/icon" />
    <!----->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/footer.css" />
    <link rel="stylesheet" href="css/product_card.css" />

    <link rel="stylesheet" href="{{ asset('css/admin/sb-admin-2.min.css') }}">

    <style>
        .main {
            width: 100vw;
            z-index: 100;
            margin-top: 0;
            position: fixed;
        }

        /* Dialog Styles */
        #dialog {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.5);
        }

        #dialog-content {
            background-color: white;
            margin: 1% auto;
            padding: 5px 20px 20px 20px;
            border: 1px solid #888;
            width: 90%;
            max-width: 900px;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            user-select: none;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }



        .modal-content {
            width: 380px;
            right: -60px;
        }

        .modal-body {
            padding: 0px !important;
        }
    </style>
</head>

<body>
    <header class="main-header" style="display: flex;">
        <h1 class="logo">Mochii.</h1>

        <nav class="navbar-big" id="sidemenu" style="display: flex;">
            <a href="index.html" class="active">Home</a>
            <a href="{{ route('about') }}">About</a>
            <a href="{{ route('contact') }}">Contact</a>
            <form class="d-flex" role="search" method="post" style="display: flex; align-items: center;">
                @csrf
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
                <button class="btn btn-outline-success" type="submit">
                    search
                </button>
            </form>

            <ion-icon name="close-outline" onclick="openemenu()" id="menu-btu"></ion-icon>
        </nav>

        <ion-icon name="menu-outline" onclick="closemenu()" id="menu-btu"></ion-icon>
    </header>

    <section id="home" class="home swiper mySwiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <img src="img/home/th/hello-autumn.jpg" alt="" />
                <a type="submit" class="button" onclick="openAutumn()">Explor Now</a>
            </div>
            <div class="swiper-slide">
                <img src="img/home/th/starbucks.jpg" alt="" />
                <a type="submit" onclick="openStarbuck()" class="button">Explor Now</a>
            </div>
            <div class="swiper-slide">
                <img src="img/home/th/5.jpg" alt="" />
                <a type="submit" class="button" onclick="openMochii()">Explor Now</a>
            </div>

            <div class="swiper-slide">
                <img src="img/home/th/6.jpg" alt="" />
                <a type="submit" class="button" onclick="openVKU()">Explor Now</a>
            </div>
        </div>
    </section>

    <section class="grids" style="width: 100%">
        <div class="grid-container">
            <div class="grid-item">
                <div class="text-btu">
                    <h1>Coffee</h1>
                    <h3>sale 50% off</h3>
                    <button style="margin-top: 80px;" class="btu" type="submit">Check now</button>
                </div>
            </div>
            <div class="grid-item">
                <div class="text-btu">
                    <h1>Milk Tea </h1>
                    <h3>sale 20% off</h3>
                    <button style="margin-top: 80px;" class="btu" type="submit">Check now</button>
                </div>
            </div>
            <div class="grid-item span-item">
                <div class="text-btu" style="margin-top: 150px;">
                    <button class="btu" type="submit" onclick="openDialog()">
                        Menu
                    </button>
                </div>
            </div>
        </div>
    </section>

    <section class="count">
        <div class="box-canter">
            <div class="box">
                <div>
                    <ion-icon name="cart-outline"></ion-icon>
                </div>
                <div class="row-2">
                    <h3>fast delivery</h3>
                    <p>minmun 48hovers deliver order</p>
                </div>
            </div>
            <div class="box">
                <div>
                    <ion-icon name="bag-check-outline"></ion-icon>
                </div>
                <div class="row-2">
                    <h3>50+ product</h3>
                    <p>diffrent brand and desines product</p>
                </div>
            </div>

            <div class="box">
                <div>
                    <ion-icon name="ribbon-outline"></ion-icon>
                </div>
                <div class="row-2">
                    <h3>Quality!</h3>
                    <p>product 1 months replacement</p>
                </div>
            </div>
            <div class="box">
                <div>
                    <ion-icon name="wallet-outline"></ion-icon>
                </div>
                <div class="row-2">
                    <h3>onlie payment</h3>
                    <p>posilble offile and online payment</p>
                </div>
            </div>
        </div>
    </section>

    <section class="product">
        <h2 class="heading">best<span> sales</span></h2>
        <p>Autumn is coming with </p>

        <div class="product-main">
            @if(!empty($products))
            @foreach ($products as $key => $value)
            <div class="pro-item">
                <div class="img">
                    <img src="img/home/product//1.jpg" alt="img/home/product/" />
                </div>

                <div class="cantener">
                    <div>
                        <span>Zara</span>
                        <p>
                            half round neak t-shrit for summer color
                            are black sdafdas asdasdas sdfdfds adfassd asdasdas adasdas ppppppppppsds
                        </p>
                    </div>

                    <div>
                        <h3>
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star"></ion-icon>
                        </h3>

                        <h2><span style="color: black;">&#8377; 599</span>
                            <a class="btn-info" data-id="{{$value->id}}"><ion-icon name="information-circle-outline"></ion-icon></a>
                        </h2>
                    </div>
                </div>
            </div>
            @endforeach
            @endif

        </div>
    </section>

    <!-- The Modal -->
    <div id="dialog">
        <div id="dialog-content">
            <span class="close" onclick="closeDialog()">&times;</span>
            <img id="dialog-image" src="{{asset('img/menu.jpg')}}" alt="Product Image" style="width: 100%; height: auto;">
        </div>
    </div>

    <!--INFO Modal -->
    <div class="modal fade" id="myModal-info" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div>

                    <div class="modal-body">
                        <div class="product-card">
                            <div class="badge">Hot</div>
                            <div class="product-tumb">
                                <img src="https://i.imgur.com/xdbHo4E.png" alt="">
                            </div>
                            <div class="product-details">
                                <span class="product-catagory">Women,bag</span>
                                <h4><a href="">Women leather bag</a></h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero, possimus nostrum!</p>
                                <div class="product-bottom-details">
                                    <div class="product-price"><small>$96.00</small>$230.99</div>
                                    <div class="product-links">
                                        <a href=""><i class="fa fa-heart"></i></a>
                                        <a href=""><i class="fa fa-shopping-cart"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end modal -->

    <footer class="new_footer_area bg_color">
        <div class="new_footer_top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6" style="margin: 0 0px 0 0;">
                        <div class="f_widget company_widget wow fadeInLeft" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInLeft;">
                            <h3 class="f-title f_600 t_color f_size_18">Get in Touch</h3>
                            <p>Don’t miss any updates of our new templates and extensions.!</p>
                            <form action="#" class="f_subscribe_two mailchimp" method="post" novalidate="true" _lpchecked="1">
                                <input style="font-size: 17px;" type="text" name="EMAIL" class="form-control memail" placeholder="Email">
                                <button class="btn btn_get btn_get_two" type="submit">Subscribe</button>
                                <p class="mchimp-errmessage" style="display: none;"></p>
                                <p class="mchimp-sucmessage" style="display: none;"></p>
                            </form>
                        </div>
                    </div>
                    <!-- <span style="height: 20px;width: 20px;"></span> -->
                    <div class="col-lg-3 col-md-6" style="padding: 0 0 0 40px;">
                        <div class="f_widget about-widget pl_70 wow fadeInLeft" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInLeft;">
                            <h3 class="f-title f_600 t_color f_size_18">Download</h3>
                            <ul class="list-unstyled f_list">
                                <li><a href="#">Company</a></li>
                                <li><a href="#">Android App</a></li>
                                <li><a href="#">ios App</a></li>
                                <li><a href="#">Desktop</a></li>
                                <li><a href="#">Projects</a></li>
                                <li><a href="#">My tasks</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="f_widget about-widget pl_70 wow fadeInLeft" data-wow-delay="0.6s" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInLeft;">
                            <h3 class="f-title f_600 t_color f_size_18">Help</h3>
                            <ul class="list-unstyled f_list">
                                <li><a href="#">FAQ</a></li>
                                <li><a href="#">Term &amp; conditions</a></li>
                                <li><a href="#">Reporting</a></li>
                                <li><a href="#">Documentation</a></li>
                                <li><a href="#">Support Policy</a></li>
                                <li><a href="#">Privacy</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="f_widget social-widget pl_70 wow fadeInLeft" data-wow-delay="0.8s" style="visibility: visible; animation-delay: 0.8s; animation-name: fadeInLeft;">
                            <h3 class="f-title f_600 t_color f_size_18">Team Solutions</h3>
                            <div class="f_social_icon">
                                <style>
                                    .icon-footer ion-icon {
                                        font-size: 42px;
                                    }
                                </style>
                                <a href="#" class="fab fa-facebook icon-footer"><ion-icon name="logo-facebook"></ion-icon></a>
                                <a href="#" class="fab fa-twitter icon-footer"><ion-icon name="logo-twitter"></ion-icon></a>
                                <a href="#" class="fab fa-github icon-footer"><ion-icon name="logo-github"></ion-icon></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer_bg">
                <div class="footer_bg_one"></div>
                <div class="footer_bg_two"></div>
            </div>
        </div>
        <div class="footer_bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-sm-7">
                        <p class="mb-0 f_400">2019 All rights reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="js/main.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

    <script src="{{asset('js/index.js')}}"></script>

    <script>
        var swiper = new Swiper(".mySwiper", {
            spaceBetween: 5,
            autoplay: {
                delay: 5000,
                direction: "vertical",

                disableOnInteraction: false,
                loop: true,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>

    <script>
        var swiper = new Swiper(".explors", {
            spaceBetween: 0,
            autoplay: {
                delay: 500,
                disableOnInteraction: false,
                loop: true,
            },

            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },

            breakpoints: {
                540: {
                    slidesPerView: 3,
                },
                768: {
                    slidesPerView: 5,
                },
                1024: {
                    slidesPerView: 5,
                },
            },
        });
    </script>

    <script>
        var win;

        function openAutumn() {
            win = window.open(
                "https://youtube.com/@ishafoundation",
                (width = "500px"),
                (height = "500px")
            );
        }

        function openStarbuck() {
            win = window.open(
                "https://www.starbucks.vn/",
                (width = "500px"),
                (height = "500px")
            );
        }

        function openMochii() {
            win = window.open(
                "https://www.facebook.com/profile.php?id=100089252194204",
                (width = "500px"),
                (height = "500px")
            );
        }

        function openVKU() {
            win = window.open(
                "https://vku.udn.vn/",
                (width = "500px"),
                (height = "500px")
            );
        }
    </script>

    <script>
        var swiper = new Swiper(".reviews", {
            spaceBetween: 30,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
                loop: true,
            },

            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },

            breakpoints: {
                540: {
                    slidesPerView: 1,
                },
                768: {
                    slidesPerView: 2,
                },
                1024: {
                    slidesPerView: 5,
                },
            },
        });
    </script>
    <script>
        function openDialog() {
            document.getElementById('dialog').style.display = 'block';
        }

        function closeDialog() {
            document.getElementById('dialog').style.display = 'none';
        }
        window.onclick = function(event) {
            if (event.target == document.getElementById('dialog')) {
                closeDialog();
            }
        }
    </script>

    <script>
        const header = document.querySelector('.main-header');
        const hideThreshold = 200;

        window.addEventListener('scroll', () => {
            if (window.scrollY > hideThreshold) {
                header.classList.add('hide-header');
            } else {
                header.classList.remove('hide-header');
            }
        });
    </script>

</body>




</html>