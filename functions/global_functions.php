<?php
    function generateRandomID() {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $length = 10;
        $random_ID = '';
    
        for ($i = 0; $i < $length; $i++) {
            $random_ID .= $characters[rand(0, strlen($characters) - 1)];
        }
    
        return $random_ID;
    }

    function getDatesThisWeek() {
        $currentDate = new DateTime();
        $currentDate->setISODate($currentDate->format('Y'), $currentDate->format('W'));
        
        $dates = array();
        for ($i = 1; $i <= 7; $i++) {
            $date = $currentDate->format('Y-m-d');
            $dates[] = $date;
            $currentDate->modify('+1 day');
        }
        
        return $dates;
    }