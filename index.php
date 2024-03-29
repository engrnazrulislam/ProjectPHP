<!DOCTYPE html>
<html lang="en" data-theme="corporate">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My PHP Project</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.7.3/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <header class="container mx-auto w-10/12 mt-7">
        <?php
        include ('nav.php');
        ?>
        <div class="navbar-end">
            <a class="btn btn-ghost text-base text-black" href="admin/login.php">login</a>
        </div>
        </div>
        </nav>
        <!-- Banner Section -->
        <section class="container mx-auto w-full">
            <div class="carousel w-full">
                <div id="slide1" class="carousel-item relative w-full">
                    <img src="https://daisyui.com/images/stock/photo-1625726411847-8cbb60cc71e6.jpg" class="w-full" />
                    <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
                        <a href="#slide4" class="btn btn-circle">❮</a>
                        <a href="#slide2" class="btn btn-circle">❯</a>
                    </div>
                </div>
                <div id="slide2" class="carousel-item relative w-full">
                    <img src="https://daisyui.com/images/stock/photo-1609621838510-5ad474b7d25d.jpg" class="w-full" />
                    <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
                        <a href="#slide1" class="btn btn-circle">❮</a>
                        <a href="#slide3" class="btn btn-circle">❯</a>
                    </div>
                </div>
                <div id="slide3" class="carousel-item relative w-full">
                    <img src="https://daisyui.com/images/stock/photo-1414694762283-acccc27bca85.jpg" class="w-full" />
                    <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
                        <a href="#slide2" class="btn btn-circle">❮</a>
                        <a href="#slide4" class="btn btn-circle">❯</a>
                    </div>
                </div>
                <div id="slide4" class="carousel-item relative w-full">
                    <img src="https://daisyui.com/images/stock/photo-1665553365602-b2fb8e5d1707.jpg" class="w-full" />
                    <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
                        <a href="#slide3" class="btn btn-circle">❮</a>
                        <a href="#slide1" class="btn btn-circle">❯</a>
                    </div>
                </div>
            </div>
        </section>
    </header>
    <main class="container mx-auto w-10/12 mt-7">
        <!-- Product Section -->
        <section class="grid grid-cols-4 gap-4">
            <div class="border h-80 w-full bg-blue-200"></div>
            <div class="border h-80 w-full bg-blue-200"></div>
            <div class="border h-80 w-full bg-blue-200"></div>
            <div class="border h-80 w-full bg-blue-200"></div>
            <div class="border h-80 w-full bg-blue-200"></div>
            <div class="border h-80 w-full bg-blue-200"></div>
            <div class="border h-80 w-full bg-blue-200"></div>
            <div class="border h-80 w-full bg-blue-200"></div>
            <div class="border h-80 w-full bg-blue-200"></div>
        </section>
    </main>
    <footer class="footer grid-rows-2 p-10 bg-neutral text-neutral-content mt-28">
        <?php
        include ("footer.php");
        ?>
    </footer>
</body>

</html>