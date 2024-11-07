<?php

include("CarPolicy2.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form inputs
    $policyNumber = $_POST['policyNumber'];
    $yearlyPremium = (float)$_POST['yearlyPremium'];
    $dateOfLastClaim = $_POST['dateOfLastClaim'] ?? null;

    $carPolicy = new CarPolicy($policyNumber, $yearlyPremium);

    if (!empty($dateOfLastClaim)) {
        $carPolicy->setDateOfLastClaim($dateOfLastClaim);
    }

    $initialPremium = $carPolicy->yearlyPremium;
    $discountedPremium = $carPolicy->getDiscountedPremium();

    echo "<h1>Car Policy Premium Calculation</h1>";
    echo "<p>Policy Number: $policyNumber</p>";
    echo "<p>Initial Premium: $initialPremium</p>";
    echo "<p>Discounted Premium: $discountedPremium</p>";
} else {
    echo "<p>No data submitted. Please fill out the form.</p>";
}
?>
