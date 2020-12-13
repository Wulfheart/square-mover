<?php

namespace Wulfheart\SquareMover;

class SquareMover
{
    protected float $start_x;
    protected float $start_y;
    protected float $end_x;
    protected float $end_y;

    protected function __construct(float $start_x, float $start_y) {
        $this->start_x = $start_x;
        $this->start_y = $start_y;
    }

    public static function from($x, $y): self{
        return new self($x, $y);
    }

    public function to($x, $y): self {
        $this->end_x = $x;
        $this->end_y = $y;
        return $this;
    }

    public function squares(): array {
        $x0 = $this->start_x;
        $x1 = $this->end_x;
        $y0 = $this->start_y;
        $y1 = $this->end_y;
        $squares = [];
        $dx = abs($x1 - $x0);
        $dy = abs($y1 - $y0);
        $n = 1 + $dx + $dy;
        $x = $x0;
        $y = $y0;
        $x_inc = $x1 > $x0 ? 1 : -1;
        $y_inc = $y1 > $y0 ? 1 : -1;
        $error = $dx - $dy;
        $dx *= 2;
        $dy *= 2;
        for(; $n > 0; --$n){
            $squares[] = ['x' => $x, 'y' => $y];
            if($error > 0){
                $x += $x_inc;
                $error -= $dy;
            } else {
                $y += $y_inc;
                $error += $dx;
            }
        }
       return $squares;
    }


}
