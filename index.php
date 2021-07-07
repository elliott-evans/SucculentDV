<!DOCTYPE html>

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
    </head> 
    
    <body>

        <div class="Header" id="Index_Header">
            
            <div class="Header_Logo" id="Header_Logo">
                <img src="logo.png">
            </div>
            
            <div class="Header_Button_Box" id="Header_Buttons">
                
                <a href="javascript:window.open('add_item.php', '', 'width=900,height=2000')">
                    <div class="Header_Button" id="Header_Button_1" style="float:left">
                        <a href="javascript:window.open('add_item.php', '', 'width=900,height=2000')" class="Header_Button_Text">
                            ADD ITEM
                        </a>
                    </div>
                </a>
                    
                <a href="javascript:window.open('wishlist.php', '', 'width=900,height=2000')">
                    <div class="Header_Button" id="Header_Button_2", style="float:right">
                        <a href="javascript:window.open('wishlist.php', '', 'width=900,height=2000')" class="Header_Button_Text">
                            WISHLIST
                        </a>
                    </div>
                </a>
        
            </div>
            
        </div> <!-- Closes <div class="Header" id="Header_Logo"> -->

        <div>
            <table id="index_display">
                <tr><th></th><th></th></tr>
                
                <?php 
                    $i = 0;
                    foreach(str_replace(' ', '%20', array_diff(scandir('items/'), array('..', '.'))) as $item) {
                        if(!fmod($i,2)) echo '<tr>';
                        echo '<td style="background-image: url(items/'.$item.'/cover.jpeg), url(loading.gif)"><a href="items/' . $item . '/template.php"><div><h1>' . str_replace('%20',' ', $item) . '</h1><h2><em>' . file_get_contents("items/" . str_replace('%20',' ', $item) . "/subtitle.txt") . '</em></h2></div></a></td>
                        ';
                        if (fmod($i,2)) echo '</tr>';
                        $i++;
                    }
                ?>
            </table>
        </div>

        <div>
            
        </div>
        
    </body>
    
</html>