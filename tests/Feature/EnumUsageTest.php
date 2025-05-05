<?php

use Pelmered\Enums\Tests\Support\TestEnum;

test('enums can be used in a real-world scenario', function () {
    // Simulate retrieving an enum from a database or request
    $enumValue = 'second';
    $enum = TestEnum::from($enumValue);

    expect($enum)->toBe(TestEnum::SECOND)
        ->and($enum->value)->toBe('second')
        ->and($enum->name)->toBe('SECOND');
});

test('enums can be used in a form select', function () {
    // Simulate generating options for a select field
    $options = TestEnum::asSelectArray();

    // Verify the structure that would be used in a form
    expect($options)->toBeArray()
        ->toHaveCount(4);

    // Check that we can find a specific option
    $secondOption = collect($options)->firstWhere('value', 'second');
    expect($secondOption['name'])->toBe('Second case description');
});

test('enum can get metadata for UI display', function () {
    // Simulate getting an enum case and displaying its metadata in a UI
    $enum = TestEnum::THIRD;

    // Get data that might be shown in a detail view
    $title = TestEnum::getTitle($enum);
    $description = TestEnum::getDescription($enum);
    $helperText = TestEnum::getHelperText($enum);

    expect($title)->toBe('Third Title')
        ->and($description)->toBe('Third case description')
        ->and($helperText)->toBe('Helper text for third case');
});
