<?php

namespace App\Repository;

use App\Models\Article;
use App\Models\Author;
use Illuminate\Database\Eloquent\Collection;

class ArticleRepository
{
    public function getAll()
    {
        return Article::all();
    }
    public function getById(int $id)
    {
        return Article::findOrFail($id);
    }

    public function create(array $data)
    {
        $article = Article::create($data);
        $article->authors()->attach($data['authors']);
    }
    public function getByAuthor(int $authorId): Collection
    {
        $author = Author::findOrFail($authorId);
        return $author->articles()->get();
    }
}
