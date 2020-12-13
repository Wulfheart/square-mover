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
        $dx = abs($x1 - $x0);
        $sx = $x0 < $x1 ? 1 : -1;
        $dy = abs($y1 - $y0);
        $sy = $y0 < $y1 ? 1 : -1;
        $err = ($dx > $dy ? $dx : -$dy) / 2;
        $e2 = 0;
        $squares = [];
        for(;;){
            $squares[] = ['x' => $x0, 'y' => $y0];
            if($x0 == $x1 && $y0 == $y1) break;
            $e2 = $err;
            if($e2 > -$dx) {
                $err -= $dy;
                $x0 += $sx;
            }
            if($e2 < $dy) {
                $err += $dx;
                $y0 += $sy;
            }
        }
        return $squares;
    }

    public function squares2(): array {
        $x0 = $this->start_x;
        $x1 = $this->end_x;
        $y0 = $this->start_y;
        $y1 = $this->end_y;
        $squares = [];
       $dx = $x1 - $x0;
       $dy = $y1 - $y0;
       if(abs($dx) >= abs($dy)){
           $step = abs($dx);
       } else {
           $step = abs($dy);
       }
       $dx = $dx/$step;
       $dy = $dy/$step;
       $x = $x0;
       $y = $y0;
       for($i = 0; $i <= $step; $i++){
           $squares[] = ['x' => $x, 'y' => $y];
           $x = $x+$dx;
           $y = $y + $dy;
       }
       return $squares;
    }


}
