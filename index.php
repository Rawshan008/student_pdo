<?php 
    include_once "header.php";
?>
  
  <?php 
        $sql = "SELECT * FROM students";
        $result = $conn->query($sql);
  ?>
    
    <div class="container mt-4 mb-4">
        <div class="row">
            <div class="col-md-12">
            <h1 class="mt-4 mb-4">All students</h1>
                <?php 
                    if(isset($_REQUEST['delete'])){
                    if($_POST['id']){
                        $sql = "DELETE FROM students WHERE id={$_POST['id']}";
                        if($conn->exec($sql)){
                            echo "Delete Successfullt";
                        }
                        $conn = null;
                    }
                }
                ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Roll</th>
                            <th>Email</th>
                            <th>Edit</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  while($row = $result->fetch(PDO::FETCH_ASSOC)): ?>
                        <tr>
                            <td><?php echo $row['id'];?></td>
                            <td><?php echo $row['name'];?></td>
                            <td><?php echo $row['roll'];?></td>
                            <td><?php echo $row['email'];?></td>
                            <td><a href="update.php?id=<?php echo $row['id'];?>" class="btn btn-success">edit</a></td>
                            <td>
                                <form method="POST">
                                    <input type="hidden" name="id" value="<?php echo $row['id'];?>">
                                    <input type="submit" name="delete" class="btn btn-danger" value="Delete">
                                </form>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php 
require_once "footer.php";
?>