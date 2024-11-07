<?php
class CarPolicy {
    private $policyNumber;
    private $yearlyPremium;
    private $dateOfLastClaim;

    public function __construct($policyNumber, $yearlyPremium) {
        $this->policyNumber = $policyNumber;
        $this->yearlyPremium = $yearlyPremium;
        $this->dateOfLastClaim = null;
    }

    public function setDateOfLastClaim($dateOfLastClaim) {
        $this->dateOfLastClaim = $dateOfLastClaim;
    }

    public function getTotalYearsNoClaims() {
        if ($this->dateOfLastClaim === null) {
            return 0;
        }
        
        $lastClaimDate = new DateTime($this->dateOfLastClaim);
        $currentDate = new DateTime();
        $interval = $lastClaimDate->diff($currentDate);
        
        return $interval->y;
    }

    public function getDiscount() {
        $yearsNoClaims = $this->getTotalYearsNoClaims();
        if ($yearsNoClaims > 5) {
            return 0.15; 
        } elseif ($yearsNoClaims >= 3) {
            return 0.10; 
        }
        return 0.0;
    }

    public function getDiscountedPremium() {
        $discount = $this->getDiscount();
        return $this->yearlyPremium * (1 - $discount);
    }

    public function __toString() {
        $discountedPremium = $this->getDiscountedPremium();
        return "Policy Number: $this->policyNumber, Yearly Premium: $this->yearlyPremium, " .
               "Date of Last Claim: $this->dateOfLastClaim, Discounted Premium: $discountedPremium";
    }
}
?>
