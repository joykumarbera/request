<?php

use PHPUnit\Framework\TestCase;
use Bera\Request\Helper\Util;

class UtilTest extends TestCase
{
    public function testConvertJsonToArrayWithNull()
    {
        $this->expectException(\InvalidArgumentException::class);
        Util::convertJsonToArray(null);
    }

    public function testConvertJsonToArrayWithNotString()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage( false .' is not a sting');
        Util::convertJsonToArray(false);
    }

    public function testconvertJsonToArrayWithValidArray()
    {
        $data = '{"name":"developer","email":"dev@mail.com","age":21,"hasgf":true}';
        $this->assertEquals( array(
                'name' => 'developer',
                'email' => 'dev@mail.com',
                'age' => 21,
                'hasgf'=> true
            )
            , Util::convertJsonToArray($data)
        );
    }

    public function testConvertArrayToJsonWithBadArgument()
    {
        $this->expectException(\InvalidArgumentException::class);
        Util::convertArrayToJson('array');
    }

    public function testConvertArrayToJsonWithValidArgument()
    {
        $this->assertJsonStringEqualsJsonString(
            '{"name":"developer","email":"dev@mail.com","age":21,"hasgf":true}',
            Util::convertArrayToJson(array(
                    'name' => 'developer',
                    'email' => 'dev@mail.com',
                    'age' => 21,
                    'hasgf'=> true
                )
            )
        );
    }

    public function testIsValidUrlWithNotValidUrl()
    {
        $this->assertFalse(
            Util::isValidUrl('valid.url')
        );
    }

    public function tetIsValidUrlWishValidUrl()
    {
        $this->assertTrue(
            Util::isValidUrl('http://example.com')
        );

        $this->assertTrue(
            Util::isValidUrl('https://google.com')
        );
    }


}