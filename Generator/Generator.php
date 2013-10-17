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

namespace Amenophis\Prince\Generator;

use Amenophis\Prince\Command\Command;

/**
 * @author Bertrand Zuchuat <bertrand.zuchuat@gmail.com>
 * @author Jérémy Leherpeur <jeremy@leherpeur.net>
 */
class Generator implements GeneratorInterface
{
    /**
     * @var \Amenophis\Prince\Command\Command
     */
    private $command;

    /**
     * @param Command $command
     */
    public function __construct(Command $command)
    {
        $this->command = $command;
    }

    /**
     * {@inheritDoc}
     */
    public function generate($input, $output, array $options = array(), $overwrite = false)
    {
        $this->prepareOutput($output, $overwrite);

        $command = $this->getCommand($input, $output, $options);

        list($status, $stdout, $stderr) = $this->executeCommand($command);
        $this->checkProcessStatus($status, $stdout, $stderr, $command);

        $this->checkOutput($output, $command);
    }

    /**
     * {@inheritDoc}
     */
    public function generateFromHtml($html, $output, array $options = array(), $overwrite = false)
    {
        $filename = $this->createTemporaryFile($html, 'html');

        $this->generate($filename, $output, $options, $overwrite);

        $this->unlink($filename);
    }

    /**
     * {@inheritDoc}
     */
    public function getOutput($input, array $options = array())
    {
        $filename = $this->createTemporaryFile(null, $this->getDefaultExtension());

        $this->generate($input, $filename, $options);

        $result = $this->getFileContents($filename);

        $this->unlink($filename);

        return $result;
    }

    /**
     * {@inheritDoc}
     */
    public function getOutputFromHtml($html, array $options = array())
    {
        $filename = $this->createTemporaryFile($html, 'html');

        $result = $this->getOutput($filename, $options);

        $this->unlink($filename);

        return $result;
    }

    /**
     * Returns the command for the given input and output files
     *
     * @param string $input   The input file
     * @param string $output  The ouput file
     * @param array  $options An optional array of options that will be used
     *                         only for this command
     *
     * @return string
     */
    public function getCommand($input, $output, array $options = array())
    {
        $options = $this->mergeOptions($options);

        return $this->command->getCommand($input, $output, $options);
    }

    /**
     * Merges the given array of options to the instance options and returns
     * the result options array. It does NOT change the instance options.
     *
     * @param array $options
     * @return mixed
     * @throws \InvalidArgumentException
     */
    protected function mergeOptions(array $options)
    {
        $mergedOptions = $this->options;

        foreach ($options as $name => $value) {
            if (!array_key_exists($name, $mergedOptions)) {
                throw new \InvalidArgumentException(sprintf('The option \'%s\' does not exist.', $name));
            }

            $mergedOptions[$name] = $value;
        }

        return $mergedOptions;
    }

    /**
     * Checks the specified output
     *
     * @param $output The output filename
     * @param $command The generation command
     * @throws \RuntimeException if the output file generation failed
     */
    protected function checkOutput($output, $command)
    {
        // the output file must exist
        if (!$this->fileExists($output)) {
            throw new \RuntimeException(sprintf(
                'The file \'%s\' was not created (command: %s).',
                $output, $command
            ));
        }

        // the output file must not be empty
        if (0 === $this->filesize($output)) {
            throw new \RuntimeException(sprintf(
                'The file \'%s\' was created but is empty (command: %s).',
                $output, $command
            ));
        }
    }

    /**
     * Checks the process return status
     *
     * @param $status The exit status code
     * @param $stdout The stdout content
     * @param $stderr The stderr content
     * @param $command The run command
     * @throws \RuntimeException if the output file generation failed
     */
    protected function checkProcessStatus($status, $stdout, $stderr, $command)
    {
        if (0 !== $status and '' !== $stderr) {
            throw new \RuntimeException(sprintf(
                'The exit status code \'%s\' says something went wrong:'."\n"
                .'stderr: "%s"'."\n"
                .'stdout: "%s"'."\n"
                .'command: %s.',
                $status, $stderr, $stdout, $command
            ));
        }
    }

    /**
     * Creates a temporary file.
     * The file is not created if the $content argument is null
     *
     * @param string $content   Optional content for the temporary file
     * @param string $extension An optional extension for the filename
     *
     * @return string The filename
     */
    protected function createTemporaryFile($content = null, $extension = null)
    {
        $filename = rtrim(sys_get_temp_dir(), DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . uniqid('knp_snappy', true);

        if (null !== $extension) {
            $filename .= '.'.$extension;
        }

        if (null !== $content) {
            file_put_contents($filename, $content);
        }

        return $filename;
    }

    /**
     * Executes the given command via shell and returns the complete output as
     * a string
     *
     * @param string $command
     *
     * @return array(status, stdout, stderr)
     */
    protected function executeCommand($command)
    {
        if (class_exists('Symfony\Component\Process\Process')) {
            $process = new \Symfony\Component\Process\Process($command, $this->env);
            if ($this->timeout !== false) {
                $process->setTimeout($this->timeout);
            }
        } else {
            $process = new Process($command, $this->env);
        }

        $process->run();

        return array(
            $process->getExitCode(),
            $process->getOutput(),
            $process->getErrorOutput(),
        );
    }

    /**
     * Prepares the specified output
     * @param string $filename The output filename
     * @param boolean $overwrite Whether to overwrite the file if it already exists
     * @throws \RuntimeException
     * @throws \InvalidArgumentException
     */
    protected function prepareOutput($filename, $overwrite)
    {
        $directory = dirname($filename);

        if ($this->fileExists($filename)) {
            if (!$this->isFile($filename)) {
                throw new \InvalidArgumentException(sprintf(
                    'The output file \'%s\' already exists and it is a %s.',
                    $filename, $this->isDir($filename) ? 'directory' : 'link'
                ));
            } elseif (false === $overwrite) {
                throw new \InvalidArgumentException(sprintf(
                    'The output file \'%s\' already exists.',
                    $filename
                ));
            } elseif (!$this->unlink($filename)) {
                throw new \RuntimeException(sprintf(
                    'Could not delete already existing output file \'%s\'.',
                    $filename
                ));
            }
        } elseif (!$this->isDir($directory) && !$this->mkdir($directory)) {
            throw new \RuntimeException(sprintf(
                'The output file\'s directory \'%s\' could not be created.',
                $directory
            ));
        }
    }

    /**
     * Wrapper for the "file_get_contents" function
     *
     * @param string $filename
     *
     * @return string
     */
    protected function getFileContents($filename)
    {
        return file_get_contents($filename);
    }

    /**
     * Wrapper for the "file_exists" function
     *
     * @param string $filename
     *
     * @return boolean
     */
    protected function fileExists($filename)
    {
        return file_exists($filename);
    }

    /**
     * Wrapper for the "is_file" method
     *
     * @param string $filename
     *
     * @return boolean
     */
    protected function isFile($filename)
    {
        return is_file($filename);
    }

    /**
     * Wrapper for the "filesize" function
     *
     * @param string $filename
     *
     * @return integer or FALSE on failure
     */
    protected function filesize($filename)
    {
        return filesize($filename);
    }

    /**
     * Wrapper for the "unlink" function
     *
     * @param string $filename
     *
     * @return boolean
     */
    protected function unlink($filename)
    {
        return unlink($filename);
    }

    /**
     * Wrapper for the "is_dir" function
     *
     * @param string $filename
     *
     * @return boolean
     */
    protected function isDir($filename)
    {
        return is_dir($filename);
    }

    /**
     * Wrapper for the mkdir function
     *
     * @param string $pathname
     *
     * @return boolean
     */
    protected function mkdir($pathname)
    {
        return mkdir($pathname, 0777, true);
    }
}
