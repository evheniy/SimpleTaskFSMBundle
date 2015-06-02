<?php

namespace Evheniy\SimpleTaskFSMBundle\Test\Fixtures;

use Evheniy\SimpleTaskFSMBundle\StateAbstract;

/**
 * Class StateInit
 *
 * @package Evheniy\SimpleTaskFSMBundle\Test\Fixtures
 */
class StateInit extends StateAbstract
{

    /**
     * @throw \Evheniy\SimpleTaskFSMBundle\Exception\StateException
     */
    public function run()
    {

    }
}