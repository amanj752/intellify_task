<?php

include("./config/index.php");

if (isset($_GET["id"])) :
    $id = $_GET["id"];

    try {
        $query = "DELETE FROM `student` WHERE `S_ID` = ?";
        $result = $connect->prepare($query);
        $result->execute([$id]);

        if ($result) :
            header("location: ../index.php?alert=del_s");
        endif;
    } catch (PDOException $e) {
        print_r($e);
    }
else :
    header("location: ../index.php");
endif;
