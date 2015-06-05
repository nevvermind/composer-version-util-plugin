<?php

namespace My;

use Composer\Command\ExternalCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Composer\Package\Version\VersionParser;

class VersionUtilitiesCommand extends ExternalCommand
{
    protected function configure()
    {
        $this
            ->setName('version-util')
            ->setDescription('You can finally find out what "^1.0" means!')
            ->setDefinition(array(
                new InputArgument('constraint', InputArgument::REQUIRED, 'Version constraint. E.g. "^1.0",  "@dev" or "1.0 - 2.0"'),
            ))
            ->setHelp("Press F1.")
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $parser = new VersionParser;

        try {
            $result = $parser->parseConstraints($input->getArgument('constraint'))->__toString();
        } catch (\UnexpectedValueException $e) {
            $result = "<error>Invalid constraint provided</error>";
        }

        $this->getIO()->write($result);
    }
}
