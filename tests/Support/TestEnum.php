<?php

namespace Pelmered\Enums\Tests\Support;

use Pelmered\Enums\Attributes\Description;
use Pelmered\Enums\Attributes\HelperText;
use Pelmered\Enums\Attributes\Title;
use Pelmered\Enums\Concerns\EnumHelpers;

enum TestEnum: string
{
    use EnumHelpers;

    #[Description('First case description')]
    #[Title('First Title')]
    #[HelperText('Helper text for first case')]
    case FIRST = 'first';

    #[Description('Second case description')]
    #[Title('Second Title')]
    #[HelperText('Helper text for second case')]
    case SECOND = 'second';

    #[Description('Third case description')]
    #[Title('Third Title')]
    #[HelperText('Helper text for third case')]
    case THIRD = 'third';

    // Case without attributes to test fallbacks
    case FOURTH = 'fourth';
}
