<?php 
require_once "header.php";
?>



<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1 class="mb-5">Insert Your Data</h1>

            <?php 
                $id = $_GET['id'];
                $sql = "SELECT * FROM students WHERE id = {$id}";
                $result = $conn->query($sql);
                $row = $result->fetch(PDO::FETCH_ASSOC);
               

            
            ?>
            <?php

                if(isset($_REQUEST['update'])){
                    if(($_POST['name'] == '') || ($_POST['roll'] == '') || ($_POST['email'] =='')){
                        echo "All Field are required";
                    }else{
                        $name = $_POST['name'];
                        $roll = $_POST['roll'];
                        $email = $_POST['email'];

                        $sql = "UPDATE students SET name='$name', roll='$roll', email = '$email' WHERE id = {$id}";

                        if($conn->exec($sql)){
                            echo "Recored Update Successfull";
                        }
                        $conn = null;
                    }
                }

            ?>
             <div class="mb-5"></div>
            <form action="" method="POST">
                <div class="form-group">
                    <input name="name" type="text" class="form-control" value="<?php echo $row['name'];?>">
                </div>
                <div class="form-group">
                    <input name="roll" type="text" class="form-control" value="<?php echo $row['roll'];?>">
                </div>
                <div class="form-group">
                    <input name="email" type="email" class="form-control" value="<?php echo $row['email'];?>">
                </div>
                <div class="form-group">
                    <input name="update" type="submit" class="form-control btn-success" placeholder="Your Email">
                </div>
            </form>
        </div>
    </div>
</div>


<?php 
require_once "footer.php";
?>

