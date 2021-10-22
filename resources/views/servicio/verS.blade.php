@extends('layouts.app')

@section('content')
<style>
    .logoimg {
        background-image: url("{{asset('storage').'/'.$servicio->Logo}}");
        background-repeat: no-repeat;
        background-size: cover;
    }

</style>
<div class="container">
    <div class=" w-100 d-flex justify-content-center align-items-center bg-secondary mb-3" style="min-height: 40vh">
        <div class="w-50 d-flex justify-content-center align-items-center">
            <img class="w-100" src="{{asset('storage').'/'.$servicio->Logo}}"
                alt="Imagen principal de {{$servicio->NombreS}}">
            @if($servicio->TipoS == '1')
            <p class="text-center text-primary position-absolute tituloS">{{$servicio->NombreS}}</p>
            @else
            <p class="text-center text-success position-absolute tituloS">{{$servicio->NombreS}}</p>
            @endif
        </div>
    </div>

    <div class="container bg-warning d-flex justify-content-center align-items-center pt-1 text-justify mb-3">
        <p>{{$servicio->DescripcionS}}</p>
    </div>

    <div
        class="text-white container bg-secondary d-flex justify-content-around align-items-center pt-1 text-justify mb-3 py-4 pt-3">
        <div>Atendido por: <span><b>{{$servicio->AtiendeS}}</b></span></div>
        <div>Servicio para necesidades en: <span><b>
                    @if($servicio->TipoS==1)
                    SOFTWARE
                    @else
                    HARDWARE
                    @endif
                </b></span></div>
    </div>

    <div class="container mb-3">
        <section class="mapa">
            <iframe
                src="{{$servicio->AtiendeS}}"
                width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </section>
    </div>


    <div class="galery container d-flex justify-content-around align-items-center bg-warning flex-wrap py-4 mb-3">
        <img src="{{asset('storage').'/'.$servicio->Img1S}}" alt="Imagen 1 de descripcion" class="mb-3">
        <img src="{{asset('storage').'/'.$servicio->Img2S}}" alt="Imagen 2 de descripcion" class="mb-3">
        <img src="{{asset('storage').'/'.$servicio->Img3S}}" alt="Imagen 3 de descripcion" class="mb-3">
        <img src="{{asset('storage').'/'.$servicio->Img4S}}" alt="Imagen 4 de descripcion" class="mb-3">
        <img src="{{asset('storage').'/'.$servicio->Img5S}}" alt="Imagen 5 de descripcion" class="mb-3">
    </div>

    <div class="container d-flex justify-content-around align-items-center bg-secondary flex-wrap py-4 mb-3">
        @if($servicio->WhatsappS != '')
        <div class="btn btn-dark">
            <i class="bi bi-whatsapp"></i>
            <a href="{{$servicio->WhatsappS}}" class="text-white" style="text-decoration: none;">Whatsapp</a>
        </div>
        @endif
        @if($servicio->FacebookS != '')
        <div class="btn btn-dark">
            <i class="bi bi-facebook"></i>
            <a href="{{$servicio->FacebookS}}" class="text-white" style="text-decoration: none;">Facebook</a>
        </div>
        @endif
        @if($servicio->TwiterS != '')
        <div class="btn btn-dark">
            <i class="bi bi-twitter"></i>
            <a href="{{$servicio->TwiterS}}" class="text-white" style="text-decoration: none;">Twitter</a>
        </div>
        @endif
        @if($servicio->InstagramS != '')
        <div class="btn btn-dark">
            <i class="bi bi-instagram"></i>
            <a href="{{$servicio->InstagramS}}" class="text-white" style="text-decoration: none;">Instagram</a>
        </div>
        @endif
    </div>
</div>

@endsection
