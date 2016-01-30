<?php

namespace ProblemSolver\Command;

use ProblemSolver\Handler\PhoneDecoderHandler;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class PhoneDecoderCommand
 *
 * @package Command\PhoneDecoderCommand
 */
class PhoneDecoderCommand extends Command
{

    protected function configure()
    {
        $this
            ->setName('phone:decoder')
            ->setDescription('Decode the phone code from Oxf level 19')
            ->addArgument('phoneCode', InputArgument::REQUIRED, 'Phone code to decode');
    }

    /**
     * @param InputInterface  $input
     * @param OutputInterface $output
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $code = $input->getArgument('phoneCode');

        $phoneDecoder = new PhoneDecoderHandler();
        $value = $phoneDecoder->decode($code);

        $output->writeln('Code: ' . $code);
        $output->writeln('Decode: ' . $value);
    }
}
