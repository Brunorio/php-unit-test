<?php 

class Evaluator {
  private Auction $auction;
  public function __construct(Auction $auction){
    $this->auction = $auction;
    $this->validate();
  }

  public function validate(){
    if(count($this->auction->getBids()) === 0)
      throw new InvalidArgumentException("Auction must have at least one bid");
  }
  public function getWinningBid(){
    $bids = $this->auction->getBids();
    $winningBid = null;
    $maxValue = -INF;

    foreach($bids as $bid){
      if($maxValue < $bid->getValue()){
        $maxValue = $bid->getValue();
        $winningBid = $bid;
      }
    }
    return $winningBid;
  }

  public function getMinimumBid(){
    $bids = $this->auction->getBids();
    $minimunBid = null;
    $minValue = INF;

    foreach($bids as $bid){
      if($minValue > $bid->getValue()){
        $minValue = $bid->getValue();
        $minimunBid = $bid;
      }
    }
    return $minimunBid;
  }
}