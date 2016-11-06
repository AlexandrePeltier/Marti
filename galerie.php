<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Martigné le logis</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Includes -->
    <script>
           $(function(){
             $("nav").load("includes/nav.html");
           });

   </script>
</head>
<body>
    <nav id="nav" class="navbar navbar-default">

    </nav>

    <div class="container content-main">
      <?php
      $dir = "img";
      $dh  = opendir($dir);
      while (false !== ($filename = readdir($dh))) {
        $files[] = $filename;
      }
      $images=preg_grep ('/\.jpg$/i', $files);
      $count = 1;
      foreach ($images as $image) {
        $size = getimagesize('img/'.$image);
        $width = $size[0];
        $height = $size[1];
        if($width > $height ){
          if($count % 3 == 0){
            echo '<div class="row">';
          }
          echo '<img src="img/'.$image.'" class="col-md-4">';
          if($count % 3 == 0){
            echo '</div>';
          }
          $count ++;
        }//on affiche pas les images trop grandes

      }
      ?>

    </div>
    <div id="footer">
        <div class=container-fluid>
            Mentions légales
        </div>
    </div>
</body>
</html>
