<?php include("path.php"); ?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!--Font-->
    <script src="https://kit.fontawesome.com/7856afcca5.js" crossorigin="anonymous"></script>

    <!--Custom styling-->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <!---->
    <title>My books</title>
</head>

<body>
   <!------------------------------->
   <?php include("app/include/header.php"); ?>
   <!------------------------------->

    

    <!--блок main! start--------------------------------------------------------------------> 
<div class = "container">
    <div class ="content row">
                 <!------------->
     <div class ="main-content col-md-9 col-12">
          <h2>Загаловок много текста очень вот так да круто ну еще много чего надо</h2>

          <div class = "single_post row">
            <div class = "img col-12 ">
                <img src="assets/images/1653639321_42-krot-info-p-mokap-kvadratnoi-otkritki-krasivie-45.jpg" alt="" class="img-thumbnail">
            </div>
            <div class ="info">
                <i class="far fa-user">Имя автора</i>
                <i class ="far fa-calendar">Mar 12,2012</i>
            </div>
            <div class="single_post_text col-12">
                <h3>Заголовок третьего уровня</h3>
                <p>sidfhsdfwdfsfdsfn sdifc afcoidf csdiufc eosfuifd f data-bs-slide
                </p>
                <p>asidhd fdsfuy sdfh iaufshc saouyf saudhbf oshbf casdf
                    csdfcsaudisfds dfgdisfsauydf safsudfcgusdyc sdsdfyugsdugf
                </p>
            </div>
          </div>
     </div>
                 <!-------------->


     <div class ="sidebar col-md-3 col-12">
      
       <div class ="section search">
        <h3>Поиск</h3>
        <form action ="/" method="post">
            <input type="text" name="search-term" class="text-input" placeholder="Search...">
        </form>
       </div>

       <div class = "section topics">
          <h3>Категории</h3>
          <ul>   
              <li><a href="#">Poems</a></li>
              <li><a href="#">Quotes</a></li>
              <li><a href="#">Fiction</a></li>
              <li><a href="#">Biography</a></li>
              <li><a href="#">Motivation</a></li>
              <li><a href="#">Inspiration</a></li>
              <li><a href="#">Life Lessons</a></li>
          </ul>
       </div>


     </div>
    </div>
</div>
    <!------------------------------------------------------------------------------------->
    <!------------------------------------------------------------------------------------->
  <?php include("app/include/footer.php"); ?>
    <!------------------------------------------------------------------------------------->

   
   
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
     -->

</body>

</html>