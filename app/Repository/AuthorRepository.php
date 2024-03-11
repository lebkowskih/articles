<?php

namespace App\Repository;

use App\Models\Author;
use Carbon\Carbon;

class AuthorRepository
{
    public function getAll()
    {
        return Author::all();
    }

    public function getTopThreeFromLastWeek()
    {
        $lastWeek = Carbon::now()->subWeek();
        return Author::withCount('articles')
            ->whereHas('articles', function ($query) use ($lastWeek) {
                $query->where('articles.created_at', '>=', $lastWeek);
            })
            ->orderBy('articles_count', 'desc')
            ->limit(3)
            ->get();
    }
}
