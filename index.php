<?php
require_once "./Models/movie.php";
require_once "./Models/actor.php";
require_once "./Models/genre.php";


/***** MOVIE 1 ***************************************************************/

$vote_List1 = (createVote_list());

$genres_List1 = [];
array_push($genres_List1, new Genre("violenza", true), new Genre("azione"), new Genre("fantasy"));

$actors_List1 = [];
array_push($actors_List1, new Actor("Edward", "Norton", "1969-07-18"), new Actor("Lou", "ferrigno", "1951-11-09"));
$img1 = "hulk.jpg";

$movie1 = new Movie("l'incredibile Hulk", "Hulk spacca", $genres_List1, $actors_List1, "", $vote_List1,$img1);
//var_dump($movie1);


/***** MOVIE 2 ***************************************************************/
$vote_List2 = (createVote_list());

$genres_List2 = [];
array_push($genres_List2, new Genre("triller", true), new Genre("azione"));

$actors_List2 = [];
array_push($actors_List2, new Actor("Keanu", "Reeves", "1964-09-02"));

$img2 = "jw.jpg";
$movie2 = new Movie("John Wick", "il cane no!", $genres_List2, $actors_List2, "", $vote_List2,$img2);
//var_dump($movie2);

/***** MOVIE 3 ***************************************************************/
$genres_List3 = [];
array_push($genres_List3, new Genre("romantico"), new Genre("drammatico"), new Genre("storico"));

$actors_List3 = [];
array_push($actors_List3, new Actor("Leonardo", "DiCaprio", "1974-11-11"), new Actor("Kate", "Winslet", "1975-10-5"));
$img3 = "TITANIC.jpg";
$movie3 = new Movie("titanic", "Nave inaffondabile affonda", $genres_List3, $actors_List3, "IT","",$img3);
//var_dump($movie3);

$movies = [];

array_push($movies, $movie1, $movie2, $movie3);

/* echo  '<br>'. getVoteStarsStyle(5); */
//var_dump($movies);

/* con le classi l'encode non funziona______________________________!!!!!! */
//$jsonString = json_encode($movies, JSON_PRETTY_PRINT);
//file_put_contents("db.json", $jsonString);
//header("Content-Type: application/json");
/*_________________________________________________________  */



/* FUNCTION CRATE VOTE LIST */
function createVote_list()
{
  for ($i = 0; $i < 5; $i++) {
    $votes[$i] = mt_rand(2, 5);
  }
  ;
  return $votes;
}

/* FUNCTION CRATE VOTE LIST */
function getVoteStarsStyle($_voto)
{
  return ("width:" . (100 - (($_voto * 100) / 5)) . "%");
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

<body class=" bg-black text-light ">
  <div id="app">


    <h1 class="text-center mt-5 pt-5">I TITOLI DEL MOMENTO</h1>
    <div class="cards-container container m-auto w-75 m-5 d-flex gap-5">

      <?php foreach ($movies as $movie) { ?>

        <div style= <?php echo '"background-image: url(\'img/' . $movie->getImg() . '\')"'; ?>></div>
    
        <div class="card-body card position-relative rounded-3 bg-dark" >
          <div class="poster-card  position-absolute w-100 h-100 top-0 bottom-0 start-0 end-0" style= <?php echo '"background-image: url(\'img/' . $movie->getImg() . '\')"'; ?>></div>

          <div class="info-card   w-100 h-100 d-flex flex-column p-3">

            <!-- titles -->
            <div class="hgroup text-center">
              <h4 class="title text-uppercase"><?php echo $movie->getTitle() ?></h4>
            </div>


            <div class="infos-container">

              <!-- overview -->
              <div>
                <p class="text"> <i class=" overview">Trama:</i><br>
                  <?php echo $movie->getOverview() ?>
                </p>
              </div>
            </div>

            <!-- flag -->
            <p class="text">
              <i class=" cast">lingua: </i><br>
              <?php echo $movie->getLang() ?>
            </p>

            <!-- infos to request -->
            <p class="text">
              <i class=" cast">cast: </i><br>
              <?php foreach ($movie->getCast() as $actor) { ?>

                <?php echo $actor->getFullName() . "<br>"; ?>
              <?php } ?>
            </p>

            <p class="text">
              <i class=" genres">generi: </i><br>
              <?php foreach ($movie->getGenres() as $genre) {
                echo $genre->getName() . " ";
              } ?>
            </p>

            <!-- vietato ai minori -->
            <p <?php echo ($movie->getForbidden()) ? 'class=" text text-danger"' : 'class=" text text-success"' ?>>
              <?php echo ($movie->getForbidden()) ? 'vietato ai minori"' : 'per tutta la famiglia' ?>
            </p>
            <!-- vote -->

            <p class="text"> <i class=" overview">Valutazione:</i><br>
            </p>
            <div class="d-flex align-items-baseline">
              <p class="text small">
                <?php echo '(' . $movie->getRating() . ')' ?>
              </p>
              <div class="vote-container d-flex fs-5">
                <div class="stars-container gradient-background">
                  <div class="negative-vote-percentage bg-dark" <?php echo 'style=' . getVoteStarsStyle($movie->getRating()) ?>> </div>

                  <div>
                    <?php for ($i = 1; $i <= 5; $i++) {
                      echo '<i class="fa fa-star"></i>';
                    } ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      <?php } ?>
    </div>
  </div>

  <script type="module" src="js/main.js"></script>


</body>

</html>

<style lang="scss">
  /* body{
background-color: black;
  font-size:4rem;
} */

  p {
    margin: 5px;
  }

  .cards-container {
    transform: translateY(10%);
  }

  .card-body {
    aspect-ratio: 3/4;
    flex-basis: calc(100% /3);
    background-size: cover;
  }
  .poster-card {
    z-index: 5;
    transition:all 1s;
}
  .poster-card:hover {
    opacity: 0;
    filter:blur(10px);
    
 

}
  .gradient-background {
    position: relative;
    display: flex;
    justify-content: end;
    background: -webkit-linear-gradient(0deg, rgba(247, 0, 0, 1) 0%, rgba(255, 201, 0, 1) 50%, rgba(5, 249, 8, 1) 100%);
    width: fit-content;
    background-clip: text;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
  }

  .negative-vote-percentage {
    position: absolute;
    height: 100%;
  }
</style>