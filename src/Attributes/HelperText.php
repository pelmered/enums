<?php

namespace Pelmered\Enums\Attributes;

use Attribute;

#[Attribute]
class HelperText
{
    public const string NAME = 'helperText';

    public function __construct(
        public string $helperText,
    ) {}
}
