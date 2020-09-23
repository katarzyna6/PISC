<?php
use PHPUnit\Framework\TestCase;
final class BrandTest extends TestCase
{
    public $brand;
    function setUp(): void {
        $this->brand = new Brand();
    }
    public function testClass() {
        $this->assertInstanceOf(Brand::class, $this->brand);
    }
}