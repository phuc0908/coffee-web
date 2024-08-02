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
    <link rel="shortcut icon" href="img/logo_Mochii.png" type="img/icon" />
    <!----->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/style.css" />


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
    </style>
</head>

<body>
    <header class="main-header">
        <h1 class="logo">Mochii.</h1>

        <nav class="navbar-big" id="sidemenu">
            <a href="index.html" class="active">Home</a>
            <a href="{{ route('about') }}">About</a>
            <a href="{{ route('contact') }}">Contact</a>
            <form class="d-flex" role="search" method="post">
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
            @for ($i = 0; $i < 10; $i++) <div class="pro-item" onclick="window.open('sproduct.html')">
                <div class="img">
                    <img src="img/home/product//1.jpg" alt="img/home/product/" />
                </div>

                <div class="cantener">
                    <div>
                        <span>Zara</span>
                        <p>
                            half round neak t-shrit for summer color
                            @if($i==1)
                            are black sdafdas asdasdas sdfdfds adfassd asdasdas adasdas ppppppppppsds
                            @endif
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

                        <h2><span style="color: black;">&#8377; 599</span> <a href="#"><ion-icon name="bag-handle-outline"></ion-icon></a></h2>
                    </div>
                </div>
        </div>
        @endfor

        </div>
    </section>

    <!-- The Modal -->
    <div id="dialog">       
        <div id="dialog-content">
            <span class="close" onclick="closeDialog()">&times;</span>
            <img id="dialog-image" src="" alt="Product Image" style="width: 100%; height: auto;">
        </div>
    </div>                                                                                                                              

    <footer class="footer">
        <section>
            <div class="share">
                <div class="link">
                    <a href="https://www.facebook.com/profile.php?id=100088120796858"><ion-icon name="logo-facebook"></ion-icon></a>
                    <a href=""><ion-icon name="person-circle-outline"></ion-icon></a>
                    <a href="https://github.com/phuc0908"><ion-icon name="logo-github"></ion-icon></a>
                </div>
            </div>
        </section>
    </footer>
</body>
<script src="js/main.js"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

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
    var imageSrc = 'https://scontent.fdad1-4.fna.fbcdn.net/v/t39.30808-6/433132557_386899464295124_3702882529260110136_n.jpg?_nc_cat=105&ccb=1-7&_nc_sid=833d8c&_nc_eui2=AeH4Yfrshlsgc82DVWIrwAWjbIwv95FxlQhsjC_3kXGVCK3RgoGC1JTA9RcVyIsOu_G5YClDwM57OyEQUvEFEDhx&_nc_ohc=BVz3NbCXruYQ7kNvgGSaF6i&_nc_ht=scontent.fdad1-4.fna&cb_e2o_trans=t&oh=00_AYAj9ZlPdNMbIyw5UDiXz7VFm5xU_8upGnp5UsB6s2Z47A&oe=669B9FFF'

    function openDialog() {
        document.getElementById('dialog-image').src = imageSrc;
        document.getElementById('dialog').style.display = 'block';
    }

    function closeDialog() {
        document.getElementById('dialog').style.display = 'none';
    }

    // Close the dialog when the user clicks anywhere outside of the dialog-content
    window.onclick = function(event) {
        if (event.target == document.getElementById('dialog')) {
            closeDialog();
        }
    }
</script>

<script>
    const header = document.querySelector('.main-header');
    const hideThreshold = 200; // Ngưỡng để ẩn header (bạn có thể điều chỉnh giá trị này)

    window.addEventListener('scroll', () => {
        if (window.scrollY > hideThreshold) {
            header.classList.add('hide-header');
        } else {
            header.classList.remove('hide-header');
        }
    });
</script>

</html>