<?php

namespace Google\Protobuf\Field;

class Kind
{
   public const TYPE_UNKNOWN = 0;
   public const TYPE_DOUBLE = 1;
   public const TYPE_FLOAT = 2;
   public const TYPE_INT64 = 3;
   public const TYPE_UINT64 = 4;
   public const TYPE_INT32 = 5;
   public const TYPE_FIXED64 = 6;
   public const TYPE_FIXED32 = 7;
   public const TYPE_BOOL = 8;
   public const TYPE_STRING = 9;
   public const TYPE_GROUP = 10;
   public const TYPE_MESSAGE = 11;
   public const TYPE_BYTES = 12;
   public const TYPE_UINT32 = 13;
   public const TYPE_ENUM = 14;
   public const TYPE_SFIXED32 = 15;
   public const TYPE_SFIXED64 = 16;
   public const TYPE_SINT32 = 17;
   public const TYPE_SINT64 = 18;
    public static function name(...$parameters)
    {
    }
    public static function value(...$parameters)
    {
    }
}