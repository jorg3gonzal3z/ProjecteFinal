@extends('layouts.layout')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@section('header')
    Sobre Nosotros
@stop

@section('content')
<link rel="stylesheet" type="text/css" href="{{ url('/css/sobre_nosotros.css') }}" />

<div class="card-container m-5">
  <h1 class="mt-5 card-title text-center text-white">Estamos aqui para que disfrutes de tu <span style="color:red;">PASIÓN</span></h1>
  
  <div class="mt-3 col-12 text-white text-center">
    <p>Aqui va algo</p>
  </div>
 
  <div>
    <img src="{{ asset('/storage/assets/jorgejuli.jpg')}}" alt="fotojorgejuli">
  </div>

  <div class="d-flex flex-wrap justify-content-center mb-3">

    <div class="text-center col-12 col-md-6 p-3">
      <div class=" btn btn-light p-4">
        <div class="">Juli Lechuga</div>
        <div class="title text-danger">Desarrollador Fullstack y Empresario</div>
      </div>
    </div>
    <div class="text-center col-12 col-md-6 p-3">
      <div class=" btn btn-light p-4">
        <div class="">Jorge Gonzalez</div>
        <div class="title text-danger">Desarrollador Fullstack y Calle</div>
      </div>
    </div>
  </div>

  <div class="mt-3 col-12 text-white text-center" style="cursor:pointer;" data-toggle="modal" data-target="#modalprivacidad">
    <p><u>Política de Privacidad</u></p>
  </div>

  <div class="modal fade" id="modalprivacidad" tabindex="-1" role="dialog" aria-labelledby="#modalprivacidad" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content " >
            <div class="modal-header">
                <h5 class="modal-title text-white" id="exampleModalCenterTitle">Política de Privacidad</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="text-danger" aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-5 text-white">
              <h1 style="color:#495057;">1. Política de privacidad</h1>
                <p class="ml-4">{{$informacio['nom_empresa']}} informa a los usuarios del sitio web sobre su política respecto del tratamiento y
                protección de los datos de carácter personal de los usuarios y clientes que puedan ser
                recabados por la navegación o contratación de servicios a través de su sitio web.<br>
                En este sentido, {{$informacio['nom_empresa']}} garantiza el cumplimiento de la normativa vigente en materia de
                protección de datos personales, reflejada en la Ley Orgánica 15/1999 de 13 de diciembre, de
                Protección de Datos de Carácter Personal y en el Real Decreto 1720/2007, de 21 diciembre, por
                el que se aprueba el Reglamento de Desarrollo de la LOPD.<br>
                El uso de esta web implica la aceptación de esta política de privacidad.
                </p>
              <h1 style="color:#495057;">2. Recogida, finalidad y tratamientos de datos</h1>
                <p class="ml-4">{{$informacio['nom_empresa']}} tiene el deber de informar a los usuarios de su sitio web acerca de la recogida de
                datos de carácter personal que pueden llevarse a cabo, bien sea mediante el envío de correo
                electrónico o al cumplimentar los formularios incluidos en el sitio web. En este sentido, Empresa
                A será considerada como responsable de los datos recabados mediante los medios
                anteriormente descritos.<br>
                A su vez {{$informacio['nom_empresa']}} informa a los usuarios de que la finalidad del tratamiento de los datos
                recabados contempla: La atención de solicitudes realizadas por los usuarios, la inclusión en la
                agenda de contactos, la prestación de servicios, la gestión de la relación comercial y otras
                finalidades.<br>
                Las operaciones, gestiones y procedimientos técnicos que se realicen de forma automatizada o
                no automatizada y que posibiliten la recogida, el almacenamiento, la modificación, la
                transferencia y otras acciones sobre datos de carácter personal, tienen la consideración de
                tratamiento de datos personales.<br>
                Todos los datos personales, que sean recogidos a través del sitio web de {{$informacio['nom_empresa']}}, y por
                tanto tenga la consideración de tratamiento de datos de carácter personal, serán incorporados en
                los ficheros declarados ante la Agencia Española de Protección de Datos por {{$informacio['nom_empresa']}}.
                </p>
              <h1 style="color:#495057;">3. Comunicación de información a terceros</h1>
                <p class="ml-4">{{$informacio['nom_empresa']}} informa a los usuarios de que sus datos personales no serán 	cedidos a terceras
                organizaciones, con la salvedad de que dicha cesión de datos este amparada en una obligación
                legal o cuando la prestación de un servicio implique la necesidad de una relación contractual con
                un encargado de tratamiento. En este último caso, solo se llevará a cabo la cesión de datos al
                tercero cuando {{$informacio['nom_empresa']}} disponga del consentimiento expreso del usuario.
                </p>
              <h1 style="color:#495057;">4. Derechos de los usuarios</h1>
                <p class="ml-4">La Ley Orgánica 15/1999, de 13 de diciembre, de Protección de Datos de Carácter Personal
                concede a los interesados la posibilidad de ejercer una serie de derechos relacionados con el
                tratamiento de sus datos personales.<br>
                En tanto en cuanto los datos del usuario son objeto de tratamiento por parte de {{$informacio['nom_empresa']}}. Los
                usuarios podrán ejercer los derechos de acceso, rectificación, cancelación y oposición de
                acuerdo con lo previsto en la normativa legal vigente en materia de protección de datos
                personales.<br>
                Para hacer uso del ejercicio de estos derechos, el usuario deberá dirigirse mediante
                comunicación escrita, aportando documentación que acredite su identidad (DNI o pasaporte), a
                la siguiente dirección: {{$informacio['adreca_1']}}, {{$informacio['zip_cp']}} {{$informacio['ciutat']}}, {{$informacio['provincia']}} o
                la dirección que sea sustituida en el Registro General de Protección de Datos. Dicha
                comunicación deberá reflejar la siguiente información: Nombre y apellidos del usuario, la petición
                de solicitud, el domicilio y los datos acreditativos.<br>
                El ejercicio de derechos deberá ser realizado por el propio usuario. No obstante, podrán ser
                ejecutados por una persona autorizada como representante legal del autorizado. En tal caso, se
                deberá aportar la documentación que acredite esta representación del interesado
                </p>
            </div>
            <div class="modal-footer d-flex justify-content-between">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Aceptar</button>
              </form>
            </div>
        </div>
    </div>
</div>

</div>



<script src="{{ url('/js/sobre_nosotros.js') }}"></script>

@stop