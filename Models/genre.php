<?php
class Genre {
  private $name;
  private $forbidden= false;

function __construct($_name,$_forbidden = null){
  $this->setName($_name);
  if($_forbidden){
      $this->setForbidden($_forbidden);
    }
}



  /*** GETTER & SETTER ***/

  /**
   * Get the value of name
   */ 
  public function getName()  {
    return $this->name;
  }

  /**
   * Set the value of name
   *
   * @return  self
   */ 
  public function setName($_name)  {
    $this->name = $_name;
    return $this;
  }

  /**
   * Get the value of forbidden_to_minors
   */ 
  public function getForbidden()  {
    return $this->forbidden;
  }

  /**
   * Set the value of forbidden
   *
   * @return  self
   */ 
  public function setForbidden($_forbidden)  {
    $this->forbidden = $_forbidden;
    return $this;
  }
}