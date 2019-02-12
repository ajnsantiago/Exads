<?php

class Random500Array
{
   /**
    * class vars
    */

   private $randomArray = [];
   private $randomArrayCopy = [];
   private $from = 1;
   private $to = 500;

   /**
    * create and set the array interval (def 1 - 500)
    *
    * @param $from inicial value
    * @param $to final value
    */

   private function setRandomArray($from = 1, $to = 500)
   {
      $this->from = $from;
      $this->to = $to;

      $this->randomArray = range($from, $to);
      $this->randomArrayCopy = $this->randomArray;
   }

   /**
    * remove a random element
    * from the array > values from and to are the keys of the array
    *
    */

   private function removeRandomElement()
   {
      $randomValue = rand($this->from - 1, $this->to - 1);
      //unset the random value
      unset($this->randomArray[$randomValue]);
   }


   /**
    * get the output and display it to screen
    */
   public function displayOutput()
   {
      //build array > range default 1 - 500
      $this->setRandomArray();

      //remove a random element
      $this->removeRandomElement();

      //check the missing value in array and output it
      //echo implode("<br>", $this->randomArray);
      $missing = array_diff($this->randomArrayCopy, $this->randomArray);
      echo "The missing value is: ";
      foreach ($missing AS $val) {
         echo $val;
      }
   }
}

//instanciate + call output
$randArray = new Random500Array();
$randArray->displayOutput();

//after comments:
/**
 * I've done this exercise using a foreach cycle in order to check which element was missing
 * however I think using the array_diff solution is the fastest and direct way to check and get which element
 * is missing in the initial array. The only thing that was needed was to clone the 1st array in order to get
 * the missing element.
 *
 * I was not sure in the exercise, when you've requested: "Write a PHP script to generate a random array of 500 integers"
 * I was in doubt if the 500 integers to place in the array would be random or not
 * I went in the second option (not random) but by using this method the end result would be the same.
 *
 * I've left the echo of the randomArray (line 57) commented which I used for testing purposes
 */