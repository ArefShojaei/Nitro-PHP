<?php

/**
 * @namespace
 */
namespace Core\View;


/**
 * @package
 */
use Core\View\Traits\{
    HasIncludeContent,
    HasCommentMessage,
    HasDynamicExpression,
    HasLoop,
    HasCondition,
    HasRegexPattern
};
use Core\{
    Validators\View as ViewValidator,
    Contracts\Interfaces\View as ViewInterface
};

/**
 * @desc View for template engine system
 * @class
 */
class View  implements ViewInterface {
    /**
     * @desc import traits
     */
    use HasIncludeContent, HasCommentMessage,
        HasDynamicExpression, HasLoop,
        HasCondition, HasRegexPattern;


    /**
     * @desc view file extention
     * @prop
     * @private
     * @constant {string}
     * @default
     * @return {string}
     */
    private const FILE_EXTENTION = ".hbs";

    /**
     * @desc view base path
     * @prop
     * @private
     * @constant {string}
     * @default
     * @return {string}
     */
    private const VIEW_BASE_PATH = "resources/views/";

    /**
     * @desc storage base path
     * @prop
     * @private
     * @constant {string}
     * @default
     * @return {string}
     */
    private const STORAGE_BASE_PATH = "storage/views/";



    /**
     * @desc unique view ID
     * @prop
     * @private
     * @static
     * @type {string}
     * @return {string}
     */
    private static string $id;

    /**
     * @desc view file
     * @prop
     * @private
     * @static
     * @return {string}
     */
    private static string $file;

    /**
     * @desc view file content
     * @prop
     * @private
     * @static
     * @type {string}
     * @return {string}
     */
    private static string $content;



    /**
     * @desc make an new view template file
     * @method
     * @public
     * @static
     * @name make
     * @param {string} $view - view name
     * @param {array} $data - all dynamic variables for using in the view
     * @return {void}
     */
    public static function make(string $view, array $data = []): void {
        # view file
        self::$file = self::VIEW_BASE_PATH . $view . self::FILE_EXTENTION;

        # generate new ID for the view
        self::$id = md5($view);

        # compile the view
        self::compile();

        # extract the data array to variables
        extract($data);

        # include the complied view
        require_once self::STORAGE_BASE_PATH . self::$id . ".php";
    }

    /**
     * @desc compile view engine
     * @method
     * @private
     * @static
     * @name compile
     * @return {void}
     */
    private static function compile(): void {
        # call the "parse" method for getting view content
        self::parse();

        # call the "includePartial" method for using the template engine utility
        self::includePartial();

        # call the "includeComment" method for using the template engine utility
        self::includeComment();

        # call the "includeForeach" method for using the template engine utility
        self::includeForeach();

        # call the "includeExpression" method for using the template engine utility
        self::includeExpression();

        # callthe "includeIfStatement" method for using the template engine utility
        self::includeIfStatement();


        # put the updated content in the compiled new view
        file_put_contents(self::STORAGE_BASE_PATH  . self::$id . ".php", self::$content);
    }


    /**
     * @desc parse view template content
     * @method
     * @private
     * @static
     * @name parse
     * @return {void}
     */
    private static function parse(): void {
        # check for existsing the view file
        ViewValidator::checkFileExists(self::$file);

        # get view content
        $content = file_get_contents(self::$file);

        # set the view content in the $content variable of this class
        self::$content = $content;
    }
}