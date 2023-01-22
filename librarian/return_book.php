<?php require_once "header.php";?>
<!-- ========================================================= -->
<div class="content-header">
    <!-- leftside content header -->
    <div class="leftside-content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
            <li><a href="javascript:avoid(0)">Return Book</a></li>
        </ul>
    </div>
</div>
<!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
<div class="row animated fadeInUp">
    <div class="col-sm-12">
    <h4 class="section-subtitle"><b>All Students</b></h4>
    <div class="panel">
        <div class="panel-content">
            <div class="table-responsive">
                <table id="basic-table" class="data-table table table-striped nowrap table-hover" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>Full Name</th>
                        <th>Roll</th>
                        <th>Phone</th>
                        <th>Book Name</th>
                        <th>Book issue date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql = "SELECT `issue_book`.`id`,`issue_book`.`book_issue_date`,`students`.`fname`,`students`.`lname`,`students`.`roll`,`students`.`phone`,`books`.`book_name`,`books`.`book_image`
                            FROM `issue_book`
                            INNER JOIN `students` ON `students`.`id` = `issue_book`.`student_id`
                            INNER JOIN `books` ON `books`.`id` = `issue_book`.`book_id`
                            WHERE `issue_book`.`book_return_date` = ''";
                            $result = mysqli_query($con,"$sql ");                                           
                            while($row = mysqli_fetch_assoc($result)){
                                ?>
                                    <tr>
                                        <td><?= $row['fname']. ' ' . $row['lname'] ;?></td>
                                        <td><?= $row['roll'];?></td>
                                        <td><?= $row['phone'];?></td>
                                        <td><?= $row['book_name'];?></td>
                                        <td><?= $row['book_issue_date'];?></td>
                                        <td><a href="return_book.php?id=<?= $row['id']?>">Return Book</a></td>
                                    </tr>
                                <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    </div>
</div>
<?php
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $date = date('d-m-y');
            $sql = "UPDATE `issue_book` SET `book_return_date`='$date' WHERE `id` = '$id'";
            $result = mysqli_query($con,$sql);
            if($result){
                ?>
                <script type="text/javascript">
                    alert('Book return succesfully');
                    javascript:history.go(-1);
                </script>
                <?php
            }else{
                ?>
                <script type="text/javascript">
                    alert('Something wrong!');
                </script>
                <?php
            }
        }
    ?>
<!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
<?php require_once "footer.php";?>