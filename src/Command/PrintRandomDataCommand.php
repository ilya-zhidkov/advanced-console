<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Console\Output\OutputInterface;
use App\Option\{DataTypeOption, ReverseOption, UppercaseOption};
use Symfony\Component\Console\Input\{InputOption, InputArgument, InputInterface};

class PrintRandomDataCommand extends Command
{
    protected static $defaultName = 'random';

    protected function configure()
    {
        $this
            ->setDescription('Generates random data')
            ->addArgument('data_type', InputArgument::REQUIRED)
            ->addOption('count', 'c', InputOption::VALUE_OPTIONAL, '', 1)
            ->addOption('reverse', 'r', InputOption::VALUE_OPTIONAL, '', false)
            ->addOption('uppercase', 'u', InputOption::VALUE_OPTIONAL, '', false);
    }
    
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $dataType = $input->getArgument('data_type');
        
        $io = new SymfonyStyle($input, $output);

        if (strpos($content = new DataTypeOption($dataType), 'neexistuje')) {
            $io->error($content);
            return 1;
        }

        $io->title("Generating random data for data type {$dataType}");
        
        for ($i = 0; $i < $input->getOption('count'); $i++) {
            $content = new DataTypeOption($dataType);
    
            if ($input->getOption('reverse') !== false)
                $content = new ReverseOption($content);
            
            if ($input->getOption('uppercase') !== false)
                $content = new UppercaseOption($content);

            $output->writeln($content);
        }

        $io->newLine();

        return 0;
    }
}
