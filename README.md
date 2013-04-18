# Eta
### A lightweight and transparent templating engine designed for prototypes and small web applications.  
Version **2.0.1**

---
The symbol for the Greek capital letter eta is H. Eta is often used in math as the symbol for efficiency.

This engine was designed for prototypes and small-scale web applications that need to be developed and deployed quickly and with minimal setup. Since Eta does not use custom template tags, projects can be easily turned over to a more robust framework like Cake or Yii at a later date.

### INSTALLATION
* Copy this file into a directory of your choosing and add the require_once to the file that is using Eta.
* The default directory for Eta is DocumentRoot/eta/ , but may be changed via <code>H::setHome()</code>.
* The default page template for Eta is base.view , but this may be changed via <code>H::setBase()</code>.

### USAGE
Here is a simple hello world example:
###### In your template
```php
Hello <?= $name ?>!
```
###### In your controller
```php
require_once("eta.php");
$who = "World";
echo H::render(null, [
    "name" => $who
]);
```  
And here is an example of a template include:
###### In your template
```php
<div id="myWidget">
    <?= H::render("neatWidget.html") ?>
</div>
```  
To set your default template directory:
```php
H::setHome("/path/to/my/templates");
```  

---
By Dan Cobb: cobbdb@gmail.com - [petitgibier.sytes.net](http://petitgibier.sytes.net)
