<?php
ob_start();
session_start();
include('dbconn.php');
?>
<!DOCTYPE html>
<html lang="en" data-theme="corporate">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.7.3/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <header class="container mx-auto w-10/12 mt-7">
        <?php
        include('../nav.php');
        ?>
        <div class="navbar-end">
            <a class="btn btn-ghost text-base text-black" href="login.php">login</a>
        </div>
        </div>
        </nav>
    </header>
    <main>
        <!-- Login Section -->
        <section class="container mx-auto w-3/12 mt-24 space-y-3 p-10 rounded-lg glass">
        <?php
        if (isset($_POST['submit'])) {
            $username = $_POST['username'];
            $passwd = md5($_POST['passwd']);
            $sql = "SELECT * FROM ncs_user WHERE uname='$username' AND upass='$passwd'";
            $query = $conn->query($sql);
            $check_result = $query->num_rows;
            if ($check_result == 1) {
                $user_data=$query->fetch_assoc();
                $_SESSION['username']=$user_data['uname'];
                $_SESSION['login']=true;
                header('location:dashboard.php');
            } else {
                ?>
                <div class="flex justify-center mx-auto">
                    <h3 class="text-base text-error">
                        <?php echo "! Username or Password Incorrect !"; ?>
                    </h3>
                </div>
                <?php
                $conn->close();
            }
        }
        ?>
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" class="space-y-6 ">
                <div>
                    <label class="input input-bordered flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                            class="w-4 h-4 opacity-70">
                            <path
                                d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM12.735 14c.618 0 1.093-.561.872-1.139a6.002 6.002 0 0 0-11.215 0c-.22.578.254 1.139.872 1.139h9.47Z" />
                        </svg>
                        <input type="text" class="grow" placeholder="Username" /name="username">
                    </label>
                </div>
                <div>
                    <label class="input input-bordered flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                            class="w-4 h-4 opacity-70">
                            <path fill-rule="evenodd"
                                d="M14 6a4 4 0 0 1-4.899 3.899l-1.955 1.955a.5.5 0 0 1-.353.146H5v1.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-2.293a.5.5 0 0 1 .146-.353l3.955-3.955A4 4 0 1 1 14 6Zm-4-2a.75.75 0 0 0 0 1.5.5.5 0 0 1 .5.5.75.75 0 0 0 1.5 0 2 2 0 0 0-2-2Z"
                                clip-rule="evenodd" />
                        </svg>
                        <input type="password" class="grow" placeholder="password" name="passwd" />
                    </label>
                </div>
                <div class="flex justify-center">
                    <button class="btn btn-success bg-gray-400 border-none w-full" type="submit"
                        name="submit">Login</button>
                </div>
            </form>
        </section>
    </main>
    <footer class="footer grid-rows-2 p-10 bg-neutral text-neutral-content mt-28">
        <?php
        include('../footer.php')
        ?>
    </footer>
</body>

</html>