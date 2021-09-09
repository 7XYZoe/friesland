<?php
/**
 * Created by PhpStorm.
 * User: zoeofunne
 * Date: 09/09/2021
 * Time: 13:19
 */

include 'dbConfig.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //get previewed dp
    $query = $db->query("SELECT * FROM images order by id DESC limit 1");

    if($query->num_rows > 0) {
        while($row = $query->fetch_assoc()) {
            $imageURL = 'cards/' .$row["file_name"];
            $fixRemove = substr($imageURL,0,-3);
            $finImageURL = $fixRemove .'png';
            ?>

            <img src="<?php echo $finImageURL; ?>" alt="dp pix" style='width: 80%;' />
        <?php }
    } else {
        ?>
        <p>No display picture found</p>
        <?php
    }
}else{
    echo "<img src='img/dp-friesland.png' alt='' class='resultimg' style='width: 80%;' />";
}