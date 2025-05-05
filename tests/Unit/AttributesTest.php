<?php

use Pelmered\Enums\Attributes\Description;
use Pelmered\Enums\Attributes\HelperText;
use Pelmered\Enums\Attributes\Title;

test('Description attribute can be instantiated', function () {
    $description = new Description('Test description');
    expect($description->description)->toBe('Test description');
});

test('Description has correct constant name', function () {
    expect(Description::NAME)->toBe('description');
});

test('Title attribute can be instantiated', function () {
    $title = new Title('Test title');
    expect($title->title)->toBe('Test title');
});

test('Title has correct constant name', function () {
    expect(Title::NAME)->toBe('title');
});

test('HelperText attribute can be instantiated', function () {
    $helperText = new HelperText('Test helper text');
    expect($helperText->helperText)->toBe('Test helper text');
});

test('HelperText has correct constant name', function () {
    expect(HelperText::NAME)->toBe('helperText');
});
