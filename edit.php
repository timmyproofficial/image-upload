<?php 

include('templates/db_config.php');

$id = isset($_GET['id']) ? $_GET['id'] : '';

$sql = "SELECT * FROM profiles WHERE id='".$id."'";

$query = mysqli_query($conn, $sql) or die(mysqli_error($conn));

$staff_row = mysqli_fetch_assoc($query);

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $pic_name = $_FILES['picture']['name'];

    $pic_tmp_name = $_FILES['picture']['tmp_name'];



    $staff_id = $_POST['id'];

    $first_name = $_POST['first_name'];

    $last_name = $_POST['last_name'];

    $role = $_POST['role'];

    $picture = $pic_name;



    $sql = "UPDATE profiles
            SET
                first_name='".$first_name."', 
                last_name='".$last_name."', 
                role='".$role."', 
                picture='".$picture."'
            WHERE
                id='".$staff_id."'";


    $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));


    if($query)
    {
        move_uploaded_file($pic_tmp_name, "images/$pic_name");

        header('Location: profiles.php');
    }


}

include('templates/head.php'); 


?>


<body>
    
    <?php include('templates/header.php'); ?>


        <section id="form">

            <div class="container">

                <div id="f01">

                    <form method = "POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">

                        <input type="text" id="id" name="id" value="<?php echo $staff_row['id']; ?>">

                        <label for="fname">First Name</label>

                        <input type="text" id="fname" name="first_name" placeholder="First Name" value="<?php echo $staff_row['first_name']; ?>">




                        <label for="lname">Last Name</label>

                        <input type="text" id="lname" name="last_name" placeholder="Last Name" value="<?php echo $staff_row['last_name']; ?>">




                        <label for="role">Role</label>

                        <input type="text" id="role" name="role" placeholder="Role" value="<?php echo $staff_row['role']; ?>">



                        <input type="file" name="picture">



                        <input type="submit" name="submit" value="Update">


                    </form>

                </div>

            </div>

        </section>

    <?php include('templates/footer.php'); ?>
    
</body>
</html>