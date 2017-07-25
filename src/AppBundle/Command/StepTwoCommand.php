<?php
namespace AppBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class StepTwoCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this->setName('Fizzbuzz:StepTwo')
             ->setDescription('Outputs the results for step 2');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $stepTwo = $this->getContainer()->get('steptwo_service');
        $stepTwo->run(20);

        $output->writeln(implode(' ', $stepTwo->getResult()));
    }
}