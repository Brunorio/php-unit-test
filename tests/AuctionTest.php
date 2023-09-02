<?php 
use PHPUnit\Framework\TestCase;

class AuctionTest extends TestCase {

  public function testGivenAuctionAndTwoBidsWhenPlaceThisBidsIntoAuctionThenAuctionShouldHasTwoBids(){
    $auction = new Auction("Jeep Renegade LGTD T270 0Km");

    $bruno = new User("Bruno");
    $thais = new User("Thais");
    
    $bidOne = new Bid($bruno, 8300);
    $bidTwo = new Bid($thais, 2300);

    $auction->placeBid($bidOne);
    $auction->placeBid($bidTwo);

    $this->assertCount(2, $auction->getBids());
    $this->assertEquals($bidOne->getValue(), $auction->getBids()[0]->getValue());
    $this->assertEquals($bidTwo->getValue(), $auction->getBids()[1]->getValue());
  }

  public function testGivenAuctionWhenTwoBidFromSameUserIsPlaceInSequenceThenOnlyConsidareFirstBid() {
    $auction = new Auction("Jeep Renegade LGTD T270 0Km");

    $thais = new User("Thais");

    $bidTwo = new Bid($thais, 2300);
    $bidOne = new Bid($thais, 8300);

    $auction->placeBid($bidOne);
    $auction->placeBid($bidTwo);

    $this->assertCount(1, $auction->getBids());
    $this->assertEquals($bidOne->getValue(), $auction->getBids()[0]->getValue());
  }

  public function testGivenAuctionWhenOneUserPlaceMoreFiveBidsThenYourSixtethIsIgnored(){
    $auction = new Auction("Jeep Renegade LGTD T270 0Km");

    $bruno = new User("Bruno");
    $thais = new User("Thais");
    $livia = new User("Livia");
    $alice = new User("Alice");
    
    $auction->placeBid(new Bid($thais, 2300));
    $auction->placeBid(new Bid($bruno, 2400));
    $auction->placeBid(new Bid($livia, 2500));
    $auction->placeBid(new Bid($thais, 2800));
    $auction->placeBid(new Bid($alice, 3000));
    $auction->placeBid(new Bid($thais, 3200));
    $auction->placeBid(new Bid($livia, 4000));
    $auction->placeBid(new Bid($thais, 4200));
    $auction->placeBid(new Bid($bruno, 4600));
    $auction->placeBid(new Bid($thais, 5000));
    $auction->placeBid(new Bid($bruno, 6000));
    $auction->placeBid(new Bid($thais, 6500));

    $this->assertCount(11, $auction->getBids());
    $this->assertEquals(6000, $auction->getBids()[array_key_last($auction->getBids())]->getValue());
  }
}