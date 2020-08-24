# Blicons

<p align="center">
    <img src="/art/socialcard.png" width="1280" title="Blicons – SVG icon sprite for your Laravel Blade views.">
    <p align="center">
        <a href="https://packagist.org/packages/caneco/blicons"><img alt="Total Downloads" src="https://img.shields.io/packagist/dt/caneco/blicons"></a>
    </p>
</p>

A package to use your SVG icon sprite for your Laravel Blade views.

## Installation

You can install the package via composer:

```bash
composer require caneco/blicons
```

You can publish the expected icons resource folder and default icon

```bash
php artisan vendor:publish --provider="Caneco\Blicons\BliconsServiceProvider"
```

## Usage

Add your icon set in the resources folder

**Example:**

```
resources/icons/user.svg
resources/icons/file.svg
resources/icons/mail.svg
```

Run the artisan command to create a cache file of you icon set

```bash
php artisan cache:icons
```

Add the icon sprite list in your Blade layout (generally at the bottom)

```html
<x-icon-list/>
```

And use the icons at will in your Blade views

```html
<x-icon type="user" class="text-red-500 w-8 h-8"/>
```

## Testing

``` bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Credits

- [Caneco](https://github.com/Caneco)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
