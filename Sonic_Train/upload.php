<?php
$ds          = DIRECTORY_SEPARATOR;  //1

$storeFolder = 'uploads';   //2

if (!empty($_FILES)) {

    $tempFile = $_FILES['file']['tmp_name'];          //3

    $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;  //4

    $targetFile =  $targetPath. $_FILES['file']['name'];  //5

    $name = @$_FILES['file']['name'];
    $extension = strtolower(substr($name, strpos($name, '.') + 1));
    $tmp_name = @$_FILES['file']['tmp_name'];
    if ($extension=='csv') {
    move_uploaded_file($tempFile,$targetFile); //6
    echo '<div class="alert alert-success">Upload successful!</div>';
    } else {
    echo '<div class="alert alert-danger">You can upload only .CSV file type!</div>';
    }

}
?>
