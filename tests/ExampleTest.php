<?php

namespace Wulfheart\SquareMover\Tests;

use PHPUnit\Framework\TestCase;
use Wulfheart\SquareMover\SquareMover;

class Tests extends TestCase
{
    /** @test */
    public function has_bresenham_paths()
    {
        $bre = [
            [
                "start" => [0, 0],
                "end" => [-3, -3],
                "squares" => [
                    [0, 0], [-1, -1], [-2, -2], [-3, -3]
                ]
            ],
            [
                "start" => [0, 0],
                "end" => [-3, 2],
                "squares" => [
                    [0, 0], [-1, 0], [-1, 1], [-2, 1], [-2, 2], [-3, 2]
                ]
            ]
        ];
        foreach ($bre as $b) {
            $squares = SquareMover::from(...$b["start"])->to(...$b["end"])->squares2();
            foreach ($b["squares"] as $s) {
                $this->assertContains([
                    "x" => floatval($s[0]),
                    "y" => floatval($s[1])
                ], $squares);
            }
        }
    }
}
