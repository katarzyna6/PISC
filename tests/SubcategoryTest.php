<?php
use PHPUnit\Framework\TestCase;
final class SubategoryTest extends TestCase
{
    public $subcategory;
    function setUp(): void {
        $this->subcategory = new Subcategory();
    }
    public function testClass() {
        $this->assertInstanceOf(Subcategory::class, $this->subcategory);
    }
}
