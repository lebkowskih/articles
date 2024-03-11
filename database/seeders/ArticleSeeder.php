<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Author;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        Article::factory()
            ->hasAttached(
                Author::factory()->count(3)
            )
            ->create();
    }
}
