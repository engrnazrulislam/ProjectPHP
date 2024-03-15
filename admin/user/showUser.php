<?php
ob_start();
session_start();
if (isset($_SESSION['login']) != true) {
    header('location:../login.php');
} else {
    include("../dbconn.php");
    $sql = "SELECT * FROM ncs_user ORDER BY uid DESC";
    $selectQuery = $conn->query($sql);
    $i = 1;
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Display Users</title>
        <link href="https://cdn.jsdelivr.net/npm/daisyui@4.7.3/dist/full.min.css" rel="stylesheet" type="text/css" />
        <script src="https://cdn.tailwindcss.com"></script>
    </head>

    <body>
        <!-- User Display Section  -->
        <section class="container w-full mx-auto overflow-x-auto">
            <table class="table ">
                <thead class="bg-sky-400">
                <tr>
                    <th>S/N</th>
                    <th>Photo</th>
                    <th class="w-52">Name</th>
                    <th>User Name</th>
                    <th>Password</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody class="bg-sky-100">
                <?php
                while ($queryResult = $selectQuery->fetch_assoc()) {
                    ?>
                    <tr>
                        <td>
                            <?php echo $i; ?>
                        </td>
                        <td>
                            <img class="w-[100px]" 
                            src="<?php echo $queryResult['uphoto'];?>" alt="" srcset="">
                        </td>
                        <td class="w-52">
                            <?php echo $queryResult['fname'].' '.$queryResult['lname']; ?>
                        </td>
                        <td>
                            <?php echo $queryResult['uname']; ?>
                        </td>
                        <td>
                            <?php echo $queryResult['upass']; ?>
                        </td>
                        <td>
                            <?php echo $queryResult['umail']; ?>
                        </td>
                        <td>
                            <?php echo $queryResult['ucontact']; ?>
                        </td>
                        <td>
                            <a href="editUser.php?slug=<?php echo $queryResult['slug'];?>">Edit</a>
                            <a href="deleteUser.php?slug=<?php echo $queryResult['slug'];?>">Delete</a>
                        </td>
                    </tr>
                    <?php
                    $i++;
                }
                ?>
            </tbody>
            </table>
        </section>
    </body>

    </html>
    <?php
}
?>