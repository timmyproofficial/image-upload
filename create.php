<?php 

include('templates/db_config.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $pic_name = $_FILES['picture']['name'];

    $pic_tmp_name = $_FILES['picture']['tmp_name'];



    $first_name = $_POST['first_name'];

    $last_name = $_POST['last_name'];

    $role = $_POST['role'];

    $picture = $pic_name;



    $sql = "INSERT INTO profiles
            (
                first_name, 
                last_name, 
                role, 
                picture
            ) 
            VALUES
            (
                '".$first_name."', 
                '".$last_name."', 
                '".$role."', 
                '".$picture."'
            )";


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

                        <label for="fname">First Name</label>

                        <input type="text" id="fname" name="first_name" placeholder="First Name">




                        <label for="lname">Last Name</label>

                        <input type="text" id="lname" name="last_name" placeholder="Last Name">




                        <label for="role">Role</label>

                        <input type="text" id="role" name="role" placeholder="Role">



                        <input type="file" name="picture">



                        <input type="submit" name="submit" value="Submit">


                    </form>

                </div>

            </div>

        </section>

    <?php include('templates/footer.php'); ?>
    
</body>
</html>