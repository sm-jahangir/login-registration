
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

<?php
    $db = new Database();
?>



<div class="row">
    
<div class="col-sm-5">
            
    <!-- Bootstrap chart list -->

    <div class="product-sales-area mg-tb-30">
                <div class="container-fluid">
                        <div class="col-xs-12">
                            <div class="product-sales-chart">
                                <div id="morris-area-chart" style="height: 356px;"></div>
                            </div>
                        </div>
                </div>
            </div>


    <!-- End Chart list -->
</div>

<div class="col-sm-7">

    <div class="create">
        <div class="col-sm-12 ml-5">
            <a href="create.php">Create</a>
        </div>
    </div>
        
        <!-- Right || Student List form Design part! -->
        <?php
        if(isset($_GET['msg'])){
        echo $_GET['msg'];
        }
        ?>

        <!-- For Delete Data -->
        <?php
            if (isset($_REQUEST['delete'])) {
                # code...
                $query = "DELETE FROM tbl_student WHERE id={$_REQUEST['id']}";
                $db->delete($query);

            }
        

        ?>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Department</th>
                    <th>Age</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $query = "SELECT * FROM tbl_student";
            $post = $db->select($query);

            if($post){
                $i = 0;
                while($result = $post->fetch_assoc()){
                    $i++;

            ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $result['name'] ?></td>
                    <td><?php echo $result['department']?></td>
                    <td><?php echo $result['age'] ?></td>
                    <td>
                        <a class="btn btn-success" href="update.php?id=<?php echo $result['id'] ?>">Edit</a>
                    </td> 
                    <td>
                        <form action="" method="post">
                                <input type="hidden" name="id" value="<?php echo $result['id'] ?>">
                                <input type="submit" value="Delete" name="delete" class="btn btn-danger">
                        </form>
                    </td>
                </tr>
                <?php
                        }
                    }
                    ?>
            </tbody>
        </table>



        <!-- Fron Design part! -->

    </div>


</div>






<!-- JAVASCRIPT -->
<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/all.min.js"></script>



    <!-- morrisjs JS
		============================================ -->
    <script src="js/morrisjs/raphael-min.js"></script>
    <script src="js/morrisjs/morris.js"></script>
    <script src="js/morrisjs/morris-active.js"></script>


</body>
</html>