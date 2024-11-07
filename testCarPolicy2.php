<?php
require_once 'CarPolicy2.php';

// Test case: Policy with 4 years of no claims (expecting 10% discount)
$policy1 = new CarPolicy("12345", 1000);
$policy1->setDateOfLastClaim("2019-01-01"); // 4 years ago from 2023
echo $policy1->__toString() . "\n"; // Expected discounted premium: 900

// Test case: Policy with 6 years of no claims (expecting 15% discount)
$policy2 = new CarPolicy("67890", 1200);
$policy2->setDateOfLastClaim("2017-01-01"); // 6 years ago from 2023
echo $policy2->__toString() . "\n"; // Expected discounted premium: 1020

// Test case: Policy with less than 3 years of no claims (expecting no discount)
$policy3 = new CarPolicy("54321", 800);
$policy3->setDateOfLastClaim("2021-01-01"); // 2 years ago from 2023
echo $policy3->__toString() . "\n"; // Expected discounted premium: 800
?>
