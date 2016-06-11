<?php

/**
 * Validate Nigerian phone numbers
 * @param type $number
 * @return int
 * 1 - input is empty
 * 2 - number is not numeric
 * 3 - number does not start a Nigerian Phone Network Prefix
 * 4 - length of the number is not eleven
 * 5 - success
 */
function check_number($number) {
    //All Nigerian Phone Network Prefixes and Number Ranges
    $nigerian_phone_number_prefixes = array('0701', '0702', '0703', '0704', '0705', '0706', '0707', '0708', '0709', '0802', '0803', '0804', '0805', '0806', '0807', '0808', '0809', '0810', '0811', '0812', '0813', '0814', '0815', '0816', '0817', '0818', '0819', '0909', '0902', '0903', '0905', '0804' );
    
    //Strip whitespace (or other characters) from the beginning and end of a string
    $number = trim($number);
    
    //Ensure number is not empty
    if(empty($number)) {
        return 1;
    }
 
    //Ensure number is numeric
    if(!is_numeric($number)) {
        return 2;
    }
    
    //Ensure number starts with any of the phone prefixes
    $number_prefix = substr($number, 0, 4);
    if (!in_array($number_prefix, $nigerian_phone_number_prefixes)) {
        return 3;
    }
 
    //Ensure the length of the number is 11 digits
    if(strlen($number)!== 11) {
        return 4;
    }
 
    return 5;
}
