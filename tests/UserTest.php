<?php 

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase {

  /**
   * @dataProvider invalidNames
   */
  public function testGivenUserEmptyNameWhenInitThenThrowException($name) {
    $this->expectException(\InvalidArgumentException::class);
    $user = new User($name);
  }

  public static function invalidNames(){
    return [
      "Name empty" => [""],
      "Name only space" => [" "],
    ];
  }


}