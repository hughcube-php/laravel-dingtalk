<?php
/**
 * Created by PhpStorm.
 * User: hugh.li
 * Date: 2021/4/20
 * Time: 11:36 下午.
 */

namespace HughCube\Laravel\DingTalk\Tests;

use GuzzleHttp\Exception\GuzzleException;
use HughCube\Laravel\DingTalk\DingTalk;
use HughCube\Laravel\DingTalk\Robot\Client as Robot;
use HughCube\Laravel\DingTalk\Robot\Messages\Text;

class RobotTest extends TestCase
{
    protected function getRobot(): Robot
    {
        return DingTalk::robot();
    }

    /**
     * @throws GuzzleException
     */
    public function testSend()
    {
        $results = $this->getRobot()->send(new Text('test'));

        $this->assertArrayHasKey('errcode', $results);
        $this->assertEquals(0, $results['errcode']);
    }
}
