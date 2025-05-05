<?php

namespace Pelmered\Enums\Concerns;

use ArchTech\Enums\InvokableCases;
use ArchTech\Enums\Metadata;
use ArchTech\Enums\Names;
use ArchTech\Enums\Values;

trait EnumHelpers
{
    use HasAttributes, InvokableCases, Metadata, Names, Values;

    /**
     * @return array<string,string>
     */
    public static function asSelectArray(): array
    {
        /** @var array<string,string> $values */
        $values = collect(self::cases())
            ->map(function ($enum): array {
                return [
                    'name'  => self::getDescription($enum),
                    'value' => $enum->value,
                ];
            })->toArray();

        return $values;
    }
}
