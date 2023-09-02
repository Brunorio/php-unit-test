<?php 

use PHPUnit\Framework\TestCase;

class EvaluatorTest extends TestCase {

  public function testGivenAuctionWithoutBidWhenEvaluatorValidadeThenExpectedException() {
    $auction = new Auction("Golf GLI 0Km");
    $this->expectException(\InvalidArgumentException::class);
    $evaluator = new Evaluator($auction);
  }

  public function testGivenAAuctionWithTwoBidsWhenEvaluatorValidateWinningThenWinningBidValueShouldMax(){
    $auction = new Auction("Jeep Renegade LGTD T270 0Km");

    $bruno = new User("Bruno");
    $thais = new User("Thais");

    $auction->placeBid(new Bid($bruno, 2500));
    $auction->placeBid(new Bid($thais, 6500));

    $evaluator = new Evaluator($auction);

    $winningBid = $evaluator->getWinningBid();

    $this->assertEquals($winningBid->getValue(), 6500);
  }

  public function testGivenAAuctionWithFourBidsWhenEvaluatorValidatLoserThenLoserBidValueShouldMin(){
    $auction = new Auction("Jeep Renegade LGTD T270 0Km");

    $bruno = new User("Bruno");
    $thais = new User("Thais");

    $auction->placeBid(new Bid($bruno, 2500));
    $auction->placeBid(new Bid($thais, 6500));
    $auction->placeBid(new Bid($bruno, 8500));
    $auction->placeBid(new Bid($thais, 12500));

    $evaluator = new Evaluator($auction);

    $minimunBid = $evaluator->getMinimumBid();

    $this->assertEquals($minimunBid->getValue(), 2500);
  }
}