<?php

namespace App\Traits;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Queue;

trait Dispatchable
{
    public function dispatch()
    {
        return Queue::push($this);
    }
}
