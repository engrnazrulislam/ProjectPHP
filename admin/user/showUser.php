<?php
ob_start();
session_start();
if (isset ($_SESSION['login']) != true) {
    header('location:../login.php');
} else {
    include ("../dbconn.php");
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
                        <th>Name</th>
                        <th>User Name</th>
                        <th>Password</th>
                        <th>Email</th>
                        <th>Contact</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="bg-transparent">
                    <?php
                    while ($queryResult = $selectQuery->fetch_assoc()) {
                        ?>
                        <tr class="border-blue-200">
                            <td>
                                <?php echo $i; ?>
                            </td>
                            <td>
                                <img class="w-[100px]" src="<?php echo $queryResult['uphoto']; ?>" alt="" srcset="">
                            </td>
                            <td class="w-52">
                                <?php echo $queryResult['fname'] . ' ' . $queryResult['lname']; ?>
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
                            <td class="flex justify-center items-center gap-4 mt-5">
                                <a href="editUser.php?slug=<?php echo $queryResult['slug']; ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-4"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#0366fc" d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"/></svg>
                            </a>
                                <a href="deleteUser.php?slug=<?php echo $queryResult['slug']; ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-4"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#fc0703" d="M163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3C140.6 6.8 151.7 0 163.8 0zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm192 64c-6.4 0-12.5 2.5-17 7l-80 80c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l39-39V408c0 13.3 10.7 24 24 24s24-10.7 24-24V273.9l39 39c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-80-80c-4.5-4.5-10.6-7-17-7z"/></svg>
                            </a>
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
    $conn->close();
}
?>