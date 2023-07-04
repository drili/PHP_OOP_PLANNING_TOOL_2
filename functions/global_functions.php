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