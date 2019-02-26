<?php
namespace App\Modules\Task\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Damnyan\Cmn\Abstracts\AbstractModel;
use Damnyan\Cmn\Traits\Models\CreatorUpdaterTrait;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\Model;
class Task extends Authenticatable implements JWTSubject
{
    public $primaryKey = 'task_id';

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    public function getJWTCustomClaims()
    {
        return [];
    }

    protected $fillable = [
        'task_description', 
        'status', 
        'account_id',
        'project_id'
    ];
    
    public function account()
    {
        return $this->hasOne('App\Modules\Account\Models\Account', 'account_id');
    }
}
