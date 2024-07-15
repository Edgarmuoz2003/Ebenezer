@extends('layouts.app')

@section('titulo', 'Ebenezer-Store')

@section('content')
<div class="container-fluid">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Contactenos</span></h2>
    <div class="row px-xl-5">
        <div class="col-lg-7 mb-5">
            <div class="contact-form bg-light p-30">
                <div id="success"></div>
                <form name="sentMessage" id="contactForm" novalidate="novalidate">
                    <div class="control-group">
                        <input type="text" class="form-control" id="name" placeholder="Ingrese su Nombre"
                            required="required" data-validation-required-message="Por favor Ingrese su Nombre" />
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="control-group">
                        <input type="email" class="form-control" id="email" placeholder="E-mail"
                            required="required" data-validation-required-message="por favor ingrese su email" />
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="control-group">
                        <input type="text" class="form-control" id="subject" placeholder="Asunto"
                            required="required" data-validation-required-message="Escriba aqui el Asunto" />
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="control-group">
                        <textarea class="form-control" rows="8" id="message" placeholder="Mensaje"
                            required="required"
                            data-validation-required-message="Escriba aqui su Mensaje"></textarea>
                        <p class="help-block text-danger"></p>
                    </div>
                    <div>
                        <button class="btn btn-primary py-2 px-4" type="submit" id="sendMessageButton">Enviar Mensaje</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-5 mb-5">
            <div class="bg-light p-30 mb-30">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.226164066039!2d-75.61715232627212!3d6.233889826463715!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e44298c015f67d1%3A0xb583131f91c572c6!2zQ3JhIDg5RCAjMzEtMjIsIE1lZGVsbMOtbiwgQmVsw6luLCBNZWRlbGzDrW4sIEFudGlvcXVpYQ!5e0!3m2!1ses!2sco!4v1721070700427!5m2!1ses!2sco" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="bg-light p-30 mb-3">
                <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>Cra 89d #31-22, Medellin-Colombia</p>
                <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>info@ebenezer-store.com</p>
                <p class="mb-2"><i class="fa fa-phone-alt text-primary mr-3"></i>+057 300 487 66 78</p>
            </div>
        </div>
    </div>
</div>

@include('layouts.botonsubir')
@endsection