<?php

namespace Pelmered\Enums\Concerns;

use ArchTech\Enums\InvokableCases;
use ArchTech\Enums\Metadata;
use ArchTech\Enums\Names;
use ArchTech\Enums\Values;
use PhpStaticAnalysis\Attributes\Returns;

trait EnumHelpers
{
    use HasAttributes;
    use InvokableCases;
    use Metadata;
    use Names;
    use Values;

    #[Returns('array<string,string>')]
    public static function labels(): array
    {
        $cases = self::cases();

        // Basically a Laravel Arr::mapWithKeys function, be we don't depend on Laravel
        return array_reduce($cases, static function ($carry, $case) {
            return array_merge($carry, [$case->value => ucfirst($case->value)]);
        }, []);
    }

    public static function select(): array
    {
        return self::labels();
    }
}
