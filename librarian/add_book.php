<?php require_once "header.php";

if(isset($_POST['submit_book'])){
    $book_name = $_POST['book_name'];
    $book_author_name = $_POST['book_author_name'];
    $book_publication_name = $_POST['book_publication_name'];
    $book_purchase_date = $_POST['book_purchase_date'];
    $book_price = $_POST['book_price'];
    $book_qty = $_POST['book_qty'];
    $available_qty = $_POST['available_qty'];
    $libraian_username = $_SESSION['libraian_username'];

    $images = explode('.', $_FILES['book_image']['name']);
    $image_extention = end($images);
    $image = date('Ymdhis.').$image_extention;
    
    $result = mysqli_query($con, "INSERT INTO `books`(`book_name`,`book_image`, `book_author_name`, `book_publication_name`, `book_purchase_date`, `book_price`, `book_qty`, `available_qty`,`libraian_username`) VALUES ('$book_name','$image','$book_author_name','$book_publication_name','$book_purchase_date','$book_price','$book_qty','$available_qty','$libraian_username')");
    if($result){
        move_uploaded_file($_FILES['book_image']['tmp_name'], '../images/books/'.$image);
        $add_book_sucess = "Book added sucessfully";
    }else{
        $add_book_err = "Faild to added Book";
    }
}


?>

<!-- ========================================================= -->
<div class="content-header">
    <!-- leftside content header -->
    <div class="leftside-content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Dashboard</a></li>
            <li><a href="javascript:avoid(0)">Add Books</a></li>
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
                <?php
                if(isset($add_book_sucess)){
                    ?>
                    <div class="alert alert-success" role="alert">
                        <span style="color: #fff;font-size:16px;line-heigh:18px;"><?= $add_book_sucess; ?></span>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true" style="color: #fff;">&times;</span>
                        </button>
                    </div>
                    <?php
                }
                if(isset($add_book_err)){
                    ?>
                    <div class="alert alert-danger" role="alert">
                        <span style="color: #fff;"><?= $add_book_err; ?></span>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true" style="color: #fff;">&times;</span>
                        </button>
                    </div>
                    <?php
                }
            ?>
                    <form class="form-horizontal" method="post" action="<?php $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">
                        <h5 class="mb-lg">Add New Books</h5>
                        <div class="form-group">
                            <label for="book_name" class="col-sm-4 control-label">Book Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="book_name" name= "book_name" placeholder="Book Name" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="book_image" class="col-sm-4 control-label">Book Image</label>
                            <div class="col-sm-8">
                                <input type="file" id="book_image" name= "book_image">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="book_author_name" class="col-sm-4 control-label">Book Author Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="book_author_name" name= "book_author_name" placeholder="Book Author Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="book_publication_name" class="col-sm-4 control-label">Book Publisher</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="book_publication_name" name= "book_publication_name" placeholder="Book Publication Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="book_purchase_date" class="col-sm-4 control-label">Book Purchase Date</label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control" id="book_purchase_date" name= "book_purchase_date" placeholder="Book Purchase Date">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="book_price" class="col-sm-4 control-label">Book price</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="book_price" name= "book_price" placeholder="Book Price">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="book_qty" class="col-sm-4 control-label">Book Quentity</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="book_qty" name= "book_qty" placeholder="Book Quentity">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="available_qty" class="col-sm-4 control-label">Book Quentity Available</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="available_qty" name= "available_qty" placeholder="Book Quentity Available">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-4">
                                <button type="submit" name="submit_book" class="btn btn-primary">Add Book</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
<!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
<?php require_once "footer.php";?>