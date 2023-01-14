<?php
require_once "./Models/movie.php";
require_once "./Models/actor.php";
require_once "./Models/genre.php";





/***** MOVIE 1 ***************************************************************/

$vote_List1=(createVote_list());

$genres_List1=[];
array_push( $genres_List1, new Genre("violenza",true), new Genre("azione"), new Genre("fantasy"));

$actors_List1 = [];
array_push($actors_List1, new Actor("Edward", "Norton", "1969-07-18"), new Actor("Lou", "ferrigno", "1951-11-09"));

$movie1 = new Movie("l'incredibile Hulk(cartone)", "Hulk spacca","",$vote_List1, $genres_List1,$actors_List1);
var_dump($movie1);

/***** MOVIE 2 ***************************************************************/
$vote_List2=(createVote_list());

$genres_List2 = [];
array_push( $genres_List2, new Genre("triller",true), new Genre("azione"));

$actors_List2 = [];
array_push($actors_List2, new Actor("Keanu", "Reeves", "1964-09-02"));

$movie2 = new Movie("John Wick", "il cane no!","",$vote_List2, $genres_List2,$actors_List2);
var_dump($movie2);

/***** MOVIE 1 ***************************************************************/
$genres_List3 = [];
array_push( $genres_List3, new Genre("romantico"), new Genre("drammatico"), new Genre("storico"));

$actors_List3 = [];
array_push($actors_List3, new Actor("Leonardo", "DiCaprio", "1974-11-11"), new Actor("Kate", "Winslet", "1975-10-5"));

$movie3 = new Movie("titanic", "Nave inaffondabile affonda","IT", "", $genres_List3,$actors_List3);
var_dump($movie3);

/* FUNCTION CRATE VOTE LIST */
function createVote_list() {
  for($i = 0; $i < 10; $i++){
    $votes[$i] = mt_rand(0, 5);
  };
return $votes;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- indispensabile per far funzionare le media-queries -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TITOLO</title>


  <!-- font-family: fontawesome -->
  <script src="https://kit.fontawesome.com/a19b158346.js" crossorigin="anonymous"></script>

  <!-- bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">

  <!-- vue -->
  <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>

  <!-- Axios -->
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>

<body>
  <div id="app">


  </div>

  <script type="module" src="js/main.js"></script>

</body>

</html>