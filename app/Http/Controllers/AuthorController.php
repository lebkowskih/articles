<?php

namespace App\Http\Controllers;

use App\Repository\AuthorRepository;

class AuthorController extends Controller
{
    public function __construct(
      protected AuthorRepository $authorRepository
    ) {}
    public function getTopThreeFromLastWeek()
    {
        $topThreeAuthorsFromLastWeek = $this->authorRepository->getTopThreeFromLastWeek();
        return response()->json($topThreeAuthorsFromLastWeek);
    }
}
