<?php

class ABTesting{
   /**
    * Class var
    * should be filled using DB table
    * for this example I've simplified it with a default array
    */

   private $currentDesignDivision = array('1' => 50, '2' => 25, '3' => 25);

   /**
    * get a random number (0 to 99)
    * and returns the result (design) selected based on the division (%) inserted
    * function fills a array based on the initial division that exists in the system
    * the php function rand determines which is the current array key to be used
    *
    * @param int reqValue > random int [0 - 99]
    * @return $result > design selected
    */

   public function redirectUser($reqValue){

      $designRateResult = [];


      foreach($this->currentDesignDivision as $design => $designrate) {
         $count = 0;
         while ($count < $designrate) {
            $designRateResult[count($designRateResult)] = $design;
            $count++;
         }
      }

//      echo print_r($designRateResult, true); > echo just for test controls
      return $designRateResult[$reqValue];
   }
}

$abTesting = new ABTesting();
echo 'Current user was redirected to design number: '.$abTesting->redirectUser(rand(0,99));


//after comments:
/**
 * class uses a rand number between 0 and 99 to determine which design was selected
 * the main control array is built using the % in which the designs are divided
 */