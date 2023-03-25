<?php

use NikParser\NikParser;
use PHPUnit\Framework\TestCase;

final class NikParserTest extends TestCase
{
    const NIK_TEST = "3509211202010006";
    public function testCanParseNik(): void
    {
        $parser = new NikParser(self::NIK_TEST);

        $response = $parser->getAll();

        self::assertEquals(self::NIK_TEST, $response->nik);
    }

    public function testMustInvalidParseNik(): void
    {
        $this->expectException(\Exception::class);

        $parser = new NikParser("3509211202010s06");

        $response = $parser->getAll();
    }
}
