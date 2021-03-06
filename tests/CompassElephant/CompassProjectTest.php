<?php

/**
 * This file is part of the CompassElephant package.
 *
 * (c) Matteo Giachino <matteog@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * Just for fun...
 */

namespace CompassElephant;

use CompassElephant\TestCase;

/**
 * CompassElephantTest
 *
 * @author Matteo Giachino <matteog@gmail.com>
 */

class CompassProjectTest extends TestCase
{
    public function setUp()
    {
        $this->initProject();
    }

    public function testBinary()
    {
        $this->getCompassProject()->init();
        $this->assertNotNull($this->getBinary()->getPath());
    }

    public function testCaller()
    {
        $this->getCompassProject()->init();
        $this->assertNotNull($this->getCommandCaller());
        $output = $this->getCommandCaller()->checkState()->getOutput();
        $this->assertRegExp("/unchanged sass\/screen.scss/", $output);
        $this->assertRegExp("/unchanged sass\/ie.scss/", $output);
        $this->assertRegExp("/unchanged sass\/print.scss/", $output);
    }

    public function testProject()
    {
        $cp = $this->getCompassProject();
        $this->assertNotNull($cp);
    }
}
