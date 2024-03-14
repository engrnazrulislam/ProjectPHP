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
        include('nav.php');
        ?>
        <div class="navbar-end">
            <a class="btn btn-ghost text-base text-black" href="admin/login.php">login</a>
        </div>
        </div>
        </nav>
    </header>
    <main>

    </main>
    <footer class="footer grid-rows-2 p-10 bg-neutral text-neutral-content mt-28">
        <?php
        include("footer.php");
        ?>
    </footer>
</body>

</html>