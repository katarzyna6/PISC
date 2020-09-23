<?php 
use PHPUnit\Framework\TestCase;
final class ItemTest extends TestCase
{
    public $item;
    function setUp(): void {
        $this->item = new Item();
    }
    public function testClass() {
        $this->assertInstanceOf(Item::class, $this->item);
    }
}