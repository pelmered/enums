
# PHP Enums

A collection of Enum helpers for PHP

## Installation

```bash
composer require pelmered/enums
```

## Features

- Enum helpers

## TODO

- Implement more features
- Add tests
- Make open source

## Usage

```php
<?php

use Pelmered\Enums\Concerns\EnumHelpers;

Enum MyEnum: string
{
    use EnumHelpers;
    
    case DRAFT = 'draft';
    case PUBLISHED = 'published';
    case ARCHIVED = 'archived';
}
```


```php
<?php
MyEnum::asSelectArray();
/**
Outputs:
[
    'name'  => 'Draft',
]
 */

```

## License

MIT
