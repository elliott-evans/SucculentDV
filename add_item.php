<!DOCTYPE html>
<?php
error_reporting(-1);
?>
<?php function getExtension ($mime_type){
    $extensions = array('image/jpeg' => '.jpeg',
                        'image/png' => '.png',
                        'image/gif' => '.gif'
                       );
    return $extensions[$mime_type];
}
?>

<html lang="en">
    
    <head>
        <title>SucculentDB</title>
        <meta charset="utf-8"> 
        <meta name="author" content="Elliott Evans">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"><!--mobile scale-->
        <meta name="description" content="">
<!--        <link rel="icon" href="images/favicon.png">-->
        <link rel="stylesheet" href="style.css"> <!--css page for site-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.0/css/all.css"> <!--This string enables the use of FontAwesome glyphs in the website. www.fontawesome.com-->
        <script>
            function refresh_page() 
                {
                    window.location.reload(true);
                }
        </script>
    </head> 
    
    <body>

        <div class="Header" id="Index_Header">
            
            <div class="Header_Logo" id="Header_Logo">
                <img src="logo.png">
            </div>
            
            <div class="Header_Button_Box" id="Header_Buttons">
                
                <a href="#" onclick="javascript:window.close();return false;">
                    <div class="Header_Button" id="Header_Button_2", style="float:right">
                        <a href="#" onclick="javascript:window.close();return false;" class="Header_Button_Text">
                            CLOSE
                        </a>
                    </div>
                </a>
        
            </div>
            
        </div> <!-- Closes <div class="Header" id="Header_Logo"> -->

        <div class="Body_Section" id="Body">
            <div>
                <form enctype="multipart/form-data" action="add_item.php" method="POST">
                    <button type="submit" disabled style="display: none" aria-hidden="true"></button>
                    Name of item: <br><input type="text" name="name_input"><br><hr>
                    Species of item: <br><input type="text" name="species_input"><br><hr>
                    Header Image: <br><input type="file" name="header_image" accept="image/jpeg, image/jpg"><br><hr>
                    Description:<br> <textarea name="description_input" style="width:99%"></textarea><br><hr>
                    Select Additional Images: <br><input type="file" name="carousel_images[]" accept="image/*" multiple><hr>
                    <br>
                    <input type="submit" name="submit_item" value="Add To Records">
                </form>
            </div>
        </div>
        <?php 
        
            if(isset($_POST['submit_item'])) {
                $name = $_POST['name_input'];
                $species = $_POST['species_input'];
                $description = nl2br($_POST['description_input']);
                $dir = __DIR__ . '/items/' . $name;
                if( is_dir($dir) === false ) {
                    mkdir($dir);
                    mkdir($dir . '/Carousel');
                    $subtitle_file = fopen($dir . '/subtitle.txt', 'w');
                    fwrite($subtitle_file, $species);
                    fclose($subtitle_file);
                    $details_file = fopen($dir . '/details.txt', 'w');
                    fwrite($details_file, $description);
                    fclose($details_file);
                    move_uploaded_file($_FILES['header_image']['tmp_name'], $dir . '/cover.jpeg');
                    foreach($_FILES['carousel_images']['tmp_name'] as $i => $pImage) {
                        move_uploaded_file($_FILES["carousel_images"]["tmp_name"][$i],  $dir . "/Carousel/" . $i . getExtension($_FILES["carousel_images"]["type"][$i]));
                    }
                    copy('template.php', $dir . '/template.php');
                }
            }
        
        ?>
        
    </body>
    
</html>