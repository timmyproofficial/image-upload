<?php 

include('templates/db_config.php');


if(isset($_GET['delete'])){

    $id = $_GET['delete'];

    $sql = "DELETE FROM profiles WHERE id='".$id."'";

    $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
}




$sql = "SELECT * FROM profiles";

$query = mysqli_query($conn, $sql) or die(mysqli_error($conn));



include('templates/head.php'); 


?>


<body>
    
    <?php include('templates/header.php'); ?>


        <section id="profiles">

            <div class="container">

                <h1>Our Staffs</h1>
                
                <div id="btn-new">

                    <button><a href="create.php">Create New</a></button>
                
                </div>

                <?php while($staff_row = mysqli_fetch_assoc($query)): ?>

                <div class="profile">

                    <img src="images/<?php echo $staff_row['picture']; ?>">

                    <div class="info">

                        <h3>First Name: <?php echo $staff_row['first_name']; ?> </h3>

                        <h3>Last Name: <?php echo $staff_row['last_name']; ?></h3>

                        <h3>Role: <?php echo $staff_row['role']; ?></h3>

                        <button id="btn-delete"><a href="profiles.php?delete=<?php echo $staff_row['id']; ?>">Delete</a></button>

                        <button id="btn-edit"><a href="edit.php?id=<?php echo $staff_row['id'] ?>">Edit</a></button>

                    </div>

                </div>

                <?php endwhile; ?>

            </div>

        </section>

    <?php include('templates/footer.php'); ?>
    
</body>
</html>