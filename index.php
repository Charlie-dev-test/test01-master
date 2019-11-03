<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php include_once 'tree.php';
drawList();

function drawList($trigger = 0, $id = 0){
    global $data;
    //выводим список первого порядка
    if($trigger == 0){
        echo '<ul>';
        foreach ($data as $item=>$value){
            if($value['PARENT_ID'] == 0){
                echo '<li>' .  $value['NAME'] . '</li>';
                //ищем есть ли дочерние, если есть выводим списком.
                drawList(1, $value['ID']);
            }
        }
        echo '</ul>';
    }
    if($trigger == 1){
        echo '<ul>';
        foreach ($data as $key=>$i){
            if($id == $i['PARENT_ID']){
                echo '<li>' . $i['NAME'] . '</li>';
                //если есть дочерние выводим списком.
                drawList(1, $i['ID']);
            }
        }
        echo '</ul>';
    }

}
?>
</body>
</html>

