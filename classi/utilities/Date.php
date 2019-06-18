<?php
namespace classi\utilities;
//dichiarazione classe "date"
class Date {
    private $day;
    private $month;
    private $year;
    
    public function __construct($day,$month,$year) {
        
        if(is_int($day) && is_int($month) && is_int($year)){
        $this->day = $day;
        $this->month = $month;
        $this->year = $year;
        }else{
            trigger_error('errore di tipo');
        }
    }
}

