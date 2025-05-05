<?php

namespace Pelmered\Enums\Attributes;

use Attribute;
use BackedEnum;

#[Attribute]
class Description
{
    public const string NAME = 'description';

    public function __construct(
        public string $description,
    ) {}

    public static function fallbackTransformer(BackedEnum $enum) 
    {
        return null;
    }
}
