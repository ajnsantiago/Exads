<?php


class FizzBuzz
{
   /**
    * output var
    * @var array > class var
    */

   private $output = [];

   /**
    * multiples of three output "Fizz"
    *
    * @param $value
    * @return array [valid => boolean, output => string]
    */

   private function checkMultiplesOf3($value)
   {
      $retArray = array(
         'valid' => false,
         'output' => ''
      );

      if ($value % 3 === 0) {
         $retArray['valid'] = true;
         $retArray['output'] = 'Fizz';
      }

      //return array
      return $retArray;
   }

   /**
    * multiples of five output "Buzz"
    *
    * @param $value
    * @return array[valid => boolean, output => string]
    */

   private function checkMultiplesOf5($value)
   {
      $retArray = array(
         'valid' => false,
         'output' => ''
      );

      if ($value % 5 === 0) {
         $retArray['valid'] = true;
         $retArray['output'] = 'Buzz';
      }

      //return array
      return $retArray;
   }

   /**
    * multiples of both three and five should output as "FizzBuzz"
    *
    * @param $value
    * @return array[valid => boolean, output => string]
    */

   private function checkMultiplesOf15($value)
   {
      $retArray = array(
         'valid' => false,
         'output' => ''
      );

      if ($value % 15 === 0) {
         $retArray['valid'] = true;
         $retArray['output'] = 'FizzBuzz';
      }

      //return array
      return $retArray;
   }

   /**
    * Generate the FizzBuzz output for a given interval (defaul 1 - 100)
    *
    * @param $from inicial value
    * @param $to final value
    * @return array
    */
   private function generateOutput($from, $to)
   {
      for ($i = $from; $i <= $to; $i++) {
         //check multiples, 15 >> 5 >> 3
         $checkmultiples = $this->checkMultiplesOf15($i);
         if ($checkmultiples['valid']) {
            $this->output[] = $checkmultiples['output'];
            continue;
         }

         $checkmultiples = $this->checkMultiplesOf5($i);
         if ($checkmultiples['valid']) {
            $this->output[] = $checkmultiples['output'];
            continue;
         }

         $checkmultiples = $this->checkMultiplesOf3($i);
         if ($checkmultiples['valid']) {
            $this->output[] = $checkmultiples['output'];
            continue;
         }

         // default > value
         $this->output[] = $i;
      }

      // Return the output
      return $this->output;
   }

   /**
    * get the output and display it to screen
    */
   public function displayOutput($from = 1, $to = 100)
   {
      //build output > default 1 - 100
      $this->generateOutput($from, $to);

      //send to screen
      echo implode("<br>", $this->output);
   }
}

//instantiate + call output
$fizzbuzz = new FizzBuzz();
$fizzbuzz->displayOutput();

//after comments:
/**
 * I've done this exercise using just a single function but
 * I think that this solution is the best all round way to get the output
 * desired, I've also prepared the main display function to receive a possible start / end
 * value different from the ones that was requested in the exercise
 */