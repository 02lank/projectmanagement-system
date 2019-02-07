<?php
namespace App\Modules\Task\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
//use Illuminate\Database\Eloquent\Model;
use Damnyan\Cmn\Abstracts\AbstractModel;
use Damnyan\Cmn\Traits\Models\CreatorUpdaterTrait;

class Task extends AbstractModel
{
    public $primaryKey = 'task_id';

    protected $fillable = [
        'task_description', 
        'status', 
        'account_id',
        'project_id'
    ];
}
