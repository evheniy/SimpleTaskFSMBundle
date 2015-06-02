<?php

namespace Evheniy\SimpleTaskFSMBundle;

use Evheniy\SimpleTaskFSMBundle\Exception\WrongClassException;

/**
 * Class FSM
 *
 * @package Evheniy\SimpleTaskFSMBundle
 */
class FSM extends \SplObjectStorage
{
    /**
     * @param array $states
     */
    public function __construct(array $states)
    {
        foreach ($states as $state) {
            $this->attach($state);
        }
    }

    /**
     * @param StateAbstract $object
     * @param null          $data
     *
     * @throws WrongClassException
     */
    public function attach ($object, $data = null)
    {
        if (!$object instanceof StateAbstract) {
            throw new WrongClassException('Wrong class. Only StateAbstract children!');
        }

        parent::attach($object, $data);
    }
}