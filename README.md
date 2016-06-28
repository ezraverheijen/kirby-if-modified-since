# Kirby If Modified Since

Kirby plugin that handles the `If Modifed Since` functionality as described [here](https://varvy.com/ifmodified.html).

## Installation

1. Put `if-modified-since.php` into a new plugin folder `site/plugins/if-modified-since`
1. All your pages should now respond to `If Modified Since requests`.

### Options

If you want, you can ignore pages with specific templates from the `If Modified Since response`.
For instance, if you use templates for your XML sitemap, robots.txt file or any other custom template that does not represent a 'normal' content page.
In your config, put the template names in the plugin's ignore array like this:

```php
c::set('ifmodifiedsince.ignore', array('sitemap', 'robots', 'feed'));
```
