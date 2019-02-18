<?php

namespace App\Modules\Project\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Damnyan\Cmn\Abstracts\AbstractModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Damnyan\Cmn\Traits\Models\CreatorUpdaterTrait;

class Project extends Authenticatable implements JWTSubject
{
    use Notifiable;

    public $primaryKey = 'project_id';

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    public function getJWTCustomClaims()
    {
        return [];
    }
    /**
    * The database table used by the model.
    *
    * @var string
    */
    protected $table = 'projects';
    /**
    * The resource name used by the model.
    *
    * @var string
    */
    protected $resourceName = 'Projects';

    /**
    * The "type" of the auto-incrementing ID.
    *
    * @var string
    */
    protected $keyType = 'integer';
    /**
    * Enables the timestamp in the model
    *
    * @var string
    */
    public $timestamps = true;
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'account_id',
        'team_id',
        'name',
        'description',
        'status',
        'deadline'
    ];

    /**
    * The attributes excluded from the model's JSON form.
    *
    * @var array
    */
    protected $hidden = [
        'deleted_at'
    ];
    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = [
        'created_at',
        'updated_at'
    ];
}
