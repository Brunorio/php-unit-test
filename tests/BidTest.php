<?php 

use PHPUnit\Framework\TestCase;

class BidTest extends TestCase {

  public static function invalidValuesProvider(){
    return [
      "Zero" => [0],
      "Negative" => [-250]
    ];
  }

  /**
   * @dataProvider invalidValuesProvider
   */
  public function testGivenBidWithValueZeroOrNegativaWhenInitThenThrowException($value){
    $user = new User("Bruno Santos");
    $this->expectException(\InvalidArgumentException::class);
    $bid = new Bid($user, $value);
  }
}
