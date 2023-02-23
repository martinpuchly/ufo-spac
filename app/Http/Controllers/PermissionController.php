<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Permission;
use App\Models\User;
use App\Models\Group;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use Inertia\Response as InertiaResponse;

class PermissionController extends Controller
{
    
    public function user(User $user): InertiaResponse
    {
        return Inertia::render('Admin/Permissions/User',[
            'user'=> $user,
            'permissions' => Permission::orderedPerm(),
            'user_permissions' => $user->permissions->pluck('id')->toArray()
        ]);
    }

    public function userSave(Request $request, User $user): RedirectResponse
    {
        $user->permissions()->sync($request->user_permissions);
        return redirect()->route('admin.permissions.user', $user->id)->with('succeed', 'Povolenia užívateľa '.$user->name.' boli uložené.');
    }


    public function group(Group $group): InertiaResponse
    {
        return Inertia::render('Admin/Permissions/Group',[
            'group'=> $group,
            'permissions' => Permission::orderedPerm(),
            'group_permissions' => $group->permissions->pluck('id')->toArray()
        ]);
    }

    public function groupSave(Request $request, Group $group): RedirectResponse
    {
        $group->permissions()->sync($request->group_permissions);
        return redirect()->route('admin.permissions.group', $group->id)->with('succeed', 'Povolenia skupiny '.$group->name.' boli uložené.');
    }


}
