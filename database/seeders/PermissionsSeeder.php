<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
                #PERMISSION
                Permission::insert(['main_name' => 'Povolenia', 'name' => 'spravovať povolenia', 'key' => 'permissions', 'route' => 'admin.permissions', 'link_in_admin_menu' => 1]);


                #GROUPS
                Permission::insert(['main_name' => 'Skupiny', 'name' => 'zobraziť skupiny', 'key' => 'groups', 'route' => 'admin.groups', 'link_in_admin_menu' => 1]);
                Permission::insert(['main_name' => 'Skupiny', 'name' => 'pridať skupinu', 'key' => 'group-add', 'route' => 'admin.group.add', 'link_in_admin_menu' => 1]);
                Permission::insert(['main_name' => 'Skupiny', 'name' => 'upraviť skupinu', 'key' => 'group-edit', 'route' => 'admin.group.edit', 'link_in_admin_menu' => 0]);
                Permission::insert(['main_name' => 'Skupiny', 'name' => 'vymazať skupinu', 'key' => 'group-delete', 'route' => 'admin.group.edit', 'link_in_admin_menu' => 0]);
                #GROUPS - PERMISSION
                Permission::insert(['main_name' => 'Skupiny', 'name' => 'povolenia skupiny', 'key' => 'group-permissions', 'route' => 'admin.permissions.group', 'link_in_admin_menu' => 0]);
        
                #USERS
                Permission::insert(['main_name' => 'Užívatelia', 'name' => 'zobraziť užívateľov', 'key' => 'admin-users', 'route' => 'admin.users', 'link_in_admin_menu' => 1]);
                Permission::insert(['main_name' => 'Užívatelia', 'name' => 'vymazať užívateľa', 'key' => 'admin-user-delete', 'route' => 'admin.user.delete', 'link_in_admin_menu' => 0]);
        
                #USERS - PERMISSION
                Permission::insert(['main_name' => 'Užívatelia', 'name' => 'povolenia užívateľa', 'key' => 'user-permissions', 'route' => 'admin.permissions.user', 'link_in_admin_menu' => 0]);
        
                #USERS - GROUPS
                Permission::insert(['main_name' => 'Užívatelia', 'name' => 'skupiny užívateľa', 'key' => 'user-groups', 'route' => 'admin.groups.user', 'link_in_admin_menu' => 0]);
        
        
                #TEAMS
                Permission::insert(['main_name' => 'Tímy', 'name' => 'spravovať tímy', 'key' => 'teams', 'route' => 'admin.teams', 'link_in_admin_menu' => 1]);
        
                #PLAYERS
                Permission::insert(['main_name' => 'Hráči', 'name' => 'zoznam hráčov', 'key' => 'admin-players', 'route' => 'admin.players', 'link_in_admin_menu' => 1]);
                Permission::insert(['main_name' => 'Hráči', 'name' => 'vytvoriť hráča', 'key' => 'admin-player-add', 'route' => 'admin.player.add', 'link_in_admin_menu' => 0]);
                Permission::insert(['main_name' => 'Hráči', 'name' => 'upraviť hráča', 'key' => 'admin-player-edit', 'route' => 'admin.player.edit', 'link_in_admin_menu' => 0]);
                Permission::insert(['main_name' => 'Hráči', 'name' => 'vymazať hráča', 'key' => 'admin-player-delete', 'route' => 'admin.player.delete', 'link_in_admin_menu' => 0]);
                Permission::insert(['main_name' => 'Hráči', 'name' => 'trvalo vymazať hráča', 'key' => 'admin-player-destroyForce', 'route' => 'admin.player.destroyForce', 'link_in_admin_menu' => 0]);
            
                #TRAININGS
                Permission::insert(['main_name' => 'Hráči', 'name' => 'zoznam tréningov', 'key' => 'admin-trainings', 'route' => 'admin.trainings', 'link_in_admin_menu' => 1]);
                Permission::insert(['main_name' => 'Hráči', 'name' => 'pridať tréning', 'key' => 'admin-trainings-add', 'route' => 'admin.trainings.add', 'link_in_admin_menu' => 1]);
                Permission::insert(['main_name' => 'Hráči', 'name' => 'upraviť tréning', 'key' => 'admin-trainings-edit', 'route' => 'admin.trainings.edit', 'link_in_admin_menu' => 0]);
                Permission::insert(['main_name' => 'Hráči', 'name' => 'vymazať tréning', 'key' => 'admin-trainings-delete', 'route' => 'admin.trainings.delete', 'link_in_admin_menu' => 0]);
        
            
    }
}
