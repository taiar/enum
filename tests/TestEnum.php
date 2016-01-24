<?php

namespace EnumTests;
use taiar\Enum\AbstractEnum;

class TestEnum extends AbstractEnum {

  /** @var  TestEnum */
  public static $FIRST;

  /** @var  TestEnum */
  public static $SECOND;

  /** @var  TestEnum */
  public static $THIRD;

  public static function init() {
    static::$FIRST = static::register(new TestEnum('1st', 'The First One'));
    static::$SECOND = static::register(new TestEnum('2nd', 'The Second One'));
    static::$THIRD = static::register(new TestEnum('3rd', 'The Third One'));
  }
}

TestEnum::init();