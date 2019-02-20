<?php

namespace App\Modules\Team\Models;

use Damnyan\Cmn\Abstracts\AbstractModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Damnyan\Cmn\Traits\Models\CreatorUpdaterTrait;

class Team extends AbstractModel
{
    public $primaryKey = 'team_id';
    protected $fillable = [
        'team_id',
        'team_name'
    ];
    
}
