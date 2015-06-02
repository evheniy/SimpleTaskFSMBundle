<?php

namespace Evheniy\SimpleTaskFSMBundle\Test\Fixtures;

use Evheniy\SimpleTaskFSMBundle\StateAbstract;

/**
 * Class StateMainTask
 *
 * @package Evheniy\SimpleTaskFSMBundle\Test\Fixtures
 */
class StateMainTask extends StateAbstract
{

    /**
     * @throw \Evheniy\SimpleTaskFSMBundle\Exception\StateException
     */
    public function run()
    {

    }
}