<?php namespace ShoppingCart\Storage;

/**
 * Part of the Cart package.
 * NOTICE OF LICENSE
 * Licensed under the Extensions PSL License.
 * This source file is subject to the Extensions PSL License that is
 * bundled with this package in the license.txt file.
 * @package    Cart
 * @version    1.0.2
 * @author     Extensions LLC
 * @license    Extensions PSL
 * @copyright  (c) 2011-2014, Extensions LLC
 * @link       http://Extensions.com
 */
interface StorageInterface
{

    /**
     * Returns the session key.
     * @return string
     */
    public function getKey();

    /**
     * Return the session instance.
     * @return string
     */
    public function identify();

    /**
     * Get the value from the storage.
     * @return mixed
     */
    public function get();

    /**
     * Put a value.
     * @param  mixed $value
     * @return void
     */
    public function put($value);

    /**
     * Checks if an attribute is defined.
     * @return bool
     */
    public function has();

    /**
     * Remove the storage.
     * @return void
     */
    public function forget();
}
