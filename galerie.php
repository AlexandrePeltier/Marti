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
   <script>

   var slideIndex = 1;
   function openModal() {
     document.getElementById('myModal').style.display = "block";
   }

   function closeModal() {
     document.getElementById('myModal').style.display = "none";
   }
   function plusSlides(n) {
     showSlides(slideIndex += n);
   }

   function currentSlide(n) {
     showSlides(slideIndex = n);
   }

   function showSlides(n) {
     var i;
     var slides = document.getElementsByClassName("mySlides");
     //var dots = document.getElementsByClassName("demo");
     var captionText = document.getElementById("caption");
     if (n > slides.length) {slideIndex = 1}
     if (n < 1) {slideIndex = slides.length}
     for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";
     }
     /*for (i = 0; i < dots.length; i++) {
       dots[i].className = dots[i].className.replace(" active", "");
     }*/
     slides[slideIndex-1].style.display = "block";
     //dots[slideIndex-1].className += " active";
     //captionText.innerHTML = dots[slideIndex-1].alt;
   }

   $( document ).ready(
     function() {
        showSlides(slideIndex);
        }
      );
    </script>

</head>
<body>
    <nav id="nav" class="navbar navbar-default">

    </nav>

    <div class="container content-main">
      <div class="row">
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
            echo '<img src="img/'.$image.'" class="col-md-4" onclick="openModal();currentSlide('.$count.')">';
            if($count % 3 == 0){
              echo '</div>';
            }
            $count ++;
          }//on affiche pas les images trop grandes

        }

        echo '<div id="myModal" class="modal">
            <span class="close cursor" onclick="closeModal()">&times;</span>
          <div class="modal-content">';
            $count2 = 1;
            foreach ($images as $image) {
              $size = getimagesize('img/'.$image);
              $width = $size[0];
              $height = $size[1];
              if($width > $height ){
                echo '<div class="mySlides">
                  <div class="numbertext">'.$count2.' / '.count($images).'</div>
                  <img src="img/'.$image.'" style="width:100%"></div>';
                $count2 ++;
              }//on affiche pas les images trop grandes
            }
         ?>
         <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
         <a class="next" onclick="plusSlides(1)">&#10095;</a>

         <div class="caption-container">
           <p id="caption"></p>
         </div>
         <div>
        </div>
       </div>

    </div>
    <div id="footer">
        <div class=container-fluid>
            Mentions légales
        </div>
    </div>
</body>

</html>
