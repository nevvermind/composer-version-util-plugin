<?php

namespace My;

use Composer\Plugin\PluginInterface;
use Composer\Plugin\Capable;
use Composer\Composer;
use Composer\IO\IOInterface;

class Plugin implements PluginInterface, Capable
{
    public function activate(Composer $composer, IOInterface $io)
    {}

    /**
     * @return Capability\Capability[]
     */
    public function getCapabilities()
    {
        return array(
            'Composer\Plugin\Capability\CommandProvider' => 'My\CommandProvider',
        );
    }   
}