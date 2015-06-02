<?php

namespace Evheniy\SimpleTaskFSMBundle\Test\Exception;

use Evheniy\SimpleTaskFSMBundle\Exception\StateException;

/**
 * Class StateExceptionTest
 *
 * @package Evheniy\SimpleTaskFSMBundle\Test\Exception
 */
class StateExceptionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @throws StateException
     */
    public function test()
    {
        $this->assertInstanceOf('\Exception', new StateException());
        $this->setExpectedException('\Evheniy\SimpleTaskFSMBundle\Exception\StateException');
        throw new StateException('test');
    }
}