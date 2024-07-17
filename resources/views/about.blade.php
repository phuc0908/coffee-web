<!DOCTYPE html>
<html>

<head>
    <title>About Mochii</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="img/logo_Mochii.png" type="img/icon" />
</head>
<style>
    html {
        scroll-behavior: smooth;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Geologica", sans-serif;
        text-decoration: none;
        transition: 0.2s;
        text-transform: capitalize;
    }

    * img {
        user-select: none;
    }

    header {
        position: fixed;
        height: 70px;
        width: 100%;
        background-color: rgba(255, 255, 255, 0.2);
        z-index: 10;
        user-select: none;
    }

    section img {
        width: 100%;
    }

    header.header-active a,
    header.header-active h1 {
        color: white;
        transition: color 0.3s ease-in-out;
    }
</style>

<body style="width: 100%;">
    <header class="main-header">
        <h1 class="logo"><a style="color: black;" href="{{ route('index') }}">Mochii.</a></h1>
        <nav class="navbar-big" id="sidemenu">
            <a href="#start" class="active">Start</a>
            <a href="#warm-mochi">Warm Mochi</a>
            <a href="#flavors-of-france">Flavors of France</a>
            <a href="#ooh-la-la-lune" class="target-section">Ooh La La, Lune!</a>
            <a href="#info-dev">Info Dev</a>
        </nav>
    </header>

    <section id="start">
        <img src="img/about_page/1.png" alt="" />
    </section>

    <section id="warm-mochi">
        <img src="img/about_page/2.png" alt="" />
    </section>

    <section id="flavors-of-france">
        <img src="img/about_page/3.png" alt="" />
    </section>

    <section id="ooh-la-la-lune">
        <img src="img/about_page/4.png" alt="" />
    </section>

    <section id="info-dev">
        <img src="img/about_page/5.png" alt="" />
    </section>
</body>

<script>
    const navLinks = document.querySelectorAll('.navbar-big a');
    const header = document.querySelector('.main-header');


    navLinks.forEach(link => {
        link.addEventListener('click', (event) => {
            event.preventDefault(); // Prevent default link behavior

            // Get the target section ID without the leading "#"
            const targetSectionId = link.getAttribute('href').substring(1);

            // Smooth scroll to the target section with offset for header height
            const targetSection = document.getElementById(targetSectionId);


            if (targetSection) {
                window.scrollTo({
                    top: targetSection.offsetTop,
                    behavior: 'smooth'
                });
            }
            navLinks.forEach(otherLink => otherLink.classList.remove('active'));
            // Add active class to the clicked link
            link.classList.add('active');

            if (targetSectionId === 'ooh-la-la-lune') {
                header.classList.add('header-active');
            } else {
                header.classList.remove('header-active');
            }
        });
    });
</script>

</html>