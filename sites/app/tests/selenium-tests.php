<?php
class DefaultTest extends PHPUnit_Extensions_Selenium2TestCase {

    // /*
    //  * Setup
    //  */
    // protected function setUp() {
    //     $this->setHost('your-jenkins');
    //     $this->setBrowser('internet explorer');
    //     $this->setBrowserUrl('http://www.google.com');
    // }

    /*
     * Setup
     */
    protected function setUp() {
        $this->setHost('http://optimize.nhc.in.th:8080');
        $this->setDesiredCapabilities( array('version' => '8') );
        $this->setBrowser('chrome');
        $this->setBrowserUrl('http://www.google.com');
    }

    /**
     * @test
     */
    public function testTitle() {
        $this->url('http://www.google.com');
        $this->assertEquals('Google', $this->title());
    }
}
?>