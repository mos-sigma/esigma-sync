<?php

namespace Sigma\Sync;

use Symfony\Component\Console\Helper\Helper;

class ParameterHelper extends Helper
{
    private $parameters;

    public function __construct(array $parameters)
    {
        $this->parameters = $parameters;
    }

    public function getParameter(string $name)
    {
        $this->parameters[$name];
    }

    public function getName()
    {
        'sigma-params';
    }
}
