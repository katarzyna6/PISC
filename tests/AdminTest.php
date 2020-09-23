<?php
use PHPUnit\Framework\TestCase;
final class AdminTest extends TestCase
{
    public $admin;
    function setUp(): void {
        $this->admin = new Admin();
    }
    public function testClass() {
        $this->assertInstanceOf(Admin::class, $this->admin);
    }
}