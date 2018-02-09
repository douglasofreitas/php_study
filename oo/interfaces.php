<?php

interface A {
  public function setProperty($x);
  public function descriptionA();
}

interface B extends A {
  public function descriptionB();
}

class Mangoes implements B {
  public function setProperty($x){
    $this->x = $x;
  }
  public function descriptionA(){
    echo 'DescriptionA: '.$this->x.'.';
  }
  public function descriptionB(){
    echo 'DescriptionB: '.$this->x.'.';
  }
}

$Mangoe = new Mangoes();
$Mangoe->setProperty('mango');
$Mangoe->descriptionA();
$Mangoe->descriptionB();
