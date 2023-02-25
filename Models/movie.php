<?php
require_once __DIR__ . "/actor.php";
require_once __DIR__ . "/genre.php";

class Movie
{

  private string $title;
  private string $overview;
  private string $lang = "EN";
  private float $rating = 0.0;
  private array $genres;
  private bool $forbidden = false;
  private array $cast;

  private string $img;


  function __construct($_title, $_overview, $_genres, $_cast, $_lang = null, $_votes = null, $_img = null)
  {
    $this->setTitle($_title);
    $this->setOverview($_overview);

    if ($_lang) {
      $this->setLang($_lang);
    }

    if ($_votes) {
      $this->setRating($_votes);
    }

    $this->setGenres($_genres);
    $this->fetchGenresForbidden();
    $this->setCast($_cast);

    $this->setimg($_img);
    
  }

  public function jsonSerialize()
  {
    return get_object_vars($this);
  }


  /* METOD FETCHE FORBIDDEN (FROM GENRES)  */
  public function fetchGenresForbidden()
  {

    /* foreach ($this->getGenres() as $genre) {
    var_dump($genre->getForbidden());
    
    } */
    for ($i = 0; $i < count($this->getGenres()); $i++) {

      if ($this->getGenres()[$i]->getForbidden()) {
        $this->setForbidden(true);
      }
    }
  }

  /*** GETTER & SETTER ***/

  /**
   * Get the value of img
   */
  public function getImg()
  {
    return $this->img;
  }

  /**
   * Set the value of img
   *
   * @return  self
   */
  public function setImg($_img)
  {
    $this->img = $_img;
    return $this;
  }


  /**
   * Get the value of title
   */
  public function getTitle()
  {
    return $this->title;
  }

  /**
   * Set the value of title
   *
   * @return  self
   */
  public function setTitle($_title)
  {
    $this->title = $_title;
    return $this;
  }

  /**
   * Get the value of overview
   */
  public function getOverview()
  {
    return $this->overview;
  }

  /**
   * Set the value of overview
   *
   * @return  self
   */
  public function setOverview($_overview)
  {
    $this->overview = $_overview;
    return $this;
  }

  /**
   * Get the value of lang
   */
  public function getLang()
  {
    return $this->lang;
  }

  /**
   * Set the value of lang
   *
   * @return  self
   */
  public function setLang($_lang)
  {
    $this->lang = $_lang;
    return $this;
  }

  /**
   * Get the value of vote
   */
  public function getRating()
  {
    return $this->rating;
  }

  /**
   * Set the value of Rating
   *
   * @return  self
   */
  public function setRating($_votes)
  {

    if ($_votes) {
      $sum = 0;

      for ($i = 0; $i < count($_votes); $i++) {
        $sum += $_votes[$i];
      }

      $_rating = $sum / count($_votes);
      $this->rating = sprintf("%.1f", $_rating);
    }
    return $this;
  }

  /**
   * Get the value of genres
   */
  public function getGenres()
  {
    return $this->genres;
  }

  /**
   * Set the value of genres
   *
   * @return  self
   */
  public function setGenres($_genre)
  {
    $this->genres = $_genre;
    return $this;
  }

  /**
   * Get the value of forbidden
   */
  public function getForbidden()
  {
    return $this->forbidden;
  }

  /**
   * Set the value of forbidden
   *
   * @return  self
   */
  public function setForbidden($_forbidden)
  {
    $this->forbidden = $_forbidden;
    return $this;
  }

  /**
   * Get the value of cast
   */
  public function getCast()
  {
    return $this->cast;
  }

  /**
   * Set the value of cast
   *
   * @return  self
   */
  public function setCast($cast)
  {
    $this->cast = $cast;
    return $this;
  }

}





?>