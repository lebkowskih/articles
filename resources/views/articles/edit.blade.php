@extends('layouts.app')

@push('head')
    <script type="module">
        $(document).ready(function() {
            $('#text').val(@js($article->text));
            let authors = @js($article->authors);
            let authorsIds = []

            authors.forEach((author) => {
                authorsIds.push(author.id)
            })

            $('.authors-selector').select2();
            $('.authors-selector').val(authorsIds);
            $('.authors-selector').trigger('change');
        });
    </script>
@endpush

@section('content')
    <div class="w-3/6 mx-auto">
        <div class="border-b-2 border-black mt-2 flex">
            <h1 class="text-3xl">
                Articles form
            </h1>
        </div>
        <form action="{{ route('articles.update', $article) }}" method="POST" class="rounded border-2 mt-2">
            @method('PUT')
            @csrf
            <div class="w-11/12 ml-4">
                <div>
                    <label for="title" class="block mb-2 text-md font-medium">Title</label>
                    <input type="text" name="title" class="w-full border" value="{{ $article->title }}">
                    @error('title')
                        <div class="text-red-500 font-bold">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label for="text" class="block mb-2 text-md font-medium">Text</label>
                    <textarea name="text" id="text" rows="4" class="w-full border"></textarea>
                    @error('text')
                        <div class="text-red-500 font-bold">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label for="authors[]" class="block mb-2 text-md font-medium">Authors</label>
                    <select multiple name="authors[]" class="authors-selector">
                        @foreach ($authors as $author)
                            <option value="{{ $author->id }}">{{ $author->name }}</option>
                        @endforeach
                    </select>
                    @error('authors')
                        <div class="text-red-500 font-bold">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="mt-2 bg-green-500 mb-0.5 text-white rounded-md px-4 py-2">
                    Save
                </button>
            </div>
        </form>
    </div>
@endsection
