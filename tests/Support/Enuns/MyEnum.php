<?php

namespace Pelmered\FilamentMoneyField\Tests\Support\Enuns;

use Pelmered\Enums\Concerns\EnumHelpers;

enum MyEnum: string
{
    use EnumHelpers;

    case DRAFT = 'draft';
    case PUBLISHED = 'published';
    case ARCHIVED = 'archived';
}
