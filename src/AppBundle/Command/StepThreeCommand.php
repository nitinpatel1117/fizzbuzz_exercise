<?php
namespace AppBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class StepThreeCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this->setName('Fizzbuzz:StepThree')
             ->setDescription('Outputs the results for step 3');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $stepThree = $this->getContainer()->get('stepthree_service');
        $stepThree->run(20);

        $output->writeln(implode(' ', $stepThree->getResult()));

        foreach ($stepThree->getStats() as $key => $value) {
            $output->writeln(sprintf('%s: %s', $key, $value));
        }
    }
}