# PHP Enums

A powerful collection of helpers and attributes for PHP backed enums.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/pelmered/enums.svg?style=flat-square)](https://packagist.org/packages/pelmered/enums)
[![Total Downloads](https://img.shields.io/packagist/dt/pelmered/enums.svg?style=flat-square)](https://packagist.org/packages/pelmered/enums)
[![MIT Licensed](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE)

## Introduction

This package provides a set of utilities to enhance PHP backed enums with additional functionality such as descriptions, titles, and helper texts. It builds upon the native PHP enum functionality introduced in PHP 8.1 and adds developer-friendly features.

## Requirements

- PHP 8.4 or higher

## Installation

You can install the package via composer:

```bash
composer require pelmered/enums
```

## Features

- **Enhanced Enum Attributes**: Add descriptions, titles, and helper texts to your enum cases
- **Easy Conversion**: Transform enums to arrays, names, or values for use in forms, APIs, etc.
- **Extensible**: Built on top of [archtechx/enums](https://github.com/archtechx/enums) with additional features
- **Developer Friendly**: Simple API designed for practical use cases
- **Well Documented**: Comprehensive documentation with examples

## Usage

### Creating Enhanced Enums

To use the enum helpers, simply add the `EnumHelpers` trait to your enum and apply attributes to your cases:

```php
<?php

namespace App\Enums;

use Pelmered\Enums\Concerns\EnumHelpers;
use Pelmered\Enums\Attributes\Description;
use Pelmered\Enums\Attributes\Title;
use Pelmered\Enums\Attributes\HelperText;

enum PostStatus: string
{
    use EnumHelpers;
    
    #[Description(description: 'A draft post that is not yet published')]
    #[Title(title: 'Draft')]
    #[HelperText(helperText: 'Only you can see this post')]
    case DRAFT = 'draft';
    
    #[Description(description: 'A published post visible to all visitors')]
    #[Title(title: 'Published')]
    case PUBLISHED = 'published';
    
    #[Description(description: 'An archived post no longer actively displayed')]
    #[Title(title: 'Archived')]
    case ARCHIVED = 'archived';
}
```

### Using Enum Attributes

Once your enum is set up with attributes, you can access them using the provided helper methods:

```php
// Get the description for a case
PostStatus::getDescription(PostStatus::DRAFT);  // "A draft post that is not yet published"

// Get the title for a case
PostStatus::getTitle(PostStatus::PUBLISHED);    // "Published"

// Get the helper text for a case
PostStatus::getHelperText(PostStatus::DRAFT);   // "Only you can see this post"
```

#### Available Attributes

| Attribute      | Purpose                                   | Accessor Method          |
|----------------|-------------------------------------------| ------------------------ |
| `Description`  | Add detailed information about an enum case | `getDescription()`     |
| `Title`        | Provide a human-friendly display label    | `getTitle()`           |
| `HelperText`   | Add context or instructions for users     | `getHelperText()`      |

### Converting Enums for UI and Forms

Transform your enums into formats suitable for dropdowns, UI components, and APIs:

```php
// Get all cases as an array for select dropdowns
PostStatus::asSelectArray();
/*
[
    [
        'name' => 'A draft post that is not yet published',
        'value' => 'draft',
    ],
    [
        'name' => 'A published post visible to all visitors',
        'value' => 'published',
    ],
    [
        'name' => 'An archived post no longer actively displayed',
        'value' => 'archived',
    ],
]
*/

// Get all case names
PostStatus::names();  // ['DRAFT', 'PUBLISHED', 'ARCHIVED']

// Get all case values
PostStatus::values(); // ['draft', 'published', 'archived']

// Access enums as functions (from InvokableCases trait)
PostStatus::DRAFT();  // returns 'draft'
```

## Advanced Usage

### Custom Attributes

You can create your own attributes by following this pattern:

```php
<?php

namespace App\Enums\Attributes;

use Attribute;
use BackedEnum;

#[Attribute]
class Color
{
    public const string NAME = 'color';

    public function __construct(
        public string $color,
    ) {}

    public static function fallbackTransformer(BackedEnum $enum) 
    {
        // Provide a fallback when attribute is not present
        return 'gray';
    }
}
```

Then extend the `HasAttributes` trait to add your custom attribute getter:

```php
trait MyEnumAttributes
{
    use \Pelmered\Enums\Concerns\HasAttributes;
    
    public static function getColor(self $enum): ?string
    {
        return self::getAttribute($enum, Color::class);
    }
}
```

You can now use your attribute in your enums:

```php
enum ButtonType: string
{
    use EnumHelpers, MyEnumAttributes;

    #[Color(color: 'blue')]
    case PRIMARY = 'primary';

    #[Color(color: 'gray')]
    case SECONDARY = 'secondary';

    #[Color(color: 'red')]
    case DANGER = 'danger';
}

// Usage
ButtonType::getColor(ButtonType::PRIMARY); // "blue"
```

## Testing

```bash
composer test
```

## Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add some amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.

## Credits

- [Peter Elmered](https://github.com/pelmered)
- [All Contributors](../../contributors)
