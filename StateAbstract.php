<?php

namespace Evheniy\SimpleTaskFSMBundle;

/**
 * Class StateAbstract
 *
 * @package Evheniy\SimpleTaskFSMBundle
 */
abstract class StateAbstract
{
    /**
     * @throw \Evheniy\SimpleTaskFSMBundle\Exception\StateException
     */
    abstract public function run();
}