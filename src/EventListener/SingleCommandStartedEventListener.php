<?php
/**
 * sic-bundle.
 * Author: Andrii Yakovlev <yawa20@gmail.com>
 * Date: 03.06.19
 */
declare(strict_types=1);

namespace GepurIt\SingleInstanceCommandBundle\EventListener;

use GepurIt\SingleInstanceCommandBundle\Contract\SingleInstanceInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\Console\Event\ConsoleCommandEvent;
use Symfony\Component\Console\Exception\LogicException;
use Symfony\Component\Lock\Factory as LockFactory;
use Symfony\Component\Lock\Lock;

/**
 * Class SingleCommandEventListener
 */
class SingleCommandStartedEventListener
{
    /** @var LockFactory */
    private $lockFactory;

    /** @var LoggerInterface */
    private $logger;

    /** @var Lock|null */
    private $lock;

    /**
     * SingleCommandEventListener constructor.
     * @param LockFactory     $lockFactory
     * @param LoggerInterface $logger
     */
    public function __construct(LockFactory $lockFactory, LoggerInterface $logger)
    {
        $this->lockFactory = $lockFactory;
        $this->logger = $logger;
    }

    /**
     * @param ConsoleCommandEvent $event
     */
    public function onConsoleCommand(ConsoleCommandEvent $event)
    {
        $command = $event->getCommand();
        if (!$command instanceof SingleInstanceInterface) {
            return;
        }

        $lockName = $command->getLockName($event->getInput());

        if (null !== $this->lock) {
            throw new LogicException('A lock is already in place.');
        }

        $this->lock = $this->lockFactory->createLock($lockName, 60 * 60 * 24 * 365);
        if (!$this->lock->acquire(false)) {
            throw new LogicException("Lock {$lockName} already acquired");
        }
        $this->logger->info("Lock {$lockName} acquired");
    }
}
