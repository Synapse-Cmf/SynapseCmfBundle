<?php

namespace Synapse\Cmf\Framework\Media\Image\Tests\Domain\Action;

use Synapse\Cmf\Framework\Media\Image\Action\AbstractAction;
use Synapse\Cmf\Framework\Media\Image\Domain\Action\ActionDispatcherDomain;
use Synapse\Cmf\Framework\Media\Image\Entity\Image;
use Majora\Framework\Domain\Action\ActionFactory;

/**
 * Unit test class for ActionDispatcher Image domain implementation.
 */
class ActionDispatcherDomainTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Tests create() method.
     */
    public function testCreate()
    {
        $action = $this->prophesize(AbstractAction::class);
        $action->denormalize(array('cortex' => 'swiffer'))
            ->will(function ($args, $self) {
                return $self;
            })
            ->shouldBeCalled()
        ;
        $action->init(null, array('cortex' => 'swiffer'), 'synapse')
            ->will(function ($args, $self) {
                return $self;
            })
            ->shouldBeCalled()
        ;
        $action->resolve()
            ->willReturn($createdEntity = new Image())
            ->shouldBeCalled()
        ;

        $domain = new ActionDispatcherDomain(new ActionFactory(array(
            'create' => $action->reveal(),
        )));

        $entity = $domain->create(
            array('cortex' => 'swiffer'),
            'synapse'
        );

        $this->assertSame($createdEntity, $entity);
    }

    /**
     * Tests edit() method.
     */
    public function testEdit()
    {
        $entity = new Image();

        $action = $this->prophesize(AbstractAction::class);
        $action->denormalize(array('cortex' => 'swiffer'))
            ->will(function ($args, $self) {
                return $self;
            })
            ->shouldBeCalled()
        ;
        $action->init($entity, array('cortex' => 'swiffer'), 'synapse')
            ->will(function ($args, $self) {
                return $self;
            })
            ->shouldBeCalled()
        ;
        $action->resolve()->shouldBeCalled();

        $domain = new ActionDispatcherDomain(new ActionFactory(array(
            'edit' => $action->reveal(),
        )));

        $domain->edit(
            $entity,
            array('cortex' => 'swiffer'),
            'synapse'
        );
    }

    /**
     * Tests delete() method.
     */
    public function testDelete()
    {
        $entity = new Image();

        $action = $this->prophesize(AbstractAction::class);
        $action->denormalize(array('cortex' => 'swiffer'))
            ->will(function ($args, $self) {
                return $self;
            })
            ->shouldBeCalled()
        ;
        $action->init($entity, array('cortex' => 'swiffer'), 'synapse')
            ->will(function ($args, $self) {
                return $self;
            })
            ->shouldBeCalled()
        ;
        $action->resolve()->shouldBeCalled();

        $domain = new ActionDispatcherDomain(new ActionFactory(array(
            'delete' => $action->reveal(),
        )));

        $domain->delete(
            $entity,
            array('cortex' => 'swiffer'),
            'synapse'
        );
    }
}
