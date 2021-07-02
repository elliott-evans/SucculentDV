<!DOCTYPE html>

<?php
    if(isset($_POST['textsubmit'])){
        $wishlist_item_string = PHP_EOL . $_POST['textinput'];
        $wishlist_save_file = 'wishlist.txt';
        file_put_contents($wishlist_save_file, $wishlist_item_string, FILE_APPEND);
        echo '<script>refresh_page();</script>';
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
                <img src="logo_placeholder.jpg">
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
                <h2 style="margin:-4px 0px;">ADD TO LIST</h2>
                <form name="Wishlist_Form" method="post" id="wishlist_form">
                    <input type="text" name="textinput">
                    <input type="submit" name="textsubmit">
                </form>
                <hr>
            </div>
            <div class="table">
                <table id="items">
                <tr><th>Wishlist</th><th style="width:60%"></th></tr>
                <?php 
                    $fn = fopen("wishlist.txt","r");

                    while(! feof($fn))  {
                       $result = fgets($fn);
                       if($result != " ") {
                          echo '<tr><td colspan="2">' . $result;
                       }
                    }
                    fclose($fn);
                ?>
                </table>
            </div>
        </div>

        <div>
            
        </div>
        
    </body>
    
</html>