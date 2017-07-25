<?php
namespace AppBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class StepOneCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this->setName('Fizzbuzz:StepOne')
             ->setDescription('Outputs the results for step 1');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $stepOne = $this->getContainer()->get('stepone_service');
        $stepOne->run(20);

        $output->writeln(implode(' ', $stepOne->getResult()));
    }
}