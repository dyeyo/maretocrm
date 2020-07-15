@extends('layouts.app')
@section('content')
<style>
@media (max-width: 992px) {
  .btncelular {
    display: block !important;
  }
  .btngrande{
    display:none;
  }
}
</style>
<div class="page-wrapper">
  <div class="container-fluid">
    <div class="row page-titles">
      <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Bienvenido</h4>
      </div>
      <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center" aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Inicio</a></li>
            <li class="breadcrumb-item active">Clientes</li>
            <li class="breadcrumb-item">
              <a type="button" class="btn btn-info btngrande" data-toggle="modal" data-target="#exampleModal">
              <i class="fa fa-plus-circle"></i> Agregar cliente</a>
              <a type="button" class="btn btn-info btncelular  btn-circle" data-toggle="modal" style="display:none" data-target="#exampleModal">
              <i class="fa fa-plus-circle"></i></a>
            </li>
            @if (Auth()->user()->role == 1)
              <li class="btngrande">
                <a href="{{ route('loadExcel') }}" class="btn btn-success btngrande ml-2">
                <i class="fa fa-file-excel"></i> Descargar Datos</a>
              </li>
              <li class="btncelular" style="display:none">
                <a href="{{ route('loadExcel') }}" class="btn btn-success btn-circle ml-2">
                <i class="fa fa-file-excel"></i></a>
              </li>
            @endIf
          </ol>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <div class="card">
          <div class="card-body">
            @if($errors->any())
              <div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
                @foreach($errors->all() as $error)
                  {{ $error }}<br/>
                @endforeach
              </div>
            @endif
            @if(Session::has('message'))
              <div class="alert alert-success">
                {!! Session::get('message') !!}
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              </div>
            @endif
            @if (Auth()->user()->role == 1)
            <h2>Clientes Registrados</h2>
              <div class="table-responsive">
                <table class="table" id="tabla">
                  <thead>
                    <tr>
                      <th>Nombre completo</th>
                      <th>Numero de ID</th>
                      <th>Ciudad</th>
                      <th>Dirección</th>
                      <th>Telefono</th>
                      <th>Tipo de Contrato</th>
                      <th>Asesor</th>
                      <th>Fecha de Registro</th>
                      <th>Seguimiento</th>
                      @if (Auth()->user()->role == 1)
                        <th>Editar</th>
                      @endIf
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($clientsListAdmin as $client)
                      <tr>
                        <td>{{$client->name}}</td>
                        <td>{{$client->numIdenficication}}</td>
                        <td>{{$client->city}}</td>
                        <td>{{$client->addrees}}</td>
                        <td>{{$client->phone}}</td>
                        <td>{{$client->titleContract}}</td>
                        <td>{{$client->asesor->name}}</td>
                        <td>{{ Carbon\Carbon::parse($client->created_at)->format('d-m-Y') }}</td>
                        <td>
                          <a href="{{ route('tracing',$client->id) }}"><i class="fas fa-eye"></i></a>
                        </td>
                        @if (Auth()->user()->role == 1)
                          <td>
                            <a class="btn btn-warning btn-sm" href="{{ route('clientsEdit',$client->id) }}">Editar</a>
                          </td>
                        @endif
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            @else
              <h2>Seguimiento de mis Clientes Registrados</h2>
              <div class="table-responsive">
                <table class="table" id="tabla">
                  <thead>
                    <tr>
                      <th>Nombre completo</th>
                      <th>Numero de ID</th>
                      <th>Ciudad</th>
                      <th>Dirección</th>
                      <th>Telefono</th>
                      <th>Correo</th>
                      <th>Tipo de contrato</th>
                      <th>Asesor</th>
                      <th>Fecha de Registro</th>
                      <th>Seguimiento</th>
                      @if (Auth()->user()->role == 1)
                        <th>Editar</th>
                      @endIf
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($clientsListAsesorRegistrado as $client)
                      <tr>
                        <td>{{$client->name}}</td>
                        <td>{{$client->numIdenficication}}</td>
                        <td>{{$client->city}}</td>
                        <td>{{$client->addrees}}</td>
                        <td>{{$client->phone}}</td>
                        <td>{{$client->email}}</td>
                        <td>{{$client->titleContract}}</td>
                        <td>{{$client->asesor->name}}</td>
                        <td>{{ Carbon\Carbon::parse($client->created_at)->format('d-m-Y') }}</td>
                        <td>
                          <a href="{{ route('tracing',$client->id) }}"><i class="fas fa-eye"></i></a>
                        </td>
                        @if (Auth()->user()->role == 1)
                          <td>
                            <a class="btn btn-warning btn-sm" href="{{ route('clientsEdit',$client->id) }}">Editar</a>
                          </td>
                        @endif
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>

              <h2>Seguimiento de mis Clientes Pendientes por Matricular</h2>
              <div class="table-responsive">
                <table class="table" id="tabla">
                  <thead>
                    <tr>
                      <th>Nombre completo</th>
                      <th>Numero de ID</th>
                      <th>Ciudad</th>
                      <th>Dirección</th>
                      <th>Telefono</th>
                      <th>Correo</th>
                    <th>Tipo de Contrato</th>
                      <th>Asesor</th>
                      <th>Fecha de Registro</th>
                      <th>Seguimiento</th>
                      @if (Auth()->user()->role == 1)
                        <th>Editar</th>
                      @endIf
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($clientsListAsesorSinMatricula as $client)
                      <tr>
                        <td>{{$client->name}}</td>
                        <td>{{$client->numIdenficication}}</td>
                        <td>{{$client->city}}</td>
                        <td>{{$client->addrees}}</td>
                        <td>{{$client->phone}}</td>
                        <td>{{$client->email}}</td>
                        <td>{{$client->titleContract}}</td>
                        <td>{{$client->asesor->name}}</td>
                        <td>{{ Carbon\Carbon::parse($client->created_at)->format('d-m-Y') }}</td>
                        <td>
                          <a href="{{ route('tracing',$client->id) }}"><i class="fas fa-eye"></i></a>
                        </td>
                        @if (Auth()->user()->role == 1)
                          <td>
                            <a class="btn btn-warning btn-sm" href="{{ route('clientsEdit',$client->id) }}">Editar</a>
                          </td>
                        @endif
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            @endIf
          </div>
        </div>

        <div class="card">
          <div class="card-body">
            @if(Session::has('message'))
              <div class="alert alert-success">
                {!! Session::get('message') !!}
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              </div>
            @endif
            @if (Auth()->user()->role == 1)
              <h2>Clientes Por Asesor</h2>
              <div class="table-responsive">
                <table class="table" id="tabla">
                  <thead>
                    <tr>
                      <th>Nombre completo</th>
                      <th>Numero de ID</th>
                      <th>Ciudad</th>
                      <th>Dirección</th>
                      <th>Telefono</th>
                      <th>Correo</th>
                    <th>Tipo de Contrato</th>
                      <th>Asesor</th>
                      <th>Fecha de Registro</th>
                      <th>Seguimiento</th>
                      @if (Auth()->user()->role == 1)
                        <th>Editar</th>
                      @endIf
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($clientsList as $client)
                      <tr>
                        <td>{{$client->name}}</td>
                        <td>{{$client->numIdenficication}}</td>
                        <td>{{$client->city}}</td>
                        <td>{{$client->addrees}}</td>
                        <td>{{$client->phone}}</td>
                        <td>{{$client->email}}</td>
                        <td>{{$client->titleContract}}</td>
                        <td>{{$client->asesor->name}}</td>
                        <td>{{ Carbon\Carbon::parse($client->created_at)->format('d-m-Y') }}</td>
                        <td>
                          <a href="{{ route('tracing',$client->id) }}"><i class="fas fa-eye"></i></a>
                        </td>
                        @if (Auth()->user()->role == 1)
                          <td>
                            <a class="btn btn-warning btn-sm" href="{{ route('clientsEdit',$client->id) }}">Editar</a>
                          </td>
                        @endif
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            @endIf

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Crear Cliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form
          class="ui form"
          action="{{route('createClient')}}"
          id="formCliente"
          method="POST">
          {{ method_field('post') }}
          {{csrf_field()}}
          <input type="hidden" name="asesorId" id="asesorId" value="{{Auth()->user()->id}}" />
          <div class="alert alert-info"  role="alert">
            <div class="form-group">
              <label>Nombre Completo del Titular del Contrato</label>
              <input
                value="{{ old('name') }}"
                type="text"
                class="form-control"
                name="name"
                id="name"
                placeholder="Nombre Completo del Titular"
              />
            </div>
            <div class="form-group">
              <label>Teléfono</label>
              <input
                value="{{ old('phone') }}"
                type="text"
                class="form-control"
                name="phone"
                id="phone"
                placeholder="Telefono"
              />
            </div>
            <div class="form-group">
              <label>Correo Electrónico</label>
              <input
                value="{{ old('email') }}"
                type="email"
                class="form-control"
                name="email"
                id="email"
                placeholder="Correo Electronico"
              />
            </div>
              <input
              value="{{ Auth()->user()->contry }}"
              type="hidden"
              class="form-control"
              name="contry"
              id="contry"
            />
          </div>
          <div id="datosSecundarios">
            @if(Auth()->user()->contry == 'Colombia')
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
            @elseif(Auth()->user()->contry == 'Estados Unidos')
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
            @elseif(Auth()->user()->contry == 'España')
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
            <div class="form-group">
              <label>No de identificación</label>
              <input
                value="{{ old('numIdenficication') }}"
                type="text"
                class="form-control"
                name="numIdenficication"
                id="numIdenficication"
                placeholder="no Identificación"
              />
            </div>
            <div class="form-group">
              <label>Tipo de Negocio</label>
              <input type="text" class="form-control" name="scholl" id="scholl" placeholder="Negocio" />
            </div>
            <div class="form-group">
              <label>Dirección</label>
              <input
                value="{{ old('addrees') }}"
                type="text"
                class="form-control"
                name="addrees"
                id="addrees"
                placeholder="Dirección"
              />
            </div>


          </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </form>
      </div>
    </div>
  </div>
</div>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
<script src="https://code.jquery.com/jquery-3.1.1.min.js" defer></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js" defer></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js" defer></script>

@endsection
