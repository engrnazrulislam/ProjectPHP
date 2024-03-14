<?php
// include("../dbconn.php");
//$sql="INSERT INTO ncs_user(uname,upass,umail,ucontact,uphoto) VALUES";
//$query=$conn->query($sql);
//$result=$query->fetch_assoc();
//echo $result['uname'];
//echo $result['upass'];
// $conn->close();
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
        <section>
            <form action=""method="POST">
                <div class="flex justify-start items-center gap-5">
                    <div>
                        <label for="firstName">First Name:</label>
                        <input type="text" name="firstName" id="" class="input input-bordered w-full max-w-xs">
                    </div>
                    <div>
                        <label for="lastName">Last Name:</label>
                        <input type="text" name="lastName" id=" " class="input input-bordered w-full max-w-sx">
                    </div>
                </div>
            </form>
        </section>
    </main>
</body>

</html>