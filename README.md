# Kirby If-Modified-Since

![Version](https://img.shields.io/badge/version-1.1.0-green.svg) ![License](https://img.shields.io/badge/license-MIT-green.svg) ![Kirby Version](https://img.shields.io/badge/Kirby-2.3%2B-red.svg)

*Version 1.1.0*

Kirby plugin that handles the If-Modified-Since HTTP header functionality as described [here](https://varvy.com/ifmodified.html).

## Installation

Use one of the alternatives below.

### 1. Kirby CLI

If you are using the [Kirby CLI](https://github.com/getkirby/cli) you can install this plugin by running the following commands in your shell:

```
$ cd path/to/kirby
$ kirby plugin:install ezraverheijen/kirby-if-modified-since
```

### 2. Clone or download

1. [Clone](https://github.com/ezraverheijen/kirby-if-modified-since.git) or [download](https://github.com/ezraverheijen/kirby-if-modified-since/archive/master.zip) this repository.
2. Unzip the archive if needed and rename the folder to `if-modified-since`.

**Make sure that the plugin folder structure looks like this:**

```
site/plugins/if-modified-since/
```

### 3. Git Submodule

If you know your way around Git, you can download this plugin as a submodule:

```
$ cd path/to/kirby
$ git submodule add https://github.com/ezraverheijen/kirby-if-modified-since.git site/plugins/if-modified-since
$ git submodule update --init --recursive
```

## Setup

No additional setup needed. All your pages should now respond to incoming 'If Modified Since requests'.

## Options

If you want, you can ignore pages with specific templates from the 'If-Modified-Since response'.

In your `/site/config/config.php` file, put the template names in the plugin's ignore array like this:

```php
c::set('ifmodifiedsince.ignore', array('api', 'hidden', 'feed'));
```

## Changelog

**1.1.0**

- Converted plugin repository according to [Kirby Plugin Boilerplate](https://github.com/jenstornell/kirby-boiler-plugin)

**1.0.0**

- Initial release

## Requirements

- [**Kirby**](https://getkirby.com/) 2.3+

## Disclaimer

This plugin is provided "as is" with no guarantee. Use it at your own risk and always test it yourself before using it in a production environment. If you find any issues, please [create a new issue](https://github.com/ezraverheijen/kirby-if-modified-since/issues/new).

## License

[MIT](https://opensource.org/licenses/MIT)

It is discouraged to use this plugin in any project that promotes racism, sexism, homophobia, animal abuse, violence or any other form of hate speech.

## Credits

- [Ezra Verheijen](https://github.com/ezraverheijen)
