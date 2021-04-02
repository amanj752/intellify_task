<?php

include("./config/index.php");

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

if ($_SERVER["REQUEST_METHOD"] === "POST") :
    if (isset($_POST['submit'])) :
        $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);
        extract($POST);

        try {
            $query = "UPDATE `student` SET `T_ID`= :tID, `S_Name`= :fullname, `S_Contact`= :contact, `School`= :school WHERE `S_ID` = :sID";
            $result = $connect->prepare($query);
            $result->execute([
                "tID" => $tID,
                "fullname" => $fullname,
                "contact" => $contact,
                "school" => $school,
                "sID" => $sID
            ]);

            if (!$result) {
                throw new Exception("Error");
                exit();
            }
            $response = [
                "status" => 200,
                "message" => "Student Updated!",
                "error" => null
            ];
            echo json_encode($response);
        } catch (PDOException $e) {
            $response = [
                "status" => 500,
                "error" => $e,
                "message" => null
            ];

            echo json_encode($response);
        }
    endif;
endif;
