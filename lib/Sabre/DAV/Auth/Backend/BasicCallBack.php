<?php

namespace Sabre\DAV\Auth\Backend;

use Sabre\DAV;
use Sabre\HTTP;

/**
 * Extremely simply HTTP Basic auth backend.
 *
 * This backend basically works by calling a callback, which receives a
 *
 * username and password.
 * The callback must return true or false depending on if authentication was
 * correct.

 * @copyright Copyright (C) 2007-2013 Rooftop Solutions. All rights reserved.
 * @author Evert Pot (http://www.rooftopsolutions.nl/)
 * @license http://code.google.com/p/sabredav/wiki/License Modified BSD License
 */
class BasicCallBack extends AbstractBasic {

    /**
     * Callback
     *
     * @var callable
     */
    protected $callBack;

    /**
     * Creates the backend.
     *
     * A callback must be provided to handle checking the username and
     * password.
     *
     * @param callable $callBack
     * @return void
     */
    public function __construct(callable $callBack) {

        $this->callBack = $callBack;

    }

    /**
     * Validates a username and password
     *
     * This method should return true or false depending on if login
     * succeeded.
     *
     * @param string $username
     * @param string $password
     * @return bool
     */
    protected function validateUserPass($username, $password) {

        return $this->callBack($username, $password);

    }

}

