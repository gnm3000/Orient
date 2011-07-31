<?php

/*
 * This file is part of the Orient package.
 *
 * (c) Alessandro Nadalin <alessandro.nadalin@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Class Escaper
 *
 * @package     Orient
 * @subpackage  Validator
 * @author      Alessandro Nadalin <alessandro.nadalin@gmail.com>
 */

namespace Orient\Validator;

use Orient\Contract\Validator as ValidatorInterface;
use Orient\Validator;

class Escaper extends Validator implements ValidatorInterface
{
    public function doClean($value)
    {
        return addslashes($value);
    }
}

