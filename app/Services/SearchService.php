<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 26.04.2020
 * Time: 20:50
 */

namespace App\Services;


use Illuminate\Support\Facades\DB;

class SearchService
{
    public function search(string $query): array
    {
        $users = DB::table('users')
            ->where('name', 'like', "%{$query}%")
            ->orWhere('email', 'like', "%{$query}%")
            ->get()->map(function($user) {
                return [
                    'id' => $user->id,
                    'name' => $user->name,
                    'url'   => route('user.update', ['id' => $user->id]),
                    'type'  => 'сотрудник'
                ];
            })->all();

        $projects = DB::table('projects')
            ->where('name', 'like', "%{$query}%")
            ->get()->map(function($project){
                return [
                  'id'  => $project->id,
                  'name'    => $project->name,
                  'url' => route('project.show', ['id' => $project->id]),
                  'type'    => 'проект'
                ];
            })->all();

        return array_merge($users, $projects);
    }
}