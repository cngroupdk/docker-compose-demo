<?php

use Behat\Behat\Context\Context;
use Behat\MinkExtension\Context\MinkContext;
use Behat\Symfony2Extension\Context\KernelAwareContext;
use Doctrine\Common\DataFixtures\Executor\ORMExecutor;
use Doctrine\Common\DataFixtures\Purger\ORMPurger;
use Symfony\Component\HttpKernel\KernelInterface;

/**
 * Defines application features from the specific context.
 */
class FeatureContext extends MinkContext implements Context, KernelAwareContext
{
    /**
     * @var KernelInterface
     */
    protected $kernel;

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
    }

    /**
     * @BeforeScenario
     */
    public function loadDataFixtures()
    {
      $container = $this->kernel->getContainer();
      $entityManager = $container->get('doctrine.orm.entity_manager');

      $purger = new ORMPurger();
      $purger->setPurgeMode(ORMPurger::PURGE_MODE_TRUNCATE);
      $executor = new ORMExecutor($entityManager, $purger);
      $executor->execute([]);
    }

    /**
     * Sets Kernel instance.
     *
     * @param \Symfony\Component\HttpKernel\KernelInterface $kernel
     */
    public function setKernel(KernelInterface $kernel) {
      $this->kernel = $kernel;
    }

}
