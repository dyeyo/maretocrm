@extends('layouts.app')

@section('content')
<div>
  <div class="container">
    <div class="row">
      <div class="col-md-12 formcontent">
        <h1>Información del contrato</h1>
        <form
          class="ui form"
          action="{{route('contractPay')}}"
          id="contratoForm"
          method="POST">
          {{ method_field('post') }}
          {{csrf_field()}}
          <input type="hidden" name="asesorId" id="asesorId" value="{{$_GET["asesor"]}}" />
          <input type="hidden" name="clientId" id="clientId" value="{{decrypt($_GET["idenClient"])}}" />
          <input type="hidden" name="titleContract" id="titleContract" value="{{$tituloContrato}}" />
          <div class="form-group">
            <label>Nombre Completo del Titular del Contrato</label>
            <input
              type="text"
              value="{{$_GET["name"]}}"
              class="form-control"
              name="name"
              id="name"
              placeholder="Nombre Completo del Titular"
            />
          </div>
          <div class="form-group">
            <label>No de identificación</label>
            <input
              type="text"
              value="{{decrypt($_GET["numIdenficication"])}}"
              class="form-control"
              name="numIdenficication"
              id="numIdenficication"
              placeholder="no Identificación"
            />
          </div>
          <div class="form-group">
            <label>Dirección</label>
            <input
              type="text"
              value="{{decrypt($_GET["addrees"])}}"
              class="form-control"
              name="addrees"
              id="addrees"
              placeholder="Dirección"
            />
          </div>
          <div class="form-group">
            <label>País</label>
            <input
              type="text"
              value="{{$_GET["contry"]}}"
              class="form-control"
              name="contry"
              id="contry"
              placeholder="Ciudad"
            />
          </div>
          <div class="form-group">
            @if($_GET["contry"] == 'Colombia')
            <div class="form-group">
              <label>Departamento</label>
              <select class="form-control select2" style="width: 100%" name="city">
                <option value=""></option>
                <option value="Amazonas">Amazonas</option>
                <option value="Antioquia">Antioquia</option>
                <option value="Arauca">Arauca</option>
                <option value="Atlanticp">Atlanticp</option>
                <option value="Bolivar">Bolivar</option>
                <option value="Boyaca">Boyaca</option>
                <option value="Caldas">Caldas</option>
                <option value="Caqueta">Caqueta</option>
                <option value="Casanare">Casanare</option>
                <option value="Cauca">Cauca</option>
                <option value="Cesar">Cesar</option>
                <option value="Chocp">Chocp</option>
                <option value="Cundinamarca">Cundinamarca</option>
                <option value="Cordoba">Cordoba</option>
                <option value="Guainia">Guainia</option>
                <option value="Guaviare">Guaviare</option>
                <option value="Huila">Huila</option>
                <option value="La Guajira">La Guajira</option>
                <option value="Magdalena">Magdalena</option>
                <option value="Meta">Meta</option>
                <option value="Nariño">Nariño</option>
                <option value="Norte de Santander">Norte de Santander</option>
                <option value="Putumayo">Putumayo</option>
                <option value="Quindio">Quindio</option>
                <option value="Risaralda">Risaralda</option>
                <option value="San Andrés y Providencia">San Andrés y Providencia</option>
                <option value="Santander">Santander</option>
                <option value="Sucre">Sucre</option>
                <option value="Tolima">Tolima</option>
                <option value="Valledel Cauca">Valledel Cauca</option>
                <option value="Vaupués">Vaupués</option>
                <option value="Vichada">Vichada</option>
              </select>
            </div>
          @elseif($_GET["contry"] == 'Estados Unidos')
            <div class="form-group">
              <label>Estado</label>
              <select class="form-control select2"  style="width: 100%" name="city">
                <option value=""></option>
                  <option value="Alabama">Alabama</option>
                  <option value="Alaska">Alaska</option>
                  <option value="American Samoa">American Samoa</option>
                  <option value="Arizona">Arizona</option>
                  <option value="Arkansas">Arkansas</option>
                  <option value="California">California</option>
                  <option value="Colorado">Colorado</option>
                  <option value="Connecticut">Connecticut</option>
                  <option value="Delaware">Delaware</option>
                  <option value="District Of Columbia">District Of Columbia</option>
                  <option value="Federated States Of Micronesia">Federated States Of Micronesia</option>
                  <option value="Florida">Florida</option>
                  <option value="Georgia">Georgia</option>
                  <option value="Guam">Guam</option>
                  <option value="Hawaii">Hawaii</option>
                  <option value="Idaho">Idaho</option>
                  <option value="Illinois">Illinois</option>
                  <option value="Indiana">Indiana</option>
                  <option value="Iowa">Iowa</option>
                  <option value="Kansas">Kansas</option>
                  <option value="Kentucky">Kentucky</option>
                  <option value="Louisiana">Louisiana</option>
                  <option value="Maine">Maine</option>
                  <option value="Marshall Islands">Marshall Islands</option>
                  <option value="Maryland">Maryland</option>
                  <option value="Massachusetts">Massachusetts</option>
                  <option value="Michigan">Michigan</option>
                  <option value="Minnesota">Minnesota</option>
                  <option value="Mississippi">Mississippi</option>
                  <option value="Missouri">Missouri</option>
                  <option value="Montana">Montana</option>
                  <option value="Nebraska">Nebraska</option>
                  <option value="Nevada">Nevada</option>
                  <option value="New Hampshire">New Hampshire</option>
                  <option value="New Jersey">New Jersey</option>
                  <option value="New Mexico">New Mexico</option>
                  <option value="New York">New York</option>
                  <option value="North Carolina">North Carolina</option>
                  <option value="North Dakota">North Dakota</option>
                  <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                  <option value="Ohio">Ohio</option>
                  <option value="Oklahoma">Oklahoma</option>
                  <option value="Oregon">Oregon</option>
                  <option value="Palau">Palau</option>
                  <option value="Pennsylvania">Pennsylvania</option>
                  <option value="Puerto Rico">Puerto Rico</option>
                  <option value="Rhode Island">Rhode Island</option>
                  <option value="South Carolina">South Carolina</option>
                  <option value="South Dakota">South Dakota</option>
                  <option value="Tennessee">Tennessee</option>
                  <option value="Texas">Texas</option>
                  <option value="Utah">Utah</option>
                  <option value="Vermont">Vermont</option>
                  <option value="Virgin Islands">Virgin Islands</option>
                  <option value="Virginia">Virginia</option>
                  <option value="Washington">Washington</option>
                  <option value="West Virginia">West Virginia</option>
                  <option value="Wisconsin">Wisconsin</option>
                  <option value="Wyoming">Wyoming</option>
              </select>
            </div>
          @elseif($_GET["contry"] == 'España')
            <div class="form-group">
              <label>Provincia</label>
              <select class="form-control select2"  style="width: 100%" name="city">
                <option value=""></option>
                <option value="Almería">Almería</option>
                <option value="Cádiz">Cádiz</option>
                <option value="Córdoba">Córdoba</option>
                <option value="Granada">Granada</option>
                <option value="Huelva">Huelva</option>
                <option value="Jaén">Jaén</option>
                <option value="Málaga">Málaga</option>
                <option value="Sevilla">Sevilla</option>
                <option value="Huesca">Huesca</option>
                <option value="Teruel">Teruel</option>
                <option value="Zaragoza">Zaragoza</option>
                <option value="Asturias">Asturias</option>
                <option value="Balears, Illes">Balears, Illes</option>
                <option value="Palmas, Las">Palmas, Las</option>
                <option value="Santa Cruz de Tenerife">Santa Cruz de Tenerife</option>
                <option value="Cantabria">Cantabria</option>
                <option value="Ávila">Ávila</option>
                <option value="Burgos">Burgos</option>
                <option value="León">León</option>
                <option value="Palencia">Palencia</option>
                <option value="Salamanca">Salamanca</option>
                <option value="Segovia">Segovia</option>
                <option value="Soria">Soria</option>
                <option value="Valladolid">Valladolid</option>
                <option value="Zamora">Zamora</option>
                <option value="Albacete">Albacete</option>
                <option value="Ciudad Real">Ciudad Real</option>
                <option value="Cuenca">Cuenca</option>
                <option value="Guadalajara">Guadalajara</option>
                <option value="Toledo">Toledo</option>
                <option value="Barcelona">Barcelona</option>
                <option value="Girona">Girona</option>
                <option value="Lleida">Lleida</option>
                <option value="Tarragona">Tarragona</option>
                <option value="Alicante/Alacant">Alicante/Alacant</option>
                <option value="Castellón/Castelló">Castellón/Castelló</option>
                <option value="Valencia/València">Valencia/València</option>
                <option value="Badajoz">Badajoz</option>
                <option value="Cáceres">Cáceres</option>
                <option value="Coruña, A">Coruña, A</option>
                <option value="Lugo">Lugo</option>
                <option value="Ourense">Ourense</option>
                <option value="Pontevedra">Pontevedra</option>
                <option value="Madrid">Madrid</option>
                <option value="Murcia">Murcia</option>
                <option value="Navarra">Navarra</option>
                <option value="Araba/Álava">Araba/Álava</option>
                <option value="Bizkaia">Bizkaia</option>
                <option value="Gipuzkoa">Gipuzkoa</option>
                <option value="Rioja, La">Rioja, La</option>
                <option value="Ceuta">Ceuta</option>
                <option value="Melilla">Melilla</option>
              </select>
            </div>
          @endif
          </div>
          <div class="form-group">
            <label>Colegio/Universidad</label>
            <input type="text" class="form-control" name="scholl" id="scholl" placeholder="Colegio o Universidad" />
          </div>
          <div class="form-group">
            <label>Teléfono</label>
            <input
              type="text"
              value="{{decrypt($_GET["phone"])}}"
              class="form-control"
              name="phone"
              id="phone"
              placeholder="Telefono"
            />
          </div>
          <div class="form-group">
            <label>Correo Electrónico</label>
            <input
              type="email"
              value="{{decrypt($_GET["email"])}}"
              class="form-control"
              name="email"
              id="email"
              placeholder="Correo Electronico"
            />
          </div>
          <div class="form-check">
            <input
              onchange="contrato()"
              class="form-check-input"
              type="checkbox"
              value="SI"
              name="terminos"
              id="terminos"
            />
            <label class="form-check-label" for="terminos">
              Acepto estos términos y deseo continuar.
            </label>
          </div>
          <div class="form-check">
            <input
              class="form-check-input"
              type="checkbox"
              value="SI"
              name="terminosCompra"
              id="terminosCompra"
            />
            <label class="form-check-label" for="terminosCompra">
              Entiendo que los anteriores Términos de Compra tienen una
              fecha de ejemplo del acuerdo final (el "contrato"). Reconozco
              que recibiré el contrato efectivo final por correo electrónico
              al recibir el pago.
            </label>
          </div>
          <div class="form-check">
            <input
              class="form-check-input"
              type="checkbox"
              value="SI"
              name="terminosCusro"
              id="terminosCusro"
            />
            <label class="form-check-label" for="terminosCusro">
              Término del Curso: Entiendo y acepto que estoy comprando un programa de doce (12) meses por cuotas; y después que termine la duración, el programa se renovará automáticamente cada mes para que pueda continuar disfrutando el servicio.
            </label>
          </div>
          <br>
          <div id="contratocontenedor" style="display: none;">
            <div id='contrato' style="height: 300px !important;
            border: 1px solid #ddd !important;
            background: #f1f1f1 !important;
            overflow-y: scroll !important;">
              <div id='contenido' style="height: auto !important;">
                @foreach ($contract as $cnt)
                  <h4 class="textoContrato">TÉRMINOS Y CONDICIONES DE COMPRA: CONTRATO CELEBRADO EL {{$date_now}} ENTRE
                   <h4  class="textoContrato" id="nombreContrato"> </h4> <h4 class="textoContrato"> Y LECTOR AMI .</h4>
                  <p class="textoContrato">Por favor, lea los siguientes términos y condiciones de compra
                  con detenimiento (colectivamente, las &quot;Condiciones de Compra&quot;).
                  Estas Condiciones de Compra constituyen un acuerdo legal y
                  vinculante entre usted y Lector AMI (la &quot;Compañía&quot;) en relación
                  con la compra de 1 Programa(s) lectura Inteligente por (12)
                  mes(es) de Conexión (el &quot;Programa&quot;) ofrecido por la Compañía
                  de acuerdo con el interés demostrado por Ud. en su visita a la
                  página web. www.marketing.lectorami.co. Esta adquisición, está
                  sujeta a los Términos de Servicio que se encuentran publicados
                  en correo electrónico enviado por la Compañía, los cuales se
                  consideran parte integrante del presente documento.</p>
                  PAGO
                  <p class="textoContrato">
                    {{$cnt->firstText}}
                  </p>
                  RENOVACIÓN AUTOMÁTICA
                  <p class="textoContrato">
                    {{$cnt->secondText}}
                  </p>
                  <p class="textoContrato">Si usted tiene alguna pregunta o comentario sobre estas
                  condiciones de Compra, por favor, no dude en contactar a un
                  asesor de la Compañía a través de llamada telefónica al número
                  3213202115 o a través de los medios de contacto publicados en
                  la página web <a href="https://www.lectorami.com" target="_blank">www.lectorami.com</a>.</p>
                  <p class="textoContrato">NOTIFICACIONES A LECTOR AMI ACADEMIA</p>
                  <p class="textoContrato">Att: Asuntos Legales y Comerciales</p>
                  <p class="textoContrato">CARRERA 11 # 22N-10 POPAYAN</p>
                  <p class="textoContrato">Colombia</p>
                  <p class="textoContrato">3213202115 LINEA NACIONAL Whatsapp</p>
                  <p class="textoContrato">* El Suscriptor</p>
                  <p class="textoContrato">LECTOR AMI La Compañía</p>

                  <p class="textoContrato">*Por firma electrónica a las {{$date_now_hours}} </p>
                @endforeach
              </div>
            </div>
          </div>
          <textarea name="contract" style="display: none;" id="contract"></textarea>
          <button
            type="submit"
            id="pago"
            class="btn btn-success btn-lg btn-block"
          >
            Enviar Contrato
          </button>
        </form>
      </div>
    </div>
  </div>
</div>
<div
  class="modal fade"
  id="terminosdoc"
  tabindex="-1"
  role="dialog"
  aria-labelledby="ModalCenterTitle"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalCenterTitle">
          Política de Privacidad de Datos
        </h5>
        <button
          type="button"
          class="close"
          data-dismiss="modal"
          aria-label="Close"
        >
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>
          LECTOR AMI pone en conocimiento de los usuarios de
          www.lectorami.com, su política de protección de datos de carácter
          personal, para que los usuarios determinen libre y voluntariamente
          si desean facilitar a LECTOR AMI los datos personales que se les
          requieran con ocasión de rellenar cualquier formulario o correo de
          contacto, sin perjuicio que se proceda a dar cumplimiento al deber
          de información en cada uno de los medios a través de los que se
          proceda a la recogida de datos de carácter personal.
        </p>
        <p>
          LECTOR AMI declara su respeto y cumplimiento de las disposiciones
          recogidas en el decreto 1377 del 2013 de la republica de Colombia.
          El usuario responderá, en cualquier caso, de la veracidad de los
          datos facilitados, reservándose LECTOR AMI, el derecho a excluir
          de los servicios registrados a todo usuario que haya facilitado
          datos falsos, sin perjuicio de las demás acciones que procedan en
          derecho.
        </p>
        <p>
          Usted queda informado que los datos que facilite a través de la
          página web www.lectorami.com, LECTOR AMI utilizará esos datos para
          el envío de información, para el envío de publicidad y para la
          solicitud de información sobre productos y servicios y mejorar la
          calidad del servicio.
        </p>
        <p>
          Le informamos de la posibilidad de ejercer en cualquier momento
          los derechos de acceso, rectificación, oposición y, en su caso,
          cancelación de sus datos de carácter personal suministrados,
          mediante petición escrita dirigida a LECTOR AMI en la Carrera 4f #
          35-21 barrio Cadiz de la ciudad de Ibagué, Tolima, Colombia. O
          expresándolo por escrito vía correo electrónico a
          info@lectorami.com.
        </p>
      </div>
      <div class="modal-footer">
        <button
          type="button"
          class="btn btn-secondary"
          data-dismiss="modal"
        >
          Cerrar
        </button>
      </div>
    </div>
  </div>
</div>
@endsection
