# Shyffon Homepage & CRUD Example

NSY PHP Framework Example with HTML5 Boilerplate and Foundation CSS Framework. This also provides Font-Awesome and several optimizations for Datatables plugin.

This is an example of a `CRUD` program & homepage using the NSY Framework ([Shyffon Project](https://github.com/kazuyamarino/shyffon)), i hope it can be useful for everyone to start using NSY as the project framework. I made this because I know that everyone loves `CRUD`..so Enjoy it!

Site example :
[https://shyffon.nsyframework.com](https://shyffon.nsyframework.com)

## How to dating with Shyffon?

### Download from Github

* Download source from this link [https://github.com/kazuyamarino/shyffon/releases](https://github.com/kazuyamarino/shyffon/releases).
* Simply rename the source folder that has been downloaded to `shyffon` & copy it to your `html` or `htdocs` or anythings folder.
* For apache, please go to the `docs/apache` folder and read the Readme.txt.

```text
// Apache Readme.txt
1. Copy .htaccess inside 'for_public' folder to 'public' folder
2. Copy .htaccess inside 'for_root' folder to 'root(shyffon)' folder
```

* Go to the `docs/env.example` folder and copy the `env.example` to root folder, and rename it to `env`.
* Import database example. (see below)
* And save the date..

### From Composer

#### Install NSY by creating a new directory called `blog`

```shell
composer create-project --prefer-dist vikry/shyffon blog
```

#### Restart Bash

```shell
source ~/reloader.sh
```

#### NSY Setup

```shell
cd blog && nsy --setup

Enter directory name >
blog
```

---

```text
For nginx, please go to the `docs/nginx` folder and read the `Readme.txt` too.

// Nginx Readme.txt
1. Open 'sudo nano /etc/nginx/sites-enabled/default'
2. Copy the text in the 'default' file and paste it to /etc/nginx/sites-enabled/default
3. And restart nginx service, 'sudo service nginx restart'
```

---

## Database Example

There is an example database (sql file) in the `dump` folder. You can restore the sql file to a database that you created yourself.

## Shyffon contain package

* [Datatables jQuery Javascript Library](https://www.datatables.net/) with Responsive Plugin
* [Foundation Zurb Framework](https://foundation.zurb.com/)
* [JQuery](https://jquery.com/)
* [Modernizr](https://modernizr.com/)
* [WhatInputJs](https://github.com/ten1seven/what-input)
* [Font Awesome CDN](https://fontawesome.com/)

## Browser support test

NSY is made with Foundation CSS Framework. This information is based on [Foundation Compatibility](https://foundation.zurb.com/sites/docs/compatibility.html).

>Foundation is tested across many browsers and devices, and works back as far as IE9 and Android 2.

## Overview

<table class="docs-compat-table">
  <tr>
    <td>Chrome</td>
    <td class="works" rowspan="7">Last Two Versions</td>
  </tr>
  <tr><td>Firefox</td></tr>
  <tr><td>Safari</td></tr>
  <tr><td>Opera</td></tr>
  <tr><td>Mobile Safari<sup>1</sup></td></tr>
  <tr><td>IE Mobile</td></tr>
  <tr><td>Edge</td></tr>
  <tr>
    <td>Internet Explorer</td>
    <td class="works">Versions 9+</td>
  </tr>
  <tr>
    <td>Android Browser</td>
    <td class="works">Versions 4.4+</td>
  </tr>
</table>

<sup>1</sup>iOS 7+ is actively supported but with some known bugs.

## What Won't Work?

* **The Grid:** Foundation's grid uses `box-sizing: border-box` to apply gutters to columns, but this property isn't supported in IE8.
* **Desktop Styles:** Because the framework is written mobile-first, browsers that don't support media queries will display the mobile styles of the site.
* **JavaScript:** Our plugins use a number of handy ECMAScript 5 features that aren't supported in IE8.

*This doesn't mean that NSY cannot be used in older browsers,
just that we'll ensure compatibility with the ones mentioned above.*
*NSY Browser support information based on [Foundation Zurb Compatibility](https://foundation.zurb.com/sites/docs/compatibility.html).*

---

## NSY Framework

NSY is a simple PHP Framework that works well on MVC or HMVC mode.

Site example :
[https://nsyframework.com/](https://nsyframework.com/)

See further explanation here... [NSY Documentation](https://github.com/kazuyamarino/nsy-docs/blob/master/README.md) *(Documentation is undercontruction, sorry for many information have been missed)*

## License

The code is available under the [MIT license](LICENSE.txt)..
