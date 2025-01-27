@extends('layouts.landingsinslider')
@section('title', 'Evidencias')
@section('content')
<!-- section -->
<div class="section margin-top_50">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-left">EVIDENCIAS</h1>
                <h3 class="text-left">
                    @if($iddireccion == 1)
                        Direccion de Evaluacion y Sistemas
                    @elseif($iddireccion == 2)
                        Direccion de Administracion y Finanzas
                    @elseif($iddireccion == 3)
                        Direccion de Promocion y Servicios
                    @elseif($iddireccion == 4)
                        Direccion de Cartera y Recuperacion
                    @else
                        Trimestre desconocido
                    @endif
                </h3>
                <h3 class="text-left">
                    @if($idtrimestre == 1)
                        ENERO-MARZO-2024
                    @elseif($idtrimestre == 2)
                        ABRIL-JUNIO-2024
                    @elseif($idtrimestre == 3)
                        JULIO-SEPTIEMBRE-2024
                    @elseif($idtrimestre == 4)
                        OCTUBRE-DICIEMBRE-2024
                    @else
                        Trimestre desconocido
                    @endif
                </h3>
                <h3 class="text-left">ELEMENTO {{ $idelemento }}</h3>
            </div>
        </div>
        <div class="row justify-content-center">
            @foreach ($evidencias as $evidencia)
                <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="border p-3 mb-3">
                                <img src="{{ asset('assets/images/folder.png')}}" class="img-fluid" alt="Imagen">
                                <a href="{{ asset('evidencias/' . $evidencia->archivoe) }}" class="d-block text-center mt-2" target="_blank">Ver documento</a>
                            </div>
                            <p>Usuario:</p>
                            <form action="{{ route('comentario.storeOrUpdate', $evidencia->idevidencia) }}" method="POST">
                                @csrf
                                <textarea type="text" class="form-control mb-2" placeholder="Comentario usuario" readonly rows="5">{{ $evidencia->comentario2->comentario ?? 'Sin comentario' }}</textarea>
                                <p>Revisión:</p>
                                <textarea name="comentario" class="form-control mb-2" placeholder="Escribe un comentario" rows="5">{{ $evidencia->comentario->comentario ?? 'Sin comentario' }}</textarea>
                                <select class="form-control mb-2" id="estadoap" name="estadoap">
                                    <option value="1" {{ $evidencia->estadoap == 1 ? 'selected' : '' }}>NO APROBADO</option>
                                    <option value="2" {{ $evidencia->estadoap == 2 ? 'selected' : '' }}>EN REVISION</option>
                                    <option value="3" {{ $evidencia->estadoap == 3 ? 'selected' : '' }}>APROBADO</option>
                                </select>
                                <button type="submit" class="btn btn-primary w-100 mb-2">Actualizar datos</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
        
    </div>
</div>
<!-- end section -->
@endsection

