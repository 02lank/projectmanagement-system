<?php

namespace App\Modules\ProjectController\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function show (Project $project){
    
        $this->authorize('view', $project);
        
    }
}

