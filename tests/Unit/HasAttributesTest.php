<?php

use Pelmered\Enums\Tests\Support\TestEnum;
use Pelmered\Enums\Attributes\Description;
use Pelmered\Enums\Attributes\Title;
use Pelmered\Enums\Attributes\HelperText;

test('can get description attribute from enum case', function () {
    $description = TestEnum::getDescription(TestEnum::FIRST);
    expect($description)->toBe('First case description');
});

test('can get title attribute from enum case', function () {
    $title = TestEnum::getTitle(TestEnum::SECOND);
    expect($title)->toBe('Second Title');
});

test('can get helper text attribute from enum case', function () {
    $helperText = TestEnum::getHelperText(TestEnum::THIRD);
    expect($helperText)->toBe('Helper text for third case');
});

test('returns null when attribute is not present', function () {
    $description = TestEnum::getDescription(TestEnum::FOURTH);
    $title = TestEnum::getTitle(TestEnum::FOURTH);
    $helperText = TestEnum::getHelperText(TestEnum::FOURTH);

    expect($description)->toBeNull()
        ->and($title)->toBeNull()
        ->and($helperText)->toBeNull();
});

test('getAttribute returns the attribute value when present', function () {
    $description = TestEnum::getAttribute(TestEnum::FIRST, Description::class);
    expect($description)->toBe('First case description');
});
