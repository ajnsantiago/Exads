<?php

class DateCalculation
{
   /**
    * class vars
    */
   
   private $date;
   private $today = false;

   public function __construct($date = null) {

      if(strlen($date) > 0){
         //use user date
         $userDate = strtotime($date);
         $this->date = $this->getNextLottoDay($userDate);
      } else {
         //use today date
         $now = time();
         $this->date = $this->getNextLottoDay($now);
      }

      //set date default timezone
      date_default_timezone_set('Europe/London');
   }

   /**
    * calculates next valid draw date based on the date inserted by the user or the
    * current date (user can send a date
    *
    * @param date $date (Unix timestamp)
    * @return date (strtotime)
    */

   private function getNextLottoDay($date) {
      //calculates using the function date
      //check if the day of the week (N) is wednesday (3) or Saturday (6)
      //checks time (H) to see if the hour passed 20 or not
      if((date('N', $date) == 3 || date('N', $date) == 6)
         && date('H', $date) < 20){
         //today > returns strtotime of the current day
         $this->today = true;
         return strtotime('today UTC 20:00:00', $date);
      }

      //checks if day of the week is 1(Monday), 2 (Tuesday) or 7 (Sunday)
      //if so the next date is next wednesday
      if((date('N', $date) == 1 || date('N', $date) == 2 || date("N", $date) == 7)){
         return strtotime('next Wednesday UTC 20:00:00', $date);
      }

      //final validation >> check next saturday
      if((date('N', $date) == 4 || date('N', $date) == 5)){
         return strtotime('next Saturday UTC 20:00:00', $date);
      }

      //the only way to reach here was if the date is today but passed 20
      //must calculate next day based on the current day of the week
      return (date('N', $date) == 3) ? strtotime('next Saturday UTC 20:00:00', $date) : strtotime('next Wednesday UTC 20:00:00', $date);
   }

   /**
    * get the target date (next valid date)
    *
    * @return date (strtotime)
    */

   public  function  getDate() {
      if(!$this->today) {
         return date('Y-m-d H:i', $this->date);
      }
      return date('Y-m-d H:i', $this->date).' (today)';
   }
}

$irishNationalLottery = new DateCalculation();
//$irishNationalLottery = new DateCalculation('2019-02-12'); > example with manual date value
//$irishNationalLottery = new DateCalculation('2019-02-13 20:00:00'); > other example with time >= 20

echo 'The next valid Irish National Lottery draw date is: '.$irishNationalLottery->getDate();


//after comments:
/**
 * The user date sent to the class construct can be any format, it's used the strtotime
 * function to get the unix timestamp
 *
 */