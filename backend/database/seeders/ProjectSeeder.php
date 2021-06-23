<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\User;
use App\Models\Workspace;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $creator = User::factory()->create();
        $workspace = Workspace::factory()->create();

        Project::factory()->count(1000)
            ->for($creator, 'creator')
            ->for($workspace, 'workspace')
            ->create();
    }
}
