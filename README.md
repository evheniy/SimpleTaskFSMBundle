SimpleTaskFSMBundle
===================
This bundle provides the ability to use FSM tasks runner in your application.

[![knpbundles.com](http://knpbundles.com/evheniy/SimpleTaskFSMBundle/badge)](http://knpbundles.com/evheniy/SimpleTaskFSMBundle)

[![Latest Stable Version](https://poser.pugx.org/evheniy/simple-task-fsm-bundle/v/stable)](https://packagist.org/packages/evheniy/simple-task-fsm-bundle) [![Total Downloads](https://poser.pugx.org/evheniy/simple-task-fsm-bundle/downloads)](https://packagist.org/packages/evheniy/simple-task-fsm-bundle) [![Latest Unstable Version](https://poser.pugx.org/evheniy/simple-task-fsm-bundle/v/unstable)](https://packagist.org/packages/evheniy/simple-task-fsm-bundle) [![License](https://poser.pugx.org/evheniy/simple-task-fsm-bundle/license)](https://packagist.org/packages/evheniy/simple-task-fsm-bundle)

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/evheniy/SimpleTaskFSMBundle/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/evheniy/SimpleTaskFSMBundle/?branch=master) [![Build Status](https://scrutinizer-ci.com/g/evheniy/SimpleTaskFSMBundle/badges/build.png?b=master)](https://scrutinizer-ci.com/g/evheniy/SimpleTaskFSMBundle/build-status/master)

[![Build Status](https://travis-ci.org/evheniy/SimpleTaskFSMBundle.svg?branch=master)](https://travis-ci.org/evheniy/SimpleTaskFSMBundle)

Installation
------------

    $ composer require evheniy/simple-task-fsm-bundle "1.*"

Or add to composer.json

    "evheniy/simple-task-fsm-bundle": "1.*"

AppKernel:

    public function registerBundles()
    {
        $bundles = array(
            ...
            new Evheniy\SimpleTaskFSMBundle\SimpleTaskFSMBundle(),
        );
        ...

Documentation
-------------

For using SimpleTaskFSMBundle you need to create state classes.

For example AppBundle/FSM/StateInit:

    <?php
    
    namespace AppBundle/FSM;
    
    use Evheniy\SimpleTaskFSMBundle\StateAbstract;
    
    class StateInit extends StateAbstract
    {
    
        /**
         * @throw \Evheniy\SimpleTaskFSMBundle\Exception\StateException
         */
        public function run()
        {
            //do something...
        }
    }
    
Then create FSM manager with this state classes (for example in Command):

    use Evheniy\SimpleTaskFSMBundle\FSM;

And

    $fsm = new FSM(array(new StateInit()));
    foreach($fsm as $state) {
        $state->run();
    }

OR

    $fsm = new FSM(array(new StateInit()));
    $fsm->rewind();
    while($fsm->valid()) {
        $fsm->current()->run();
        $fsm->next();
    }

If you have exception (You can use Evheniy\SimpleTaskFSMBundle\Exception\StateException) and You need to restart step:

    $fsm = new FSM(array(new StateWithError()));
    
    $fsm->rewind();
    while($fsm->valid()) {
        try {
            $fsm->current()->run();// function run() throws StateException
            $fsm->next();
        } catch (StateException $e) {
            //do something
        }
    }

You can use a lot of states and they will run one by one.

    $fsm = new FSM(array(new StateInit(), new StateMainTask(), new StateFinish()));


License
-------

This bundle is under the [MIT][2] license.

[Документация на русском языке][1]

[1]:  http://makedev.org/articles/symfony/bundles/simple_task_fsm_bundle.html
[2]:  https://github.com/evheniy/SimpleTaskFSMBundle/blob/master/Resources/meta/LICENSE
