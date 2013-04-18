# Eta
### A lightweight and transparent templating engine designed for prototypes and small web applications.
Version **2.0.1**

---
The symbol for the Greek capital letter eta is H. Eta is often used in math as the symbol for efficiency.

This engine was designed for prototypes and small-scale web applications that need to be developed and deployed quickly with minimal setup. Since Eta does not use custom template tags, projects can be easily turned over to a more robust framework like Cake or Yii at a later date.

### Installation
* Copy this file into a directory of your choosing and add the require_once to the file that is using Eta.
* The default directory for Eta is DocumentRoot/eta/ , but may be changed via ```H::setHome()```.
* The default page template for Eta is base.view , but this may be changed via ```H::setBase()```.

### Usage
###### Here is a simple hello world example:
> ```php
// index.php
require_once("eta.php");
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
> ```php
<div id="myWidget">
    <?= H::render("neatWidget.html") ?>
</div>
```


## render(path, [model], [grounded])
Render a template without auto-responding.

**Parameters**
* {String} path - Filename of the template to render.
* {Array} [model] - Data to inject into the template.
* {Boolean} [grounded] - False to use a literal path and bypass the home directory.

**Returns** {String}  
**Throws** {MissingTemplateException}

```php
// The 'grounded' argument can bypass the home directory
$myView = H::render("myTemplate.html", [], false);
```


## setHome(path)
Set a new default views directory.

**Paramters**
* {String} path

```php
// Default is DocumentRoot/eta/
H::setHome("/path/to/my/templates/");
```


## setBase(path)
Set a new default base page template.

**Paramters**
* {String} path - Complete path to new base template.

```php
// Default is DocumentRoot/eta/base.view
H::setBase("/path/to/myBase.html");
// Now H::render(null) will use a new base template!
```

---
By Dan Cobb: <cobbdb@gmail.com> - [petitgibier.sytes.net](http://petitgibier.sytes.net)
