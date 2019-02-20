<?php
namespace App\Modules\Task\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Damnyan\Cmn\Abstracts\AbstractModel;
use Damnyan\Cmn\Traits\Models\CreatorUpdaterTrait;
use Illuminate\Database\Eloquent\Model;
class Task extends AbstractModel
{
    public $primaryKey = 'task_id';

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
