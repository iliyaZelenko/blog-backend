<?php

namespace App\Models;

use App\Models\Resources\Scopes\BaseModelScopesOrderBy;
use App\Models\Resources\Timezones\BaseModelTimezones;

class BaseModelBaum extends \Baum\Node
{
    use BaseModelTimezones, BaseModelScopesOrderBy;
}
