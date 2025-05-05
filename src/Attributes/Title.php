<?php

namespace Pelmered\Enums\Attributes;

use Attribute;

#[Attribute]
class Title
{
    public const string NAME = 'title';

    public function __construct(
        public string $title,
    ) {}
}
