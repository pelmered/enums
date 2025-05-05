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

        return $classAttributes[0]->newInstance()->{Description::NAME};
    }

    private static function getTitle(self $enum): string
    {
        return self::getAttribute($enum, Title::class);
    }

    private static function getHelperText(self $enum): string
    {
        return self::getAttribute($enum, HelperText::class);
    }

    private static function getDescription(self $enum): string
    {
        return self::getAttribute($enum, Description::class);
    }
}
