<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
use App\Models\Article;
use App\Repository\ArticleRepository;
use App\Repository\AuthorRepository;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function __construct(
        protected ArticleRepository $articleRepository,
        protected AuthorRepository $authorRepository
    ) {}

    public function index()
    {
        return view('articles.index')->with([
            'articles' => $this->articleRepository->getAll(),
        ]);
    }

    public function create()
    {
        return view('articles.create')->with([
            'authors' => $this->authorRepository->getAll(),
        ]);
    }

    public function edit(Article $article)
    {
        return view('articles.edit')->with([
            'authors' => $this->authorRepository->getAll(),
            'article' => $article,
        ]);
    }

    public function store(StoreArticleRequest $request)
    {
        $this->articleRepository->create($request->all());
        return redirect()->route('articles.index');
    }

    public function update(Article $article, StoreArticleRequest $request)
    {
        $this->articleRepository->update($article, $request->all());
        return redirect()->route('articles.index');
    }

    public function getById(int $id)
    {
        $article = $this->articleRepository->getById($id);
        return response()->json($article);
    }

    public function getByAuthor(int $authorId)
    {
        $articles = $this->articleRepository->getByAuthor($authorId);
        return response()->json($articles);
    }
}
