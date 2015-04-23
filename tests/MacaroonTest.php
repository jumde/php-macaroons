<?php
namespace Macaroons\Tests;

use Macaroons\Macaroon;

class MacaroonTest extends \PHPUnit_Framework_TestCase
{
  protected $m;

  protected function setUp()
  {
    $this->m = new Macaroon(
                                      'this is our super secret key; only we should know it',
                                      'we used our secret key',
                                      'https://mybank/'
                                      );
  }

  public function testWithoutCaveatsTest()
  {
    $this->assertEquals('e3d9e02908526c4c0039ae15114115d97fdd68bf2ba379b342aaf0f617d0552f', $this->m->getSignature());
  }

  public function testSerialize()
  {
    $this->assertEquals('MDAxZGxvY2F0aW9uIGh0dHBzOi8vbXliYW5rLwowMDI2aWRlbnRpZmllciB3ZSB1c2VkIG91ciBzZWNyZXQga2V5CjAwMmZzaWduYXR1cmUg49ngKQhSbEwAOa4VEUEV2X_daL8ro3mzQqrw9hfQVS8K', $this->m->serialize());
  }

  public function testDeserialize()
  {
    $m = Macaroon::deserialize($this->m->serialize());
    $this->assertEquals($this->m->getSignature(), $m->getSignature());
    $this->assertEquals($this->m->getIdentifier(), $m->getIdentifier());
    $this->assertEquals($this->m->getLocation(), $m->getLocation());
  }

  public function testFirstPartyCaveat()
  {
    $this->m->addFirstPartyCaveat('test = caveat');
    $this->assertEquals('197bac7a044af33332865b9266e26d493bdd668a660e44d88ce1a998c23dbd67', $this->m->getSignature());
  }

  public function testThirdPartyCaveat()
  {
    $caveatKey = '4; guaranteed random by a fair toss of the dice';
    $caveatId = 'this was how we remind auth of key/pred';
    $caveatLocation = 'https://auth.mybank/';
    $this->m->addThirdPartyCaveat($caveatKey, $caveatId, $caveatLocation);
    $this->markTestSkipped('Write a test for third party caveats when serializers are done');
  }

  public function testFirstAndThirdPartyCaveats()
  {
    $this->m->addFirstPartyCaveat('account = 3735928559');
    $caveatKey = '4; guaranteed random by a fair toss of the dice';
    $caveatId = 'this was how we remind auth of key/pred';
    $caveatLocation = 'https://auth.mybank/';
    $this->m->addThirdPartyCaveat($caveatKey, $caveatId, $caveatLocation);
    $this->markTestSkipped('Write a test for third party caveats when serializers are done');
  }
}
