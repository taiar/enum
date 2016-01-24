<?php

namespace taiar\enum;

/**
 * Enum class
 */
abstract class AbstractEnum {

    protected static $VALUES;

    /** @var string */
    private $code;

    /** @var string */
    private $description;

    /**
     * Register enumeration items.
     * @param AbstractEnum $enum A enumeração a ser registrada.
     * @return AbstractEnum A própria enumeração passada como parâmetro.
     */
    protected static function register(AbstractEnum $enum) {
        static::$VALUES[$enum->getCode()] = $enum;
        return $enum;
    }

    /**
     * @return array
     */
    public static function getValues() {
        return static::$VALUES;
    }

    /**
     * Keys are the codes and values are the description
     * @return array
     */
    public static function getArray() {
      $ret = [];
      /** @var AbstractEnum $val */
      foreach (self::getValues() as $val)
          $ret[$val->getCode()] = $val->getDescription();
      return $ret;
    }

    /**
     * @param string $code
     * @return AbstractEnum|null
     */
    public static function getValue($code) {
      return ($code === null) ? null : static::$VALUES[$code];
    }

    /**
     * @return callable
     */
    public static function criarFuncaoGetDescricao() {
      return function($codigo) {
        return ($codigo == null) ? null : static::getValue($codigo)->getDescription();
      };
    }

    /**
     * @param AbstractEnum|null $enum
     * @return null||string
     */
    public static function getCodeoNullSafe($enum) {
      return ($enum === null) ? null : $enum->getCode();
    }

    protected function __construct($code, $description) {
      $this->code = $code;
      $this->description = $description;
    }

    /**
     * @return string
     */
    public function getCode() {
      return $this->code;
    }

    /**
     * @return string
     */
    public function getDescription() {
      return $this->description;
    }
}