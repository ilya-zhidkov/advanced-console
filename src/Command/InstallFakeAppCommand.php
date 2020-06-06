<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\ConfirmationQuestion;
use Symfony\Component\Console\Input\{InputArgument, InputInterface};

class InstallFakeAppCommand extends Command
{
    protected static $defaultName = 'install';

    protected function configure()
    {
        $this->setDescription('Fakes app installation');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);    
        
        $io->title('Vítejte v instalačním procesu aplikace XYZ');
        
        if (!$io->confirm('Pokračovat v instalaci?', true))
            return 1;

        $agreeToLicense = $io->ask('Souhlasíte s licenčními podmínkami?', 'ano');

        if (empty($agreeToLicense) || substr($agreeToLicense, 0, 1) !== 'a')
            return 1;

        $version = $io->choice('Kterou verzi chcete nainstalovat', ['0', '1', '2'], '2');

        try {
            $io->text("Instaluji verzi {$version}...\n");
            $this->simulateInstallation($io);
        } 
        catch (\Exception $exception) {
            $io->error($exception->getMessage());
            return 1;
        }

        $io->success('Aplikace byla úspěšně nainstalována!');

        return 0;
    }

    private function simulateInstallation(SymfonyStyle $io)
    {
        $io->progressStart(100);

        for ($i = 0; $i < 100; $i++) {
            $io->progressAdvance();
            usleep(10000);
        }
        
        $io->progressFinish();
    }
}
