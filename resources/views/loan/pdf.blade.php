<p><strong>Escuela Técnica Otto Krause</strong></p>
<p><strong>Biblioteca Ing. Eduardo Latzina</strong></p>
<p>Libreando: Sistema gratuito de gestión de bibliotecas</p>
<h1>Solicitud de préstamo #{{$loan->id}}</h1>
<p>Solicitud realizada el <time datetime="{{$loan->fecha_solicitud}}">{{$loan->fecha_solicitud}}</time></p>
<p>El presente comprobante tiene validez de certificado de solicitud de prestamo, y puede ser presentado ante las
    autoridades de la Biblioteca Ing. Eduardo Latzina. No es necesario imprimirlo</p>
<hr>
<h2>Artículo de préstamo</h2>
<p>Título: {{$loan->book->titulo}}</p>
<p>Ubicación física: {{$loan->book->ubicacion_fisica}}</p>
<p>ISBN: {{$loan->book->isbn}}</p>
<hr>
<h2>Datos del prestamista</h2>
<p>Número de cuenta: #{{$loan->borrower->id}}</p>
<p>Email: {{$loan->borrower->email}}</p>