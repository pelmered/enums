<?php

namespace Pelmered\Enums\Attributes;

use Attribute;

#[Attribute]
class Description
{
    public const string NAME = 'description';

    public function __construct(
        public string $description,
    ) {}

    public static function fallbackTransformer(Enum $enum) {}
}
