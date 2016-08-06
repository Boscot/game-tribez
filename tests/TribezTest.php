<?php
/**
 * TribezTest
 *
 * PHP Version 5.3
 *
 * @category Test
 * @package  Boscot
 * @license  http://www.gnu.org/licenses/gpl-3.0.txt GPL v3
 * @link     None
 */

require_once __DIR__."/../vendor/autoload.php";

use Boscot\Test\GameTest;

/**
 * Class: TribezTest
 * 
 * Test Tribez classes
 *
 * @category Test
 * @package  Boscot
 * @license  http://www.gnu.org/licenses/gpl-3.0.txt GPL v3
 * @link     None
 */
class TribezTest extends GameTest
{
 	public $domain = "thetribez.divogames.com";

    /**
     * Configuration
     *
     * Create Tribez object
     *
     * @return void
     */
    protected function setUp()
	{
    }

    
    /**
     * Test all action method of the controller
     *
     * @return void
     */
    public function testHack()
	{
		$request =
<<<EOF
GET /api2/info HTTP/1.1
Host: $this->domain
Connection: close


EOF;
$content = $this->sendData($request, GameTest::DOMAIN);

$this->assertSame(1, preg_match('#Gold:1"#ms', $content));
$this->assertSame(1, preg_match('#Gem:-#ms', $content));
$this->assertSame(1, preg_match('#Content-Type: application/json#ms', $content));
$this->assertSame(0, preg_match('#Flag#ms', $content));

    }
}
