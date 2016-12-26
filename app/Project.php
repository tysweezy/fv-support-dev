<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'survey_request';

    protected $fillable = ['project_title', 
                         'project_location', 
                         'project_description',
                         'project_type',
                         'requester_email',
                         'attachment'];

    
}
