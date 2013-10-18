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

/**
 * @author Bertrand Zuchuat <bertrand.zuchuat@gmail.com>
 * @author Jérémy Leherpeur <jeremy@leherpeur.net>
 */
interface GeneratorInterface
{
    /**
     * Generates the output media file from the specified input HTML file
     *
     * @param  string $input   The input HTML filename or URL
     * @param  string $output  The output media filename
     * @param  array  $options An array of options for this generation only
     * @param  bool   $overwrite Overwrite the file if it exists. If not, throw an InvalidArgumentException
     */
    function generate($input, $output, array $options = array(), $overwrite = false);

    /**
     * Generates the output media file from the given HTML
     *
     * @param  string $html    The HTML to be converted
     * @param  string $output  The output media filename
     * @param  array  $options An array of options for this generation only
     * @param  bool   $overwrite Overwrite the file if it exists. If not, throw an InvalidArgumentException
     */
    function generateFromHtml($html, $output, array $options = array(), $overwrite = false);

    /**
     * Returns the output of the media generated from the specified input HTML
     * file
     *
     * @param  string $input   The input HTML filename or URL
     * @param  array  $options An array of options for this output only
     *
     * @return string
     */
    function getOutput($input, array $options = array());

    /**
     * Returns the output of the media generated from the given HTML
     *
     * @param  string $html    The HTML to be converted
     * @param  array  $options An array of options for this output only
     *
     * @return string
     */
    function getOutputFromHtml($html, array $options = array());
}
