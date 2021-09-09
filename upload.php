<?php
/**
 * Created by PhpStorm.
 * User: zoeofunne
 * Date: 09/09/2021
 * Time: 12:30
 */

// Include the database configuration file
include 'dbConfig.php';
$statusMsg = '';

// File upload path
$targetDir = "uploads/";
$dpTargetDir = "cards/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_FILENAME);
$fileTypeExt = pathinfo($targetFilePath,PATHINFO_EXTENSION);


if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){

    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg');
    if(in_array($fileTypeExt, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
            $insert = $db->query("INSERT into images (file_name, uploaded_on) VALUES ('".$fileName."', NOW())");
            if($insert){
                $statusMsg = "Your picture; ".$fileName. " has been uploaded successfully.";



                // generate dp sec starts
                $profileimage = $targetFilePath;
                $img = 'final.png';
                $img2 = $dpTargetDir.'/'.$fileType.'.png';

                //generate virtual image from profile image
                $virtualprofile = imagecreatefromjpeg($profileimage);

                //returns profile image's width and height
                list($profilewid, $profilehayt) = getimagesize($profileimage);

                //initiate new width and height for profile image
                $newprofilewid = 344;
                $newprofilehayt = 360;

                $destination = imagecreatetruecolor($newprofilewid, $newprofilehayt);
                imagecopyresampled($destination, $virtualprofile, 0, 0, 0, 0, $newprofilewid, $newprofilehayt, $profilewid, $profilehayt);
                imagejpeg($destination, 'tmp.jpg', 100);

                $backgroundimage = imagecreatefrompng('img/dp-friesland.png');// Load the stamp and the photo to apply the watermark to
                $profilestamp = imagecreatefromjpeg('tmp.jpg'); // First we create our stamp image manually from GD

                // Set the margins for the stamp and get the height/width of the stamp image
                $marge_right = 102;
                $marge_bottom = 185;

                // Get image Width and Height of Profile Image
                $sx = imagesx($profilestamp);
                $sy = imagesy($profilestamp);

                //coordinates of destination point
                $xcoordest = imagesx($backgroundimage) - $sx - $marge_right;
                $ycoordest = imagesy($backgroundimage) - $sy - $marge_bottom;

                //merges two images into one
                imagecopymerge($backgroundimage, $profilestamp, $xcoordest, $ycoordest, 0, 0, $sx, $sy, 100);

                // Save the image to file and free memory
                imagepng($backgroundimage, 'final.png');
                imagedestroy($backgroundimage);

                $im = imagecreatefrompng($img); // get the image in php
                $textcolor = imagecolorallocate($im, 51, 102, 153); // text color

                // Get image Width and Height of Temporary Image
                $image_width = imagesx($im);
                $image_height = imagesy($im);

                imagepng($im, $img2, 9); // save the image on server
                imagedestroy($im); // Destroy image in memory to free-up resources:

                unlink('final.png');//Remove Temporary Background Image
                unlink('tmp.jpg');//Remove Temporary Profile Image


                // dp generation ends



            }else{
                $statusMsg = "Picture upload failed, please try again.";
            }
        }else{
            $statusMsg = "Sorry, there was an error uploading your picture.";
        }
    }else{
        $statusMsg = 'Sorry, only JPG, JPEG and PNG files are allowed to upload.';
    }
}else{
    $statusMsg = 'Please upload your picture to use.';
}

// Display status message
echo $statusMsg;