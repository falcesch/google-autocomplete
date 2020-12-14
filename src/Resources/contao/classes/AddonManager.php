<?php
/**
 * This file is part of Contao EstateManager.
 *
 * @link      https://www.contao-estatemanager.com/
 * @source    https://github.com/contao-estatemanager/google-autocomplete
 * @copyright Copyright (c) 2019  Oveleon GbR (https://www.oveleon.de)
 * @license   https://www.contao-estatemanager.com/lizenzbedingungen.html
 */

namespace ContaoEstateManager\GoogleAutocomplete;

use Contao\Config;
use Contao\Environment;
use ContaoEstateManager\EstateManager;

class AddonManager
{
    /**
     * Bundle name
     * @var string
     */
    public static $bundle = 'EstateManagerAutocomplete';

    /**
     * Package
     * @var string
     */
    public static $package = 'contao-estatemanager/google-autocomplete';

    /**
     * Addon config key
     * @var string
     */
    public static $key  = 'addon_google_autocomplete_license';

    /**
     * Is initialized
     * @var boolean
     */
    public static $initialized  = false;

    /**
     * Is valid
     * @var boolean
     */
    public static $valid  = false;

    /**
     * Licenses
     * @var array
     */
    private static $licenses = [
        '62ba1e00696f256b7618e624cb91c282',
        '3dc884df5d1ad3e8ffd15c569dc09d21',
        '1db7975803def3642f4f2ee3e9a3e42e',
        '4c93d545441f88fafaf2c4a51b202d95',
        '6cd44f95764691417435ef7c813afb94',
        'aea68b90d882f5ebf435f58cc00e84fb',
        '1b71451492c7767da5a16fd6bd2f2e4b',
        'abf9c5738042e743a3d99cf1bdfff806',
        '994dfe3664dd35529daa2b8d85d8e25e',
        '1febc447108a1db9c0143341124915b3',
        '57518f86aca2dd401aecc90e9d6c13d4',
        '67ceea26973c506197c719b86a4f9374',
        '03972435acf5fbf7fc5e7e7ff5a70250',
        'cc0bea6d36b001fb0e719cc5d0ba71f7',
        '047fbf28dd933752eb6bece1e3480d6f',
        '910ca6e63959fb2b6a091cf44a69e2c0',
        '7d3b7132f36338766e188977249a54bf',
        '839eadbbe3016a65a0cce2b6973969cc',
        '3e8ddee3c3dcbc8651b080ef80c7b4ae',
        '6dcaf89e627070173edd91d569efa311',
        '2177f57001eae53fba3b423d09379774',
        '1b363b58a2bdaf325f375bd72348a80d',
        '826c6f0ebf9bd2f03d58815acc98243b',
        'e0992f948c2736c1e8a74e6b79c13984',
        '6b5054472862b6f757e8d8f76d8d465c',
        'fdf2c33a08790f95666e861edcdb2e2a',
        '92cc87e5e0227cc1e1c52572c4b7862c',
        '190bba1f861db20062904c7f492be8ac',
        'eea5aa174d715c26fbda0d476c02a4b9',
        '38039eab1e50d13aa68ccd2c05acb101',
        '2bbd6837ad8b837e9df2be58e789c6f9',
        '33f3268d02ac1918a987d7bb2a04ebbe',
        '4a0518689bbb1e4f364fc9804893dbec',
        '048d83c9c840f6027cdeca81724a181e',
        '714d9365f61f8472b22560623eaa1cd7',
        'bb31ae6b0c9c3d0dd5dadb71b78885d5',
        '92d27bcc1b6e4cea3ae5acb58f8c64a1',
        'e8338e2d6531e3fa20add5c184a85448',
        'de8f41d7fd44784eb9422001fd130ba0',
        '05cc45c698c60f1e77c50fc9bb44d385',
        'f207fe81558426f82c5dd2d6f07bd470',
        '51eecf09bb697596ebace9909b123daf',
        'd801f40f917849052b47051e6913000c',
        'bccdec808d2c02c3287a37f45cbc8ba5',
        '8f9691b0b7133de0525ce9bf12264176',
        '002480305b6a9365eb5e6a4355cc72e9',
        '4592892285cf4ad604508ceed6b1ad0a',
        'aae14138a3fdf6c9d3a50eb66d129670',
        '1109c7cd3400c037d4ab98583f9e85f5',
        '1db1e078185faa49b530213c4e649f02'
    ];

    public static function getLicenses()
    {
        return static::$licenses;
    }

    public static function valid()
    {
        if(strpos(Environment::get('requestUri'), '/contao/install') !== false)
        {
            return true;
        }

        if (static::$initialized === false)
        {
            static::$valid = EstateManager::checkLicenses(Config::get(static::$key), static::$licenses, static::$key);
            static::$initialized = true;
        }

        return static::$valid;
    }

}
