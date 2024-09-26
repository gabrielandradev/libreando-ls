<x-app-layout>
    @foreach ($book_list as $b)
    <div>
        <h2>{{$b->book->titulo}}</h2>
    </div>
    @endforeach
</x-app-layout>