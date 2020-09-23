<?php 
use PHPUnit\Framework\TestCase;
final class ImageTest extends TestCase
{
    public $image;
    function setUp(): void {
        $this->image = new Image();
    }
    public function testClass() {
        $this->assertInstanceOf(Image::class, $this->image);
    }
}