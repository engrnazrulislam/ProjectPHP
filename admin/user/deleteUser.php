<?php
ob_start();
session_start();
if (isset($_SESSION['login']) != true) {
    header('location:../login.php');
} else {
    include("../dbconn.php");
    if (isset ($_GET['slug'])) {
        $id = $_GET['slug'];
        $sqlSelect="SELECT * FROM ncs_user WHERE slug='$id'";
        $selectQueryResult=$conn->query($sqlSelect);
        $checkQueryResult=$selectQueryResult->num_rows;
        if($checkQueryResult==1){
            $sql="DELETE FROM ncs_user WHERE slug='$id'";
            $delQuery=$conn->query($sql);
            if($delQuery){
                echo "Data is deleted successfully";
                header('location:showUser.php');
            }
            else{
                echo "Data is not deleted";
                header('location: showUser.php');
            }
        }else{
            echo "Data is not founded";
            header('location:showUser.php');
            $conn->close();
        }
    }
}
?>
