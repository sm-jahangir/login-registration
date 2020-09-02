
<?php include('inc/Database.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- FONT AWESOME CSS -->
    <link rel="stylesheet" href="css/all.min.css">

    <!-- STYLE FILE OR CUSTOM CSS -->
    <link rel="stylesheet" href="css/style.css">
    <title>Demo Bootstrap || Fontawesome || jQuery</title>
</head>
<body>
    <!-- MenuBar -->

    <nav class="navbar navbar-expand-sm navbar-light bg-light">
        <a class="navbar-brand" href="index.php">Login Registration</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Students.php">Student</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="#">Teacher</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Profile</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Class</a>
                    <div class="dropdown-menu" aria-labelledby="dropdownId">
                        <a class="dropdown-item" href="#">Action 1</a>
                        <a class="dropdown-item" href="#">Action 2</a>
                    </div>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>
    <!-- Menubar End here -->

<!-- Form code here -->
<?php
$db = new Database();
?>

<?php
    $id = $_GET['id'];
    $query = "SELECT * FROM tbl_student WHERE id=$id";
    $getData = $db->select($query)->fetch_assoc();

?>

<?php

if (isset($_REQUEST['update'])) {
    # code...
    if (($_REQUEST['name'] == "") || ($_REQUEST['department'] == "") || ($_REQUEST['age'] == "")) {
        # code...
        echo "All field is required";
    }else{
        $name = $_REQUEST['name'];
        $dep  = $_REQUEST['department'];
        $age  = $_REQUEST['age'];

        $query = "UPDATE tbl_student 
        SET
        name        = '$name',
        department  = '$dep',
        age         = '$age'
        WHERE id=$id";
        $update = $db->update($query);
    }
}


?>




<form action="" method="post">
    <div class="col-sm-8 m-auto">
            
        <div class="form-group">
            <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="<?php echo $getData['name'] ?>">
        </div>
        <div class="form-group">
            <label for="department">Department</label>
                <input type="text" name="department" id="department" class="form-control" value="<?php echo $getData['department'] ?>">
        </div>
        <div class="form-group">
            <label for="age">Age</label>
                <input type="number" min='15' max='50' name="age" id="age" class="form-control" value="<?php echo $getData['age'] ?>">
        </div>

        <button name="update" type="submit" class="btn btn-primary">Update</button>
    </div>
    
</form>

<!-- form code end here -->



<!-- JAVASCRIPT -->
<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/all.min.js"></script>




</body>
</html>
