<?php $active = ""; ?>
<?php include("./addons/header.php"); ?>

<?php
$query = "SELECT * FROM student";
$result = $connect->prepare($query);
$result->execute();

$rows = $result->fetchAll();
$nos = count($rows);

$sql = "SELECT * FROM teacher";
$result_sql = $connect->prepare($sql);
$result_sql->execute();

$not = $result_sql->rowCount();
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
                                <li class="list-inline-item">Dashboard</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END BREADCRUMB-->

    <!-- WELCOME-->
    <section class="welcome p-t-10">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="title-4">Welcome back:
                        <span class="text-secondary"><?= $Name; ?></span>
                    </h1>
                    <hr class="line-seprate">
                </div>
            </div>
        </div>
    </section>
    <!-- END WELCOME-->

    <!-- STATISTIC-->
    <section class="statistic statistic2">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-3">
                    <div class="statistic__item statistic__item--green">
                        <h2 class="number"><?= $nos; ?></h2>
                        <span class="desc">No of Students</span>
                        <div class="icon">
                            <i class="zmdi zmdi-users-o"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="statistic__item statistic__item--orange">
                        <h2 class="number"><?= $not; ?></h2>
                        <span class="desc">No of Teachers</span>
                        <div class="icon">
                            <i class="zmdi zmdi-account-o"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END STATISTIC-->

    <!-- DATA TABLE-->
    <section class="p-t-20">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="title-5 m-b-35">data table</h3>
                    <div class="table-data__tool">
                        <div class="table-data__tool-left"></div>
                        <div class="table-data__tool-right"></div>
                    </div>
                    <div class="table-responsive table-responsive-data2">
                        <?php if (!empty($rows)) : $x = 1; ?>
                            <table class="table table-data2">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Fullname</th>
                                        <th>Contact</th>
                                        <th>School</th>
                                        <th>date</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($rows as $row) : extract($row); ?>
                                        <tr class="tr-shadow">
                                            <td><?= $x; ?></td>
                                            <td><?= $S_Name; ?></td>
                                            <td class="desc"><?= $S_Contact; ?></td>
                                            <td><?= $School; ?></td>
                                            <td><?= date("j m Y h:i:s", strtotime($Date_Time)); ?></td>
                                            <td>
                                                <div class="table-data-feature">
                                                    <a href="./update_students.php?id=<?= $S_ID; ?>" class="bg-primary item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                        <i class="zmdi text-white zmdi-edit"></i>
                                                    </a>
                                                    <a href="./handlers/delete_handler.php?id=<?= $S_ID; ?>" class="bg-danger item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                        <i class="zmdi text-white zmdi-delete"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="spacer"></tr>
                                        <?php $x++; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php else : ?>
                            <h2 class="text-muted text-center py-3">Empty!</h2>
                        <?php endif;  ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END DATA TABLE-->
    <?php include("./addons/footer.php"); ?>