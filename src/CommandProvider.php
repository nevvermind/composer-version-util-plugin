<?php

namespace My;

class CommandProvider implements \Composer\Plugin\Capability\CommandProvider
{
    public function __construct(array $ctorArgs = array())
    {}

    /**
     * @return ExternalCommand[]
     */
    public function getCommands()
    {
        return array(
            new VersionUtilitiesCommand
        );
    }   
}