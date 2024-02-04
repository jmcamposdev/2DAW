<?php
$upload_status = "success";
$error_msg = null;
$success_msg = null;
$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if ($check === false) {
    $error_msg = "File is not an image.";
    $upload_status = "error";
  }
}
// Check if file already exists
if (file_exists($target_file)) {
  $error_msg = "Sorry, file already exists.";
  $upload_status = "error";
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {
  $error_msg = "Sorry, your file is too large.";
  $upload_status = "error";
}

// Allow certain file formats
if (
  $imageFileType != "jpg" &&
  $imageFileType != "png" &&
  $imageFileType != "jpeg" &&
  $imageFileType != "gif" &&
  $imageFileType != "bmp"
) {
  $error_msg = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $upload_status = "error";
}

// Check if $upload_status is set to 0 by an error
if ($upload_status == "success") {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    $success_msg =
      "The file " .
      htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) .
      " has been uploaded.";
  }
}

header("Location: index.php?upload_status=$upload_status&error_code=$error_msg&success_msg=$success_msg");
?>
