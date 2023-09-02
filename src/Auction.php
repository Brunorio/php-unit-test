<?php

class Auction {
    private array $bids;
    private string $description;

    public function __construct(string $description) {
        $this->description = $description;
        $this->bids = [];
    }

    public function placeBid(Bid $bid) {
        if(!empty($this->bids) && $this->getLastBidUser() == $bid->getUser())
            return; 

        if($this->getTotalBidsPerUser($bid->getUser()) < 5)
            $this->bids[] = $bid;
    }

    public function getBids(): array {
        return $this->bids;
    }

    private function getLastBidUser(){
        return $this->bids[array_key_last($this->bids)]->getUser();
    }

    private function getTotalBidsPerUser(User $user){
        $counter = 0;
        foreach($this->bids as $bid)
            if($bid->getUser() === $user)    
                $counter++;

        return $counter;
    }
}
