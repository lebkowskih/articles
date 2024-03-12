<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\Author;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthorControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_getting_top_three_authors_that_wrote_the_most_articles_last_week()
    {
        $daysOfLastWeek = Carbon::now()->subDays(rand(0,7));
        $twoWeeksAgo = Carbon::now()->subWeeks(2);

        $authorsWithPostsFromThisWeek = Author::factory()
            ->count(10)
            ->hasArticles(3, [
                'created_at' => $daysOfLastWeek
            ])
            ->create();

        $authorsWithTheMostPostsFromThisWeek = Author::factory()
            ->count(3)
            ->hasArticles(10, [
                'created_at' => $daysOfLastWeek
            ])
            ->create();

        $authorsWithPostsFromMoreThanWeekAway = Author::factory()
            ->count(10)
            ->hasArticles(3, [
                'created_at' => $twoWeeksAgo
            ])
            ->create();

        $response = $this->get('/api/authors/top-authors')
            ->assertStatus(200)
            ->json();

        foreach ($response as &$item) {
            unset($item['articles_count']);
        }

        $authorsWithTheMostPostsFromThisWeek = $authorsWithTheMostPostsFromThisWeek->toArray();

        usort($response, function($a, $b) {
            return $a['id'] <=> $b['id'];
        });

        usort($authorsWithTheMostPostsFromThisWeek, function($a, $b) {
            return $a['id'] <=> $b['id'];
        });

        $this->assertEquals($response, $authorsWithTheMostPostsFromThisWeek);
    }
}
