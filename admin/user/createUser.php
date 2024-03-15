<?php
ob_start();
session_start();
if (isset($_SESSION['login']) != true) {
    header('location:../login.php');
} else {
    include("../dbconn.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Create</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.7.3/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <main>
        <!-- Create User Section -->
        <?php
        if (isset($_POST['submit'])) {
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $userName = $_POST['userName'];
            $password = md5($_POST['password']);
            $email = $_POST['email'];
            $contact = $_POST['contactNo'];
            $sql = "SELECT * FROM ncs_user WHERE uname='$userName' AND upass='$password'";
            $queryResult = $conn->query($sql);
            $check_result = $queryResult->num_rows;
            if ($check_result == 1) {
                echo '<div class="container w-full mx-auto flex justify-center"><h3>User or password already exists</h3></div>';
            } else {
                /* File Upload Section */
                $file_name = $_FILES['u_file']['name'];
                $file_size = $_FILES['u_file']['size'];
                $file_temp = $_FILES['u_file']['tmp_name'];

                if ($file_name == '') {
                    $upload_file = 'img/demo.jpg';
                } else {
                    $upload_file = 'img/' . $file_name;
                    move_uploaded_file($file_temp, $upload_file);
                }
                $slug=uniqid();
                $insert_sql = "INSERT INTO ncs_user(uname, upass, fname, lname, umail, ucontact, uphoto, slug) VALUES ('$userName','$password','$firstName','$lastName','$email','$contact','$upload_file','$slug')";
                $insertQuery = $conn->query($insert_sql);
                if ($insertQuery) {
                    echo '<div class="container w-full mx-auto flex justify-center"><h3>Data is successfully inserted</h3></div>';
                } else {
                    echo '<div class="container w-full mx-auto flex justify-center"><h3>Data insertion is not successful.</h3></div>';
                }
            }
        }
        $conn->close();
        ?>
        <!-- User Creation Form Section -->
        <section class="container w-full mx-auto">
            <form class="form-control space-y-6 p-6" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST"
                enctype="multipart/form-data">
                <div class="grid grid-cols-2 items-center justify-center gap-6">
                    <div>
                        <label for="firstName">First Name:</label>
                        <input type="text" name="firstName" id="" class="input input-bordered w-full max-w-xs"
                            placeholder="First Name">
                    </div>
                    <div>
                        <label for="firstName">Last Name:</label>
                        <input type="text" name="lastName" id=" " class="input input-bordered w-full max-w-xs"
                            placeholder="Last Name">
                    </div>
                    <div>
                        <label for="userName">User Name:</label>
                        <input type="text" name="userName" id="" placeholder="User Name"
                            class="input input-bordered w-full max-w-xs">
                    </div>
                    <div>
                        <label for="password">Password:</label>
                        <input type="password" name="password" id="" placeholder="Password"
                            class="input input-bordered w-full max-w-xs">
                    </div>
                    <div>
                        <label for="email">Email Address:</label>
                        <input type="mail" name="email" id="" placeholder="Email Address"
                            class="input input-bordered w-full max-w-xs">
                    </div>
                    <div>
                        <label for="contactNo">Contact:</label>
                        <input type="text" name="contactNo" id="" placeholder="Contact"
                            class="input input-bordered w-full max-w-xs">
                    </div>
                    <div>
                        <label for="inputFile" class="">Select your photo:</label>
                        <input type="file" name="u_file"
                            class="file-input file-input-bordered file-input-accent pl-0 w-full max-w-xs" />
                    </div>
                    <div>
                        <label for="registered">Click on create user:</label>
                        <input type="submit" name="submit" value="Create User" id="" class="btn btn-primary w-full max-w-xs" />
                    </div>
                </div>
            </form>
        </section>
    </main>

</body>

</html>
<?php
}
?>