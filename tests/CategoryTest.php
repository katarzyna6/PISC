<?php 
use PHPUnit\Framework\TestCase;
final class CategoryTest extends TestCase
{
    public $category;
    function setUp(): void {
        $this->category = new Category();
    }
    public function testClass() {
        $this->assertInstanceOf(Category::class, $this->category);
    }
}