<?php
ob_start();
session_start();
if (isset ($_SESSION['login']) != true) {
    header('location:../login.php');
} else {
    include ("../dbconn.php");
    if (isset ($_GET['slug'])) {
        $id = $_GET['slug'];

        ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Edit User</title>
            <link href="https://cdn.jsdelivr.net/npm/daisyui@4.7.3/dist/full.min.css" rel="stylesheet" type="text/css" />
            <script src="https://cdn.tailwindcss.com"></script>
        </head>

        <body>
            <?php
            if (isset ($_POST['submit'])) {
                $firstName = $_POST['fname'];
                $lastName = $_POST['lname'];
                $userName = $_POST['uname'];
                $pass = md5($_POST['upass']);
                $email = $_POST['umail'];
                $contact = $_POST['ucontact'];
                
                $photo_name=$_FILES['u_photo']['name'];
                $photo_size=$_FILES['u_photo']['size'];
                $photo_temp=$_FILES['u_photo']['tmp_name'];

                if ($photo_name == '') {
                    $upload_photo = 'img/demo.jpg';
                } else {
                    $upload_photo='img/'.$photo_name;
                    move_uploaded_file($photo_temp, $upload_photo);
                }

                $updateSQL = "UPDATE ncs_user SET fname='$firstName',lname='$lastName',uname='$userName',upass='$pass',umail='$email',ucontact='$contact',uphoto='$upload_photo' WHERE slug='$id'";
                $updateQuery = $conn->query($updateSQL);
                if ($updateQuery) {
                    header('location:showUser.php');
                } else {
                    echo "Data is not updated";
                }
            }
    }
    ?>
        <!-- User Creation Form Section -->
        <section class="container w-full mx-auto">
            <form class="form-control space-y-6 p-6" action="" method="POST"enctype="multipart/form-data">
                <div class="grid grid-cols-2 items-center justify-center gap-6">
                    <div>
                        <label for="firstName">First Name:</label>
                        <input type="text" name="fname" id="" class="input input-bordered w-full max-w-xs"
                            placeholder="First Name">
                    </div>
                    <div>
                        <label for="lastName">Last Name:</label>
                        <input type="text" name="lname" id=" " class="input input-bordered w-full max-w-xs"
                            placeholder="Last Name">
                    </div>
                    <div>
                        <label for="userName">User Name:</label>
                        <input type="text" name="uname" id="" placeholder="User Name" class="input input-bordered w-full max-w-xs">
                    </div>
                    <div>
                        <label for="password">Password:</label>
                        <input type="password" name="upass" id="" placeholder="password" class="input input-bordered w-full max-w-xs">
                    </div>
                    <div>
                        <label for="email">Email Address:</label>
                        <input type="mail" name="umail" id="" placeholder="Email Address" class="input input-bordered w-full max-w-xs">
                    </div>
                    <div>
                        <label for="contactNo">Contact:</label>
                        <input type="text" name="ucontact" id="" placeholder="Contact No" class="input input-bordered w-full max-w-xs">
                    </div>
                    <div>
                        <label for="inputFile" class="">Select your photo:</label>
                        <input type="file" name="u_photo"
                            class="file-input file-input-bordered file-input-accent pl-0 w-full max-w-xs" />
                    </div>
                    <div>
                        <label for="update">Click on update:</label>
                        <button type="submit" name="submit" id="" class="btn btn-primary w-full max-w-xs">update</button>
                    </div>
                </div>
            </form>
    </body>

    </html>
    <?php
    $conn->close();
}
?>