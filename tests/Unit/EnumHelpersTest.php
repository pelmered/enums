<?php

use Pelmered\Enums\Tests\Support\TestEnum;

test('enum cases can be accessed as static methods', function () {
    $first = TestEnum::FIRST();
    $second = TestEnum::SECOND();
    
    expect($first)->toBe('first');
    expect($second)->toBe('second');
});

test('can get names of all cases', function () {
    expect(TestEnum::names())->toBe(['FIRST', 'SECOND', 'THIRD', 'FOURTH']);
});

test('can get values of all cases', function () {
    expect(TestEnum::values())->toBe(['first', 'second', 'third', 'fourth']);
});

test('can get the name of a specific case', function () {
    expect(TestEnum::FIRST->name)->toBe('FIRST');
    expect(TestEnum::SECOND->name)->toBe('SECOND');
});

test('can get the value of a specific case', function () {
    expect(TestEnum::FIRST->value)->toBe('first');
    expect(TestEnum::SECOND->value)->toBe('second');
});

test('can convert enum to select array', function () {
    $selectArray = TestEnum::asSelectArray();
    
    expect($selectArray)->toBeArray()
        ->and($selectArray)->toHaveCount(4);
        
    // Test the first option
    expect($selectArray[0])->toBeArray()
        ->and($selectArray[0]['name'])->toBe('First case description')
        ->and($selectArray[0]['value'])->toBe('first');
    
    // Test the second option
    expect($selectArray[1])->toBeArray()
        ->and($selectArray[1]['name'])->toBe('Second case description')
        ->and($selectArray[1]['value'])->toBe('second');
});
