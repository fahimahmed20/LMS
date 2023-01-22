<?php require_once "header.php";?>
<!-- ========================================================= -->
<div class="content-header">
    <!-- leftside content header -->
    <div class="leftside-content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Dashboard</a></li>
            <li><a href="javascript:avoid(0)">Manage Books</a></li>
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
                        <th>Book Name</th>
                        <th>Book Image</th>
                        <th>Book Author</th>
                        <th>Book Publisher</th>
                        <th>Purchase Date</th>
                        <th>Book price</th>
                        <th>Book Quentity</th>
                        <th>Available Quentity</th>
                        <th class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                            $result = mysqli_query($con,"SELECT * FROM `books` ");                                           
                            while($row = mysqli_fetch_assoc($result)){
                                ?>
                                    <tr>
                                        <td><?= $row['book_name']; ?></td>
                                        <td><img style="height:100px;width:100px;" src="../images/books/<?= $row['book_image']; ?>" alt=""></td>
                                        <td><?= $row['book_author_name'];?></td>
                                        <td><?= $row['book_publication_name'];?></td>
                                        <td><?= $row['book_purchase_date'];?></td>
                                        <td><?= $row['book_price'];?></td>
                                        <td><?= $row['book_qty'];?></td>
                                        <td><?= $row['available_qty'] ?></td>
                                        <td>
                            <a href="javascript:avoid(0)" class="btn btn-info" data-toggle="modal" data-target="#info-<?= $row['id'];?>"><i class="fa fa-eye"></i></a>
                            <a href="javascript:avoid(0)" class="btn btn-warning" data-toggle="modal" data-target="#info-bookUpdate-<?= $row['id'];?>"><i class="fa fa-pencil"></i></a>
                            <a href="delete.php?bookdelete=<?= base64_encode($row['id']); ?>" class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="fa fa-trash-o"></i></a>
                                        </td>
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
<!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
<!-- Modal -->
<?php
$result = mysqli_query($con,"SELECT * FROM `books` ");                                           
while($row = mysqli_fetch_assoc($result)){
    ?>
<div class="modal fade" id="info-<?= $row['id'];?>" tabindex="-1" role="dialog" aria-labelledby="modal-info-label">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header state modal-info">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="modal-info-label"><i class="fa fa-book"></i>Book</h4>
        </div>
        <div class="modal-body">
            <table class="data-table table table-striped">
                <tr>
                    <th>Book Name</th>
                    <td><?= $row['book_name']; ?></td>
                </tr>
                <tr>
                    <th>Book Image</th>
                    <td><img style="height:100px;width:100px;" src="../images/books/<?= $row['book_image']; ?>" alt=""></td>
                </tr>
                <tr>
                    <th>Book Author</th>
                    <td><?= $row['book_author_name'];?></td>
                </tr>
                <tr>
                    <th>Book Publisher</th>
                    <td><?= $row['book_publication_name'];?></td>     
                </tr>
                <tr>
                    <th>Purchase Date</th>
                    <td><?= $row['book_purchase_date'];?></td>
                </tr>
                <tr>
                    <th>Book price</th>
                    <td><?= $row['book_price'];?></td>
                </tr>
                <tr>
                    <th>Book Quentity</th>
                    <td><?= $row['book_qty'];?></td>
                </tr>
                <tr>
                    <th>Available Quentity</th>
                    <td><?= $row['available_qty'] ?></td>
                </tr>
            </table>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-info" data-dismiss="modal">Ok</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
    </div>
</div>
</div>

<!-- //Books Update -->
<div class="modal fade" id="info-bookUpdate-<?= $row['id'];?>" tabindex="-1" role="dialog" aria-labelledby="modal-info-label">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header state modal-info">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="modal-info-label"><i class="fa fa-book"></i>Update Book</h4>
        </div>
        <div class="modal-body">
            <div class="panel">
                        <div class="panel-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
                                    <div class="form-group">
                            <label for="book_name">Book Name</label>
                            <div>
                                <input type="text" class="form-control" id="book_name" name= "book_name" placeholder="Book Name" value="<?= isset($row['book_name']) ? $row['book_name'] : ''?>">

                                <input type="hidden" class="form-control" id="book_id" name= "id" placeholder="Book Name" value="<?= isset($row['id']) ? $row['id'] : ''?>">

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="book_author_name">Book Author Name</label>
                            <div>
                                <input type="text" class="form-control" id="book_author_name" name= "book_author_name" placeholder="Book Author Name" value="<?= isset($row['book_author_name']) ? $row['book_author_name'] : ''?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="book_publication_name">Book Publisher</label>
                            <div>
                                <input type="text" class="form-control" id="book_publication_name" name= "book_publication_name" placeholder="Book Publication Name" value="<?= isset($row['book_publication_name']) ? $row['book_publication_name'] : ''?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="book_purchase_date">Book Purchase Date</label>
                            <div>
                                <input type="date" class="form-control" id="book_purchase_date" name= "book_purchase_date" placeholder="Book Purchase Date" value="<?= isset($row['book_purchase_date']) ? $row['book_purchase_date'] : ''?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="book_price">Book price</label>
                            <div>
                                <input type="text" class="form-control" id="book_price" name= "book_price" placeholder="Book Price" value="<?= isset($row['book_price']) ? $row['book_price'] : ''?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="book_qty">Book Quentity</label>
                            <div>
                                <input type="number" class="form-control" id="book_qty" name= "book_qty" placeholder="Book Quentity" value="<?= isset($row['book_qty']) ? $row['book_qty'] : ''?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="available_qty">Book Quentity Available</label>
                            <div>
                                <input type="number" class="form-control" id="available_qty" name= "available_qty" placeholder="Book Quentity Available" value="<?= isset($row['available_qty']) ? $row['available_qty'] : ''?>">
                            </div>
                        </div>
                                        <div class="form-group">
                                            <button type="submit" name="update_book" class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
        </div>
    </div>
</div>
</div>
<?php
    }
    if(isset($_POST['update_book'])){
        $book_ID = $_POST['id'];
        $book_name = $_POST['book_name'];
        $book_author_name = $_POST['book_author_name'];
        $book_publication_name = $_POST['book_publication_name'];
        $book_purchase_date = $_POST['book_purchase_date'];
        $book_price = $_POST['book_price'];
        $book_qty = $_POST['book_qty'];
        $available_qty = $_POST['available_qty']; 

        $sql = "UPDATE `books` SET `book_name`='$book_name',`book_author_name`='$book_author_name',`book_publication_name`='$book_publication_name',`book_purchase_date`='$book_purchase_date',`book_price`='$book_price',`book_qty`='$book_qty',`available_qty`='$book_qty' WHERE `id` = '$book_ID'";
         $result = mysqli_query($con, $sql);
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
<?php require_once "footer.php";?>