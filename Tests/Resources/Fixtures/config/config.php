<?php

/*
 * This file is part of the Symfony CMF package.
 *
 * (c) 2011-2015 Symfony CMF
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

$container->loadFromExtension('cmf_rest', array(
    'dynamic' => array(
        'enabled' => true,
        'crud_controller_by_method' => 'test.controller',
    ),
));
