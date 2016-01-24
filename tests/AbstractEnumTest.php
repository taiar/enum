<?php

namespace EnumTests;
use taiar\Enum\AbstractEnum;

class Test extends \PHPUnit_Framework_TestCase {

  public function testGetCodes() {
    $this->assertEquals(TestEnum::$FIRST->getCode(),  "1st");
    $this->assertEquals(TestEnum::$SECOND->getCode(), "2nd");
    $this->assertEquals(TestEnum::$THIRD->getCode(),  "3rd");
  }

  public function testGetDescriptions() {
    $this->assertEquals(TestEnum::$FIRST->getDescription(), "The First One");
    $this->assertEquals(TestEnum::$SECOND->getDescription(), "The Second One");
    $this->assertEquals(TestEnum::$THIRD->getDescription(), "The Third One");
  }

  public function testGetArray() {
    $arr = TestEnum::getArray();
    $this->assertArrayHasKey('1st', $arr);
    $this->assertArrayHasKey('2nd', $arr);
    $this->assertArrayHasKey('3rd', $arr);

    $this->assertEquals($arr['1st'], "The First One");
    $this->assertEquals($arr['2nd'], "The Second One");
    $this->assertEquals($arr['3rd'], "The Third One");
  }

}
