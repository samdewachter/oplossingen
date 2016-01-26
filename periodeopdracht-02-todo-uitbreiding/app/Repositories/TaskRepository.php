<?php

namespace App\Repositories;

use App\User;
use App\Task;

use DB;

class TaskRepository
{
    /**
     * Get all of the tasks for a given user.
     *
     * @param  User  $user
     * @return Collection
     */
    public function forUser(User $user)
    {
        return Task::where('user_id', $user->id)
                    ->orderBy('created_at', 'asc')
                    ->get();
    }

    public function changeDone(User $user)
    {
        return Task::where('user_id', $user->id)
                        ->update(['done' => true]);
    }

    public function done($id)
    {
      return DB::table("tasks")
      ->where('id', $id)
      ->update(array("done" => true));
    }

    public function notDone($id)
    {
      return DB::table("tasks")
      ->where('id', $id)
      ->update(array("done" => false));
    }
}
