<?php $active = "Students"; ?>
<?php include("./addons/header.php"); ?>
<?php

if (!isset($_GET["id"])) :
    header("location: ./index.php");
else :
    $id = $_GET["id"];

    $query = "SELECT * FROM student WHERE S_ID = ?";
    $result = $connect->prepare($query);
    $result->execute([$id]);

    $row = $result->fetch();
    extract($row);

endif;

?>
<!-- PAGE CONTENT-->
<div class="page-content--bgf7">
    <!-- BREADCRUMB-->
    <section class="au-breadcrumb2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="au-breadcrumb-content">
                        <div class="au-breadcrumb-left">
                            <ul class="list-unstyled list-inline au-breadcrumb__list">
                                <li class="list-inline-item">Home</li>
                                <li class="list-inline-item">/</li>
                                <li class="list-inline-item">Update Student</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END BREADCRUMB-->

    <!-- DATA TABLE-->
    <section class="p-t-20">
        <div class="container">
            <div class="row">
                <div class="col-md-12 p-l-10 p-r-10">
                    <div class="row">
                        <div class="col-sm-12 col-md-8 col-lg-6 mx-auto bg-white rounded shadow p-3">
                            <h3 class="title-5 m-b-20">Student</h3>
                            <form class="">
                                <div class="form-group">
                                    <label for="">Fullname</label>
                                    <input type="text" class="form-control" value="<?= $S_Name; ?>" id="fullname">
                                    <input type="hidden" value="<?= $T_ID; ?>" id="tID">
                                    <input type="hidden" value="<?= $id; ?>" id="sID">
                                </div>
                                <div class="form-group">
                                    <label for="">Contact</label>
                                    <input type="tel" class="form-control" value="<?= $Contact; ?>" id="contact">
                                </div>
                                <div class="form-group">
                                    <label for="">School</label>
                                    <input type="text" class="form-control" value="<?= $School; ?>" id="school">
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-primary" id="submit">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END DATA TABLE-->
    <script src="./js/actions/update.js"></script>
    <?php include("./addons/footer.php"); ?>