<?php

namespace Pelmered\Enums\Concerns;

use ReflectionClassConstant;
use Pelmered\Enums\Attributes\Description;
use Pelmered\Enums\Attributes\HelperText;
use Pelmered\Enums\Attributes\Title;

trait HasAttributes
{
    public static function getAttribute(self $enum, $attribute): ?string
    {
        /** @var Enum $enum */
        $ref             = new ReflectionClassConstant(self::class, $enum->name);
        $classAttributes = $ref->getAttributes($attribute);

        // If no attribute is found, return the enum value
        if ($classAttributes === []) {
            if (method_exists($attribute, 'fallbackTransformer')) {
                return $attribute::fallbackTransformer($enum);
            }

            return null;
        }

        $instance = $classAttributes[0]->newInstance();
        $nameConstant = $attribute::NAME;

        // Return the property based on the attribute's NAME constant
        return $instance->{$nameConstant};
    }

    public static function getTitle(self $enum): ?string
    {
        return self::getAttribute($enum, Title::class);
    }

    public static function getHelperText(self $enum): ?string
    {
        return self::getAttribute($enum, HelperText::class);
    }

    public static function getDescription(self $enum): ?string
    {
        return self::getAttribute($enum, Description::class);
    }
}
