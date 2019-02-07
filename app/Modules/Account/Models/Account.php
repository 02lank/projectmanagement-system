<?php

namespace App\Modules\Account\Models;

use Illuminate\Database\Eloquent\Model;
use Damnyan\Cmn\Abstracts\AbstractModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Damnyan\Cmn\Traits\Models\CreatorUpdaterTrait;

class Account extends AbstractModel
{
    /**
    * The database table used by the model.
    *
    * @var string
    */
    protected $table = 'accounts';
    /**
    * The resource name used by the model.
    *
    * @var string
    */
    protected $resourceName = 'Account';
    /**
    * The primary key used by the model.
    *
    * @var string
    */
    protected $primaryKey = 'account_id';
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
        'username',
        'password'
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
