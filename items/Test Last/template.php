<!DOCTYPE html>

<html lang="en">
    
    <head>
        <title>SucculentDB</title>
        <meta charset="utf-8"> 
        <meta name="author" content="Elliott Evans">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"><!--mobile scale-->
        <meta name="description" content="">
<!--        <link rel="icon" href="images/favicon.png">-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.0/css/all.css"> <!--This string enables the use of FontAwesome glyphs in the website. www.fontawesome.com-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="../../style.css"> <!--css page for site-->
    </head> 
    
    <body>

        <div class="Header" id="Index_Header" style="height:100px;">
            
            <div class="Header_Logo" id="Header_Logo">
                <img src="../../logo.png">
            </div>
            
            <div class="Header_Button_Box" id="Header_Buttons">
                
                <a href="javascript:window.history.back()">
                    <div class="Header_Button" id="Header_Button_1" style="float:left;line-height:53px;">
                        <a href="javascript:window.history.back()" class="Header_Button_Text">
                            HOME
                        </a>
                    </div>
                </a>
        
            </div>
            
        </div> <!-- Closes <div class="Header" id="Header_Logo"> -->
        <div style="padding:25px;">
        <div class="Template_Body">
            <div>
                <h1><b>
                    <?php echo basename(__DIR__); ?>
                </b></h1>
                <h2><i>
                    <?php echo file_get_contents("subtitle.txt"); ?>
                </i></h2>

                <div>
                    <img src="cover.jpeg" height="75px" class="ImageBanner">
                </div>
            </div>
            

            <div>
                <p><?php echo file_get_contents("details.txt"); ?></p>
            </div>

            <div>
                <div id="myCarousel" class="carousel slide" data-ride="carousel" style="object-fit:cover;">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <?php 
                            $numcount = 0;
                            foreach(array_diff(scandir('Carousel/'), array('..', '.')) as $item) {
                                echo '<li data-target="#myCarousel" data-slide-to="' . $numcount . '"';
                                if($numcount == 0) {
                                    echo '" class="active"';
                                }
                                echo '></li>';
                                $numcount += 1;
                            }
                        ?>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <?php 
                            $numcount = 0;
                            
                            foreach(array_diff(scandir('Carousel/'), array('..', '.')) as $item) {
                                $isactive = '';
                                if($numcount == 0) {
                                    $isactive = ' active';
                                }
                                echo '<div class="item' . $isactive . '">
                                <img src="Carousel/' . $item . '" alt="img" style="width=100%;">
                                </div>
                                ';
                                $numcount += 1;
                            }
                        ?>
                    </div>

                    <!-- Left and right controls -->
                    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                      <span class="glyphicon glyphicon-chevron-left"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" data-slide="next">
                      <span class="glyphicon glyphicon-chevron-right"></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </div>                                                                                                        
            </div>
            </div>
        </div>
    </body>
    
</html>