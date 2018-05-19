<?php
namespace Responsive\Http\Traits;

use Responsive\User;
#use \Modules\Account\Models\Role;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

use Responsive\Notifications\JobsCreatedMessage;

trait JobsTrait
{
    private function jobStore($request, $userId)
    {
        $this->jobCreatedMessage($request, $userId);
    }
    
    private function jobCreatedMessage($request, $userId)
    {
        $user = User::find($userId);
        $user->notify(new JobsCreatedMessage($userId, $user->name, $user->email, $request['specific_area_min'], $request['specific_area_max']));
    }
}