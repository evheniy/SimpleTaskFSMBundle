<?php

namespace Evheniy\SimpleTaskFSMBundle\Test\Fixtures;

use Evheniy\SimpleTaskFSMBundle\Exception\StateException;
use Evheniy\SimpleTaskFSMBundle\StateAbstract;

/**
 * Class StateWithError
 *
 * @package Evheniy\SimpleTaskFSMBundle\Test\Fixtures
 */
class StateWithError extends StateAbstract
{
    /**
     * @var int
     */
    static public $counter = 0;

    /**
     * @throw \Evheniy\SimpleTaskFSMBundle\Exception\StateException
     */
    public function run()
    {
        if (self::$counter == 1) {
            throw new StateException('Error...');
        }
    }
}