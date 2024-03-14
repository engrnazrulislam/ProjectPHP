<?php
if(isset($_SESSION['login'])!= true){
    header("location:login.php");
}else{
?>
<nav class="shadow-lg">
    <div class="navbar bg-base-100">
        <div class="navbar-start">
            <h1 class="text-amber-400 text-2xl font-bold">Dashboard</h1>
        </div>
        <div class="navbar-end space-x-4">
            <div>
                <h3>
                    <?php echo $_SESSION['username'] ?>
                </h3>
            </div>
            <div class="dropdown dropdown-end">
                <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
                    <div class="w-10 rounded-full">
                        <img alt="Tailwind CSS Navbar component"
                            src="https://daisyui.com/images/stock/photo-1534528741775-53994a69daeb.jpg" />
                    </div>
                </div>
                <ul tabindex="0"
                    class="mt-3 z-[1] p-2 shadow menu menu-sm dropdown-content bg-base-100 text-black rounded-box w-[100px]">
                    <li><a>Profile</a></li>
                    <li><a>Settings</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<?php
}
?>