<?php

namespace Evheniy\SimpleTaskFSMBundle\Test;

use Evheniy\SimpleTaskFSMBundle\FSM;
use Evheniy\SimpleTaskFSMBundle\Test\Fixtures\StateInit;
use Evheniy\SimpleTaskFSMBundle\Test\Fixtures\StateMainTask;
use Evheniy\SimpleTaskFSMBundle\Test\Fixtures\StateFinish;
use Evheniy\SimpleTaskFSMBundle\Test\Fixtures\StateWithError;
use Evheniy\SimpleTaskFSMBundle\Exception\StateException;

/**
 * Class FSMTest
 *
 * @package Evheniy\SimpleTaskFSMBundle\Test
 */
class FSMTest extends \PHPUnit_Framework_TestCase
{
    /**
     *
     */
    public function testConstructor()
    {
        $stateInit = new StateInit();
        $stateMainTask = new StateMainTask();
        $stateFinish = new StateFinish();
        $fsm = new FSM(array($stateInit, $stateMainTask, $stateFinish));
        $this->assertInstanceOf('\Evheniy\SimpleTaskFSMBundle\FSM', $fsm);
        $this->assertInstanceOf('\SplObjectStorage', $fsm);
        $this->assertTrue($fsm->contains($stateInit));
        $this->assertTrue($fsm->contains($stateMainTask));
        $this->assertTrue($fsm->contains($stateFinish));
    }

    /**
     *
     */
    public function testAttach()
    {
        $stateMainTask = new StateMainTask();
        $fsm = new FSM(array());
        $fsm->attach($stateMainTask);
        $this->assertTrue($fsm->contains($stateMainTask));

        $this->setExpectedException('\Evheniy\SimpleTaskFSMBundle\Exception\WrongClassException');
        new FSM(array(new \StdClass()));
    }

    /**
     *
     */
    public function testFSMNormalProcess()
    {
        $fsm = new FSM(array(new StateInit()));
        foreach ($fsm as $state) {
            $this->assertInstanceOf('\Evheniy\SimpleTaskFSMBundle\StateAbstract', $state);
        }

        $fsm->rewind();
        while ($fsm->valid()) {
            $this->assertInstanceOf('\Evheniy\SimpleTaskFSMBundle\StateAbstract', $fsm->current());
            $fsm->next();
        }
    }

    /**
     *
     */
    public function testFSMWithException()
    {
        $wasException = false;
        $countIteration = 0;
        $fsm = new FSM(array(new StateWithError()));
        StateWithError::$counter = 0;

        $fsm->rewind();
        while ($fsm->valid()) {
            $countIteration ++;
            try {
                StateWithError::$counter ++;
                $fsm->current()->run();
                $fsm->next();
            } catch (StateException $e) {
                $wasException = true;
            }
        }
        $this->assertTrue($wasException);
        $this->assertEquals(2, $countIteration);
    }
}