<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use App\Models\Resources\Timezones\BaseModelTimezones;

class BaseModelPivot extends Pivot
{
    use BaseModelTimezones;
}
