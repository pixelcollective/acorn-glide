## Acorn - Glide Image Manipulation (WIP)

Use [Glide by The League of Extraordinary Packages](https://glide.thephpleague.com/) to manipulate images in your Acorn application.

## Requirements

[Sage](https://github.com/roots/sage) >= 10.0

[PHP](https://secure.php.net/manual/en/install.php) >= 7.3

[Composer](https://getcomposer.org)

## Installation

Install via composer:

```bash
composer require tiny-pixel/acorn-glide
```

After installation run the following command to publish the starter configuration file to your application:

```bash
wp acorn vendor:publish
```

## Usage

Once installed, utilize Glide in your business code with:

```php
$this->app['glide-image']::glide($file, $parameters);
```

Please refer to the Glide documentation for the parameters and what they do.

In your views you can leverage the `@glide` directive. Note that this directive takes its parameters in `JSON` format.

```php
  <img src="@glide({"image": "/2019/07/map.png", "parameters": {"w": 300, "filt": "greyscale"}})" />
```
