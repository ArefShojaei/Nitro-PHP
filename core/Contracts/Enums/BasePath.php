<?php

/**
 * @namespace
 */
namespace Core\Contracts\Enums;


/**
 * @desc base path folder enums
 * @class
 */
class BasePath {
    /**
     * @desc app folder path
     * @prop
     * @public
     * @constant {string}
     * @default
     * @return {string}
     */
    public const APP = "app/";

    /**
     * @desc core folder path
     * @prop
     * @public
     * @constant {string}
     * @default
     * @return {string}
     */
    public const CORE = "core/";

    /**
     * @desc bootstrap folder path
     * @prop
     * @public
     * @constant {string}
     * @default
     * @return {string}
     */
    public const BOOTSTRAP = "bootstrap/";

    /**
     * @desc configs folder path
     * @prop
     * @public
     * @constant {string}
     * @default
     * @return {string}
     */
    public const CONFIGS = "configs/";

    /**
     * @desc resources folder path
     * @prop
     * @public
     * @constant {string}
     * @default
     * @return {string}
     */
    public const RESOURCES = "resources/";

    /**
     * @desc routes folder path
     * @prop
     * @public
     * @constant {string}
     * @default
     * @return {string}
     */
    public const ROUTES = "routes/";

    /**
     * @desc storage folder path
     * @prop
     * @public
     * @constant {string}
     * @default
     * @return {string}
     */
    public const STORAGE = "storage/";
}