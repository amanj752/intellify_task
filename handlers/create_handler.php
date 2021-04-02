<?php

include("./config/index.php");

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

if ($_SERVER["REQUEST_METHOD"] === "POST") :
    if (isset($_POST['submit'])) :
        $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);

        extract($POST);

        $prefix = ['A', 'B', 'C', 'D', 'E'];
        $suffix = rand(10000, 999999);

        $id = $prefix[rand(0, 4)] . $prefix[rand(0, 4)] . $suffix;

        try {
            $query = "INSERT INTO `student`(`S_ID`, `T_ID`, `S_Name`, `S_Contact`, `School`) 
            VALUES (:studentID, :tID, :fullname, :contact, :school)";
            $result = $connect->prepare($query);
            $result->execute([
                "studentID" => $id,
                "tID" => $tID,
                "fullname" => $fullname,
                "contact" => $contact,
                "school" => $school
            ]);

            if (!$result) {
                throw new Exception("Error");
                exit();
            }
            $response = [
                "status" => 201,
                "message" => "Student Added!",
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
