<?php

/**
 * -------------------------------------------------------------------------
 * logocamy plugin for GLPI
 * -------------------------------------------------------------------------
 *
 * MIT License
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 * -------------------------------------------------------------------------
 * @copyright Copyright (C) 2026 by the logocamy plugin team.
 * @license   MIT https://opensource.org/licenses/mit-license.php
 * @link      https://github.com/pluginsGLPI/logocamy
 * -------------------------------------------------------------------------
 */

use Glpi\Plugin\Hooks;
/** @phpstan-ignore theCodingMachineSafe.function (safe to assume this isn't already defined) */
//VERSION DEL PLUGIN
define('PLUGIN_LOGOCAMY_VERSION', '0.0.1');

// Minimal GLPI version, inclusive
/** @phpstan-ignore theCodingMachineSafe.function (safe to assume this isn't already defined) */
// VERSION MINIMA DE GLPI
define("PLUGIN_LOGOCAMY_MIN_GLPI_VERSION", "11.0.6");

// Maximum GLPI version, exclusive
/** @phpstan-ignore theCodingMachineSafe.function (safe to assume this isn't already defined) */
// VERSION MAXIMA DE GLPI
define("PLUGIN_LOGOCAMY_MAX_GLPI_VERSION", "11.1.0");

/**
 * Init hooks of the plugin.
 * REQUIRED
 */
function plugin_init_logocamy(): void {
    global $PLUGIN_HOOKS;

    //Esta linea indica que al mostrar la pantalla principal de GLPI, se active la funcion "plugin_logocamy_display_central"
    $PLUGIN_HOOKS[Hooks::DISPLAY_CENTRAL]['logocamy'] = 'plugin_logocamy_display_central';

    $PLUGIN_HOOKS[Hooks::ADD_CSS]['logocamy'] = 'front/internal.css.php';
}

/**
 * Get the name and the version of the plugin
 * REQUIRED
 */
function plugin_version_logocamy(): array
{
    return [
        'name'           => 'logocamy',
        'version'        => PLUGIN_LOGOCAMY_VERSION,
        'author'         => 'David Fernando Pérez Ortiz',
        'license'        => 'MIT',
        'homepage'       => '',
        'requirements'   => [
            'glpi' => [
                'min' => PLUGIN_LOGOCAMY_MIN_GLPI_VERSION,
                'max' => PLUGIN_LOGOCAMY_MAX_GLPI_VERSION,
            ],
        ],
    ];
}


/**
 * Check pre-requisites before install
 * OPTIONAL
 */

//GLPI_VERSION se una constante global que se activa al encender GLPI.
function plugin_logocamy_check_prerequisites(): bool {
    if(version_compare(GLPI_VERSION , PLUGIN_LOGOCAMY_MIN_GLPI_VERSION , '<')){
        echo "La versión de GLPI utilizada es menor a: " .PLUGIN_LOGOCAMY_MIN_GLPI_VERSION;
        return false;
    }
    if(version_compare(GLPI_VERSION , PLUGIN_LOGOCAMY_MAX_GLPI_VERSION , '>=')){
        echo "La versión de GLPI utilizada es mayor a: " .PLUGIN_LOGOCAMY_MAX_GLPI_VERSION;
        return false;
    }
    if(version_compare(PHP_VERSION , '8.2' , '<')){
        echo "Su versión de PHP es: " .PHP_VERSION ." y la versión minima necesaria es 8.2";
        return false;
    }
    return true;
}

/**
 * Check configuration process
 * OPTIONAL
 *
 * @param bool $verbose Whether to display message on failure. Defaults to false.
 */
function plugin_logocamy_check_config(bool $verbose = false): bool {
    // Your configuration check
    return true;

    // Example:
    // if ($verbose) {
    //    echo __('Installed / not configured', 'logocamy');
    // }
    // return false;
}
