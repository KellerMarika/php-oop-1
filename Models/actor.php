<?php
class Actor {
  private string $name;
  private string $surname;

  private string $birth_date;

  private array $movies;
 

function __construct($_name,$_surname, $_birth_date){
  $this->setName($_name);
  $this->setsurname($_surname);
  $this->setBirth_date($_birth_date);
}

public function getFullName(){
  return $this->getName() . " " .$this->getSurname();
}


  /*** GETTER & SETTER ***/

  /**
   * Get the value of name
   */ 
  public function getName()
  {
    return $this->name;
  }

  /**
   * Set the value of name
   *
   * @return  self
   */ 
  public function setName($name)
  {
    $this->name = $name;

    return $this;
  }

  /**
   * Get the value of surname
   */ 
  public function getSurname()
  {
    return $this->surname;
  }

  /**
   * Set the value of surname
   *
   * @return  self
   */ 
  public function setSurname($surname)
  {
    $this->surname = $surname;

    return $this;
  }

  /**
   * Get the value of birth_date
   */ 
  public function getBirth_date()
  {
    return $this->birth_date;
  }

  /**
   * Set the value of birth_date
   *
   * @return  self
   */ 
  public function setBirth_date($birth_date)
  {
    $this->birth_date = $birth_date;

    return $this;
  }

  /**
   * Get the value of movies
   */ 
  public function getMovies()
  {
    return $this->movies;
  }

  /**
   * Set the value of movies
   *
   * @return  self
   */ 
  public function setMovies($movies)
  {
    $this->movies = $movies;

    return $this;
  }
}