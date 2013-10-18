<?php

/*
 * This file is part of the Prince package.
 *
 * (c) Bertrand Zuchuat <bertrand.zuchuat@gmail.com>
 * (c) Jérémy Leherpeur <jeremy@leherpeur.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Amenophis\Prince\Command;

use Amenophis\Prince\Configuration\Configuration;

/**
 * @author Bertrand Zuchuat <bertrand.zuchuat@gmail.com>
 * @author Jérémy Leherpeur <jeremy@leherpeur.net>
 */

class Command implements CommandInterface
{
    /**
     * @var string
     */
    protected $binaryPath;

    /**
     * @var \Amenophis\Prince\Configuration\Configuration
     */
    protected $config;

    public function __construct($binaryPath, Configuration $config)
    {
        $this->binaryPath = $binaryPath;
        $this->config = $config;

        if (!is_executable($this->binaryPath)) {
            throw new \Exception(sprintf(
                'The prince binary does not exist on path "%s"',
                $this->binaryPath
            ));
        }
    }

    public function getCommand($input, $output, $options = array())
    {
        return $this->generateCommandLine($input, $output, $options);
    }

    protected function generateCommandLine($input, $output, $options = array())
    {
        $command = $this->binaryPath;

        foreach ($this->config->all() as $key => $value) {
            if (array_key_exists($key, $options) && $options[$key]) {
                $value = $options[$key];
            }

            if (is_bool($value) && $value !== false) {
                $command .= sprintf(" --%s", $key);
            } elseif ($value !== null && is_string($value)) {
                $command .= sprintf(" --%s=\"%s\"", $key, $value);
            }
        }

        $command .= sprintf(" --output=\"%s\"", $output);
        $command .= sprintf(" %s", $input);

        return $command;
    }
}