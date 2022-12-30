<?php
    include "../services/database.php";

    # =========== get questions ========== #
    $query = "SELECT * FROM `questions`";
    $stmt = $connect->prepare($query);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $data = array();
    foreach($result as $row){
        $data[] = $row;
    }

    # =========== get options ========== #
    $query = "SELECT * FROM `options`";
    $stmt = $connect->prepare($query);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $options = array();
    foreach($result as $row){
        $options[] = $row;
    }

    # =========== insert options into questions ========== #
    for($i=0; $i<sizeof($options); $i++){
        for($j=0; $j<sizeof($data); $j++){
            if($options[$i]['question_id'] == $data[$j]['question_id']){
                $data[$j]['options'][] = $options[$i]['options'];
            }
        }
    }

    echo json_encode($data);
?>