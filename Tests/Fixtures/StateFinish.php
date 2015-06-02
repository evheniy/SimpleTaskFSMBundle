<?php

namespace Evheniy\SimpleTaskFSMBundle\Test\Fixtures;

use Evheniy\SimpleTaskFSMBundle\StateAbstract;

/**
 * Class StateFinish
 *
 * @package Evheniy\SimpleTaskFSMBundle\Test\Fixtures
 */
class StateFinish extends StateAbstract
{

    /**
     * @throw \Evheniy\SimpleTaskFSMBundle\Exception\StateException
     */
    public function run()
    {

    }
}