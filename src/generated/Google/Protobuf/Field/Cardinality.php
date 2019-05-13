<?php

namespace Google\Protobuf\Field;

class Cardinality
{
   public const CARDINALITY_UNKNOWN = 0;
   public const CARDINALITY_OPTIONAL = 1;
   public const CARDINALITY_REQUIRED = 2;
   public const CARDINALITY_REPEATED = 3;
    public static function name(...$parameters)
    {
    }
    public static function value(...$parameters)
    {
    }
}