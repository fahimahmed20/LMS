<?php require_once "header.php";?>
<!-- ========================================================= -->
<div class="content-header">
    <!-- leftside content header -->
    <div class="leftside-content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
            <li><a href="javascript:avoid(0)">Students</a></li>
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
                        <th>Roll No</th>
                        <th>Reg No</th>
                        <th>Email</th>
                        <th>UserName</th>
                        <th>Phone</th>
                        <th>Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                            $result = mysqli_query($con,"SELECT * FROM `students` ");                                           
                            while($row = mysqli_fetch_assoc($result)){
                                ?>
                                    <tr>
                                        <td><?= $row['fname']. ' ' . $row['lname'] ;?></td>
                                        <td><?= $row['roll'];?></td>
                                        <td><?= $row['reg'];?></td>
                                        <td><?= $row['email'];?></td>
                                        <td><?= $row['username'];?></td>
                                        <td><?= $row['phone'];?></td>
                                        <td><?= $row['status'] == 0 ? 'Inactive' : 'Active'?></td>
                                        <td class="text-center">
                                            <?php 
                                                if($row['status'] == 1){
                                                    ?>
                                                    <a href="statusinactive.php?id=<?= base64_encode($row['id']) ?>" class="btn btn-primary"><i class="fa fa-arrow-down"></i></a>
                                                    <?php
                                                }else{
                                                    ?>
                                                    <a href="statusactive.php?id=<?= base64_encode($row['id']) ?>" class="btn btn-danger"><i class="fa fa-arrow-up"></i></a>
                                                    <?php
                                                }
                                            ?>
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
<?php require_once "footer.php";?>