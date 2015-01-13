<?php

class MissingTemplateException extends Exception {}

class H {
    /** Current views directory. */
    private static $home = "./";
    /** Default views directory. */
    private static $defaultHome = "./";
    /** Current base page template. */
    private static $base = "./base.view";

    /**
     * Reset Eta back to default home directory.
     */
    public static function reset() {
        self::$home = self::$defaultHome;
    }

    /**
     * Set a new default views directory.
     * @param {String} path
     * @param {Boolean} [remember] True to retain this as the default directory.
     */
    public static function setHome($path, $remember = false) {
        self::$home = $path;
        if ($remember) {
            self::$defaultHome = $path;
        }
    }

    /**
     * Set a new default base page template.
     * @param {String} path Complete path to new base template.
     */
    public static function setBase($path) {
        self::$base = $path;
    }

    /**
     * Render a template without auto-responding.
     * @param {String} path Path to the template or null to use the base template.
     * @param {Array} [model] Data to inject into the template.
     * @param {Boolean} [grounded] False to use a literal path and bypass the home directory.
     * @returns {String}
     * @throws {MissingTemplateException}
     */
    public static function render($path, $model = Array(), $grounded = true) {
        if (!isset($path)) {
            $path = self::$base;
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
