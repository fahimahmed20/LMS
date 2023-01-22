<?php require_once "header.php";

if(isset($_POST['issue_student_book'])){
    //print_r($_POST);
    $student_id = $_POST['student_id'];
    $book_id = $_POST['book_id'];
    $issue_date = $_POST['issue_date'];

    $sql = "INSERT INTO `issue_book`(`student_id`, `book_id`, `book_issue_date`) VALUES ('$student_id','$book_id','$issue_date')";
    $result = mysqli_query($con,$sql);
    if($result){
        $issue_success = "Book issued successfully";
    }

}

?>
<!-- ========================================================= -->
<div class="content-header">
    <!-- leftside content header -->
    <div class="leftside-content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Dashboard</a></li>
            <li><a href="javascript:avoid(0)">Issue Books</a></li>
        </ul>
    </div>
</div>
<!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
<div class="row animated fadeInUp">
    <div class="col-sm-6 col-sm-offset-3">
        <div class="panel">
            <div class="panel-content">
                <div class="row">
                    <div class="col-md-12">
                        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                            <h5 class="mb-md ">Issue Book</h5>
                            <?php
                            if(isset($issue_success)){
                                ?>
                                <div class="alert alert-success" role="alert">
                                    <span style="color: #fff;"><?= $issue_success; ?></span>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true" style="color: #fff;">&times;</span>
                                    </button>
                                </div>
                                <?php
                            }
                            ?>
                            <div class="form-group">
                                <select name="search" class="form-control">
                                    <option value="select">Select</option>
                                    <?php
                                        $result = mysqli_query($con,"SELECT * FROM `students` ");                                           
                                        while($row = mysqli_fetch_assoc($result)){
                                    ?>
                                    <option value="<?= $row['id'] ?>"><?= $row['fname']. ' ' . $row['lname'] . ' (' . $row['roll'] . ')' ;?></option>
                                    <?php 
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary" style="width: 100%;" name="student_search">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
                <?php
                    if(isset($_POST['student_search'])){
                        $id = $_POST['search'];
                        $result = mysqli_query($con,"SELECT * FROM `students` WHERE `id` = '$id' AND `status` = '1'");                                           
                        while($row = mysqli_fetch_assoc($result)){
                            ?>
                            <div class="panel">
                                <div class="panel-content">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
                                                <h5 class="mb-md ">Issue Book to Student</h5>
                                                <div class="form-group">
                                                    <label for="email">Student Name</label>
                                                    <input type="text" class="form-control" name="Student_name" value="<?= $row['fname']. ' ' . $row['lname'] ;?>" readonly>
                                                    <input type="hidden" name="student_id" value="<?= $row['id']; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <select name="book_id" class="form-control">
                                                        <option value="select">Select</option>
                                                        <?php
                                                        $result = mysqli_query($con,"SELECT * FROM `books` WHERE `available_qty` > 0");                                           
                                                        while($row = mysqli_fetch_assoc($result)){
                                                            ?>
                                                                <option value="<?= $row['id']; ?>"><?= $row['book_name']; ?></option>
                                                            <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">Book issue date</label>
                                                    <input type="text" class="form-control" name="issue_date" value="<?= date('d,m,Y');?>" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary" name="issue_student_book">Issue Book</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    }
                ?>
            </div>
        </div>
    </div>
</div>
<!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
<?php require_once "footer.php";?>