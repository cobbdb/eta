<?php

/**
 * eta.php
 * 
 * Eta is a lightweight and transparent templating engine designed for prototypes and small web applications.
 * The symbol for the Greek capital letter eta is H. Eta is often used in math as the symbol for efficiency.
 * 
 * ~ INSTALLATION ~
 * Copy this file into a directory of your choosing and add the require_once to the file that is using Eta.
 * The default directory for Eta is DocumentRoot/eta/ , but may be changed via H::setHome().
 * The default page template for Eta is base.view , but this may be changed via H::setBase().
 * 
 * @usage
 * echo H::render(null, [
 *     "someData" => $myData
 * ]);
 * 
 * @author Dan Cobb
 * @see http://proccli.com/2010/03/dead-simple-php-template-rendering/
 * @see //www.github.com/cobbdb/eta
 * @since 2.0.1
 */

class MissingTemplateException extends Exception {
}

final class H {
    /**
     * Establish the default views directory.
     */
    private static $home;
    /**
     * Establish the default base page template.
     */
    private static $base = "base.view";
    
    /**
     * Work-around for php rule against evaluation in static declaration.
     * Automatically called immediately after class definition.
     */
    public static function init() {
        self::$home = $_SERVER["DOCUMENT_ROOT"] . "/eta/";
    }
    
    /**
     * Set a new default views directory.
     * @param {String} path
     */
    public static function setHome($path) {
        self::$home = $path;
    }
    
    /**
     * Set a new default base page template.
     * @param {String} path
     */
    public static function setBase($path) {
        self::$base = $path;
    }
    
    /**
     * Render a template without auto-responding.
     * @param {String} [path] Filename of the template to render.
     * @param {Array} [model] Data to inject into the template.
     * @param {Boolean} [grounded] False to use a literal path and bypass the home directory.
     * @returns {String}
     */
    public static function render($path, $model = Array(), $grounded = true) {
        if (!isset($path)) {
            $path = self::$home . self::$base;
        } else if ($grounded) {
            $path = self::$home . $path;
        }
        
        if (file_exists($path)) {
            ob_start();
            extract($model);
            @include $path;
            return ob_get_clean();
        } else {
            throw new MissingTemplateException("Template: $path could not be found!");
        }
    }
}
// Work-around for php rule against evaluation in static declaration.
H::init();
