<?php

namespace DWA;


  class Price {
      public $items;
      public $cost;

      public function __construct() {
          $this->items = array();


      }


      public function addValue($value){
          ($this->cost=$value);


       }

     public function pushValue($items,$cost){

          //echo $this->cost;
         return array_push($this->items,$this->cost);
      }

  }#eoc




//dump ($price->items);
//$price->addValue("5");
//dump($price->cost);
//$price->pushValue($items,$cost);
//dump ($price->items);
