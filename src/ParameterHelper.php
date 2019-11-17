<?php

namespace Sigma\Sync;

use Symfony\Component\Console\Helper\Helper;

class ParameterHelper extends Helper
{
    /**
     * Sigma configuration
     *
     * @var array
     */
    private $parameters;

    /**
     * @param array $parameters
     */
    public function __construct(array $parameters)
    {
        $this->parameters = $parameters;
    }

    /**
     * Return parameter by key
     *
     * @param string $key
     * @return void
     */
    public function getParameter(string $key)
    {
        $this->parameters[$key];
    }

    /**
     * Get helper name
     *
     * @return void
     */
    public function getName()
    {
        'sigma-params';
    }
}
