<?php
error_reporting(0);

class Config
{
    private $values = [
        'first'     => "apple",
        'third'    => "banana"
    ];

    public function getValues() {
        return $this->values;
    }
}

$config = new Config();

$config->getValues()['second'] = 'mango';

echo $config->getValues()['first'] . PHP_EOL;
echo $config->getValues()['second']. PHP_EOL;
echo $config->values['third']. PHP_EOL;


/** ISSUES
 * The declared class "Config" 
 * has a private property "$values" which is an array
 * 1: you cannot access private property $values using "$config->getValues('third')"
 * Reason: it has a private access modifier which can only be accessed within the class via methods or functions
 * 
 * 2: To access all properties of the class, 
 * you need to declare separate instance of the class object, eg $config1, $config2
 */

 ## To fix the issue
 ## we need to access the properties of the class object 
 ## by invoking the public method "getValues()" 
 ## which in turn returns the private properties
 
 // Solution
 $config->getValues('third');

 // this will echo the banana which is the second index of $values array
