# Eta
### A lightweight PHP templating engine designed for rapid prototypes and small-scale web applications.

    composer require cobbdb/eta

[![Latest Stable Version](https://poser.pugx.org/cobbdb/eta/version.svg)](https://packagist.org/packages/cobbdb/eta) [![Monthly Downloads](https://poser.pugx.org/cobbdb/eta/d/monthly.svg)](https://packagist.org/packages/cobbdb/eta) [![License](https://poser.pugx.org/cobbdb/eta/license.svg)](https://packagist.org/packages/cobbdb/eta)

---
The symbol for the Greek capital letter eta is H. Eta is often used in math as the symbol for efficiency.

This engine was designed for prototypes and small-scale web applications that need to be developed and deployed quickly with minimal setup. Since Eta does not use custom template tags, projects can be easily turned over to a more robust framework like Cake or Yii in the future.

### Installation
* Copy this file into a directory of your choosing and add the require_once to the file that is using Eta.
* The default directory for Eta is ```./```, but may be changed via ```H::setHome()```.
* The default page template for Eta is ```./base.view```, but this may be changed via ```H::setBase()```.

### Usage
###### Here is a simple hello world example:
```php
// index.php
require_once "H.php";
$who = "World";
echo H::render(null, [
    "name" => $who
]);
```
```php
// base.view
Hello <?= $name ?>!
```

###### Example of a template include:
```php
<div id="myWidget">
    <?= H::render("neat/widget.html") ?>
</div>
```


## render(path, [model], [grounded])
Render a template without auto-responding.

**Parameters**
* {String} path - Path to the template or null to use the base template.
* {Array} [model] - Data to inject into the template.
* {Boolean} [grounded] - False to use a literal path and bypass the home directory.

**Returns** {String}  
**Throws** {MissingTemplateException}

```php
// The 'grounded' argument can bypass the home directory
$myView = H::render("../my/template.html", [], false);
```


## setHome(path, [remember])
Set a new default views directory.

**Paramters**
* {String} path
* {Boolean} [remember] - True to retain this as the default directory for use with reset().

```php
// Default is the same directory in which eta.php file is placed.
H::setHome("/path/to/my/templates/");
```


## setBase(path)
Set a new default base page template.

**Paramters**
* {String} path - Complete path to new base template.

```php
// Default is ./base.view
H::setBase("/path/to/myBase.html");
// Now H::render(null) will use a new base template!
```


## reset()
Reset Eta back to default home directory.

```php
// Use special templates directory temporarily.
H::setHome("../path/to/other/templates/");
H::render("some/newThing.tpl");
H::render("and/another/template.html");
// Now reset home back to default for rest of project!
H::reset();
```

---
By Dan Cobb: <cobbdb@gmail.com> - [petitgibier.sytes.net](http://petitgibier.sytes.net)  
License: MIT
