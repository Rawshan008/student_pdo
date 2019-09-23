<?php 
require_once "header.php";
?>



<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1 class="mb-5">Insert Your Data</h1>
            <?php 

                if(isset($_REQUEST['insert'])){
                    if(($_POST['name'] == '') || ($_POST['roll'] == '') || ($_POST['email'] =='')){
                        echo "All Field are required";
                    }else{
                        $name = $_POST['name'];
                        $roll = $_POST['roll'];
                        $email = $_POST['email'];

                        $sql = "INSERT INTO students(name, roll, email) VALUE('$name', '$roll', '$email')";

                        if($conn->exec($sql)){
                            echo "Recored Successfull";
                        }
                        $conn = null;
                    }
                }

            ?>
             <div class="mb-5"></div>
            <form action="" method="POST">
                <div class="form-group">
                    <input name="name" type="text" class="form-control" placeholder="Your Name">
                </div>
                <div class="form-group">
                    <input name="roll" type="text" class="form-control" placeholder="Your Roll">
                </div>
                <div class="form-group">
                    <input name="email" type="email" class="form-control" placeholder="Your Email">
                </div>
                <div class="form-group">
                    <input name="insert" type="submit" class="form-control btn-success" placeholder="Your Email">
                </div>
            </form>
        </div>
    </div>
</div>


<?php 
require_once "footer.php";
?>

