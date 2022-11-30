<?php


function printLi($url , $name , $icon ,  $two = false){

    $str = '';

    if (checkAdmin() or $two) {
        $link = URL . $url;
        $str =     "<li class='nav-item'>
        <a href='{$link}' class='nav-link '>
          <i class='{$icon} mr-2'> </i>
          <p>{$name}</p>
        </a>
      </li>";
    }
    return $str;


}


function checkAdmin(){
    return $_SESSION['user']['type'] == 1;
}

function getUserType($type): string
{
    if ($type == 1 )
        return "Admin";
    else if ($type == 0 )
        return "User";
    else if ($type == 2 )
        return "Client";
    else
        return "Undefined";
}

function showErrors($errors){
    $str = '';
    if ($errors) {
        $str = '<div class="row col-8 mx-auto">';
        foreach ($errors['error'] as $error) {
            $str .= "<div class='alert alert-danger w-100' role='alert'>{$error}</div>";
        }
        $str .= '</div>';
    }
    return $str;
}

function validate($fields , $data): array
{
    $errors= [];
    foreach ($fields as $item) {
        $temp = (!isset($data[$item]) or $data[$item] == null or $data[$item] == [] )? 'field ' . $item . ' is required' : null;

        if ($temp)
            $errors[] = $temp;
    }
    return $errors;
}

function insertAll($data , $table){
    global $conn;

    $fields = [];
    $values = [];

    foreach($data as $key => $val){
        $fields[] = "`{$key}`";
        $values[] = "'{$val}'";
    }
    $fieldsStr = implode(',' ,$fields);
    $valuesStr = implode(',' ,$values);

    $sql = "INSERT INTO `{$table}` ({$fieldsStr}) VALUES({$valuesStr})";

    $result = mysqli_query($conn,$sql);

    return $result;
}

function updateAll($data , $table , $id){
    global $conn;

    $q = [];

    foreach($data as $key => $val){
        $q[] = "`{$key}`" . " = " . "'{$val}'" ;
    }
    $fieldsStr = implode(' , ' ,$q);

    $sql = "UPDATE `{$table}` SET {$fieldsStr} WHERE `id`= '$id' ";

    $result = mysqli_query($conn,$sql);

    return $result;
}

function insert($sql){
    global $conn;
    $result = mysqli_query($conn,$sql);
    return $result;
}

function update($sql){
    global $conn;
    $result = mysqli_query($conn,$sql);
    return $result;
}


function getRow($table,$id){

    global $conn;
    $sql = "SELECT * FROM `$table` WHERE `id`='$id'";
    $result = mysqli_query($conn,$sql);
    return mysqli_fetch_assoc($result);
}


function deleteMultiRow($table,$array)
{
    global $conn;
    $str = [];
    foreach ($array as $item){
        $str[] = $item[0];
    }
    $str = implode(',',$str);
    $sql = "DELETE FROM `$table` WHERE `id` in ({$str})";

    $result = mysqli_query($conn,$sql);
    return $result;
}

function deleteRow($table,$id){

    global $conn;
    $sql = "DELETE FROM `$table` WHERE `id`='$id'";
    $result = mysqli_query($conn,$sql);
    return $result;
}


function selectWhere($table , $condition){

    global $conn;
    $sql = "SELECT * FROM `$table` where {$condition}";
    $result = mysqli_query($conn,$sql);
    return $result;
}

function selectAll($table){

    global $conn;
    $sql = "SELECT * FROM `$table`";
    $result = mysqli_query($conn,$sql);
    return $result;
}


function getFromSession($filds,$name){
    $result = [];
    if(isset($_SESSION[$name])){
        foreach($filds as $filed){
            if (isset($_SESSION[$name][$filed]))
                $result[$filed] = $_SESSION[$name][$filed];
            else
                $result[$filed] = [];
        }
    }
    unset($_SESSION[$name]);
    return $result;
}

function uploadImage($file , $folder , $old = null , $update = false){

    if (!file_exists(ASSET_PATH . $folder)) {
        mkdir(ASSET_PATH . $folder, 0777, true);
    }

    if ($file['name']){
        $image_name =  time() . $file['name'];
        $temp_name  =  $file['tmp_name'];
        move_uploaded_file($temp_name,ASSET_PATH . $folder. '/' . $image_name);
        if ($update){
            deleteImage($old , $folder);
        }
        return $image_name;
    }else{
        return $old;
    }

}

function deleteImage($name , $folder){
    $filename = ASSET_PATH . $folder . '/' . $name;
    if (file_exists($filename)) {
        unlink($filename);
    }
}
