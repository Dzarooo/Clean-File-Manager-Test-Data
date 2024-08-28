<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\User;
use App\Modules\Invoice\Models\Invoice;
use App\Modules\Report\Models\Report;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Report::create([
            'number' => 'report1',
            'title' => 'report1',
            'description' => 'report1',
        ]);

        Invoice::create([
            'number' => 'invoice1',
            'title' => 'invoice1',
            'service' => 'invoice1',
            'price' => 1.0,
        ]);
    }
}
