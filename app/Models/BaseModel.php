<?php

namespace App\Models;

use App\Models\Resources\Scopes\BaseModelScopesOrderBy;
use Illuminate\Database\Eloquent\Model as Eloquent;
use App\Models\Resources\Timezones\BaseModelTimezones;

class BaseModel extends Eloquent
{
    use BaseModelTimezones, BaseModelScopesOrderBy;

}
