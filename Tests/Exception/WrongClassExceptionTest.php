<?php

namespace Evheniy\SimpleTaskFSMBundle\Test\Exception;

use Evheniy\SimpleTaskFSMBundle\Exception\WrongClassException;

/**
 * Class WrongClassExceptionTest
 *
 * @package Evheniy\SimpleTaskFSMBundle\Test\Exception
 */
class WrongClassExceptionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @throws WrongClassException
     */
    public function test()
    {
        $this->assertInstanceOf('\Exception', new WrongClassException());
        $this->setExpectedException('\Evheniy\SimpleTaskFSMBundle\Exception\WrongClassException');
        throw new WrongClassException('test');
    }
}