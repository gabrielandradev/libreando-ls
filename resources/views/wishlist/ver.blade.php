<x-app-layout>
    @foreach ($book_list as $b)
        <div>
            <div>
                <a href="{{route("libro", $b->book->id)}}"><h2>{{$b->book->titulo}}</h2></a>                
                @foreach ($b->book->authors as $author)
                     <a href="{{route('autor', [$author->id])}}">{{$author->nombre}},</a>
                @endforeach
                <p>{{$b->book->desc_primario}}</p>
                <p>{{$b->book->availability->estado}}</p>
            </div>

            <form action="{{route('wishlist.eliminar', $b->id)}}" method="post">
                @csrf
                <button>Eliminar</button>
            </form>
        </div>        
    @endforeach

</x-app-layout>