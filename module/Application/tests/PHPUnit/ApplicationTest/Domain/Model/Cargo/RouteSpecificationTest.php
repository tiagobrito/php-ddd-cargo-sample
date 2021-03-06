<?php
/*
 * This file is part of the codeliner/php-ddd-cargo-sample package.
 * (c) Alexander Miertsch <kontakt@codeliner.ws>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace ApplicationTest\Domain\Model\Cargo;

use ApplicationTest\TestCase;
use Application\Domain\Model\Cargo\RouteSpecification;
/**
 *  RouteSpecificationTest
 * 
 * @author Alexander Miertsch <kontakt@codeliner.ws>
 */
class RouteSpecificationTest extends TestCase
{
    /**
     *
     * @var RouteSpecification
     */
    protected $object;
    
    protected function setUp()
    {
        $this->object = new RouteSpecification('Hongkong', 'Berlin');
    }

    /**
     * @test
     */
    public function it_has_an_origin()
    {
        $this->assertEquals('Hongkong', $this->object->origin());
    }

    /**
     * @test
     */
    public function it_has_a_destination()
    {
        $this->assertEquals('Berlin', $this->object->destination());
    }

    /**
     * @test
     */
    public function it_is_same_value_as_route_specification_with_same_properties()
    {
        $validCheck = new RouteSpecification('Hongkong', 'Berlin');
        
        $this->assertTrue($this->object->sameValueAs($validCheck));
    }

    /**
     * @test
     */
    public function it_is_not_same_value_as_route_specification_with_different_origin()
    {
        $invalidCheck = new RouteSpecification('New York', 'Berlin');

        $this->assertFalse($this->object->sameValueAs($invalidCheck));
    }

    /**
     * @test
     */
    public function it_is_not_same_value_as_route_specification_with_different_destination()
    {
        $invalidCheck = new RouteSpecification('Hongkong', 'New York');

        $this->assertFalse($this->object->sameValueAs($invalidCheck));
    }
}
