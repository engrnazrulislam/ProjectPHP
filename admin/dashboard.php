<?php
ob_start();
session_start();
if (isset($_SESSION['login']) != true) {
    header('location:login.php');
} else {
    ?>
    <!DOCTYPE html>
    <html lang="en" data-theme="corporate">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>NCS-Dashboard</title>
        <link href="https://cdn.jsdelivr.net/npm/daisyui@4.7.3/dist/full.min.css" rel="stylesheet" type="text/css" />
        <script src="https://cdn.tailwindcss.com"></script>
    </head>

    <body>
        <header class="container mx-auto w-10/12 mt-7">
            <?php
            include("admin_nav.php");
            ?>
        </header>
        <main class="container mx-auto w-10/12">
            <!-- Grid Layout Section -->
            <section class="grid gap-6 min-h-lvh grid-cols-1 md:grid-cols-2 lg:grid-cols-12 mt-6">
                <div class="w-full shadow-2xl col-span-3 space-y-0 p-6">
                    <div class="collapse rounded-none">
                        <input type="checkbox" />
                        <div class="collapse-title text-base font-bold">
                            User
                        </div>
                        <div class="collapse-content">
                            <p><a href="user/createUser.php" target="main_content">Create User</a></p>
                            <p><a href="user/showUser.php" target="main_content">User Lists</a></p>
                        </div>
                    </div>
                    <div class="collapse rounded-none">
                        <input type="checkbox" />
                        <div class="collapse-title text-base font-bold">
                            Product
                        </div>
                        <div class="collapse-content">
                            <p><a href="#">Add Product</a></p>
                            <p><a href="#">Update Product</a></p>
                            <p><a href="#">Modify Product</a></p>
                        </div>
                    </div>
                    <div class="collapse rounded-none">
                        <input type="checkbox" />
                        <div class="collapse-title text-base font-bold">
                            Content
                        </div>
                        <div class="collapse-content">
                            <p><a href="#">Create New Content</a></p>
                            <p><a href="#">Modify Content</a></p>
                            <p><a href="#">Delete Delete</a></p>
                        </div>
                    </div>
                    <div class="collapse rounded-none">
                        <input type="checkbox" />
                        <div class="collapse-title text-base font-bold">
                            Employee
                        </div>
                        <div class="collapse-content">
                            <p><a href="#">Create New Employee</a></p>
                            <p><a href="#">Modify Employee </a></p>
                            <p><a href="#">Delete Employee</a></p>
                        </div>
                    </div>
                </div>
                <div class="w-full bg-white shadow-2xl col-span-9">
                    <iframe src="" frameborder="0" name="main_content" class="p-6 w-full h-full"></iframe>
                </div>
            </section>
        </main>
        <footer class="footer grid-rows-2 p-10 bg-neutral text-neutral-content mt-28">
            <?php
            include("../footer.php");
            ?>
        </footer>
    </body>

    </html>
    <?php
}
?>