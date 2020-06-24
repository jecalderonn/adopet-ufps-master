<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS');
//header("Access-Control-Allow-Headers: X-Requested-With");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");  
header('Content-Type: text/html; charset=utf-8');
header("content-type: application/json; charset=utf-8");
header('P3P: CP="IDC DSP COR CURa ADMa OUR IND PHY ONL COM STA"'); 
//
// Upload a new image file into uploads folder
//

//// Include the headers
//include_once '../../system/common.php';

// Declare the allowed extensions for images
$allowedExtensions = array('jpg', 'jpeg', 'gif', 'png');

// Destination where image will be uploaded
$destination = "../../../uploads/";

if (empty($_FILES['image_to_upload']))
{
  echo json_encode(array('message' => 'Failed catch the file'));
  http_response_code(500);
  return;
}

//
// Validate the extension file
//
$initialName = $_FILES['image_to_upload']['name'];

$newName = explode('.', $initialName);

$lengthName = count($newName);

$extensionFile = strtolower($newName[-- $lengthName]);

if (!in_array($extensionFile, $allowedExtensions))
{
    echo json_encode(array('message' => 'Extension not allowed')); 
    http_response_code(500);
    return;
}

//
// Assign a new image name random
//
$imageName = time() . '_' . rand(0, 100) . '.' . $extensionFile;

$uploadPath = $destination . $imageName;
// echo $uploadPath;

//
// Try upload the image
//
if (move_uploaded_file($_FILES['image_to_upload']['tmp_name'] , $uploadPath))
{
    echo json_encode(array("message" => "Successfully uploaded image")); 
    http_response_code(200);
    return;
} else {
    echo json_encode(array("message" => "Something went wrong")); 
    http_response_code(500);
    return;
}