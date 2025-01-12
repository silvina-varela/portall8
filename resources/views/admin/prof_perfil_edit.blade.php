@extends('layouts.home')

@section('main')

<div role="main" class="main">

    <div role="main" class="main">

        <section class="section section-concept section-no-border section-dark section-angled section-angled-reverse pt-5 m-0 overlay overlay-show overlay-op-8" style="background-image: url({{asset('img/slides/slide-bg-4.jpg')}}); background-size: cover; background-position: center; min-height: 645px;">
            <div class="section-angled-layer-bottom section-angled-layer-increase-angle bg-light" style="padding: 8rem 0;"></div>
            <div class="container pt-lg-5 mt-5">
                <div class="row pt-3 pb-lg-0 pb-xl-0">
                    <div class="col-lg-6 pt-4 mb-5 mb-lg-0">
                        <ul class="breadcrumb font-weight-semibold text-4 negative-ls-1">
                            <li><a href="{{route('welcome')}}">Inicio</a></li>
                            <li class="text-color-primary"><a href="#">Panel de control</a></li>
                            
                        </ul>
                        <h1 class="font-weight-bold text-10 text-xl-12 line-height-2 mb-3">Profesional {{$user->name }} {{ $user->last_name }}</h1>
                        
                        <a href="#ver" data-hash data-hash-offset="0" data-hash-offset-lg="100" class="btn btn-gradient-primary border-primary btn-effect-4 font-weight-semi-bold px-4 btn-py-2 text-3">VER <i class="fas fa-arrow-down ms-1"></i></a>
                        
                    </div>

                </div>
            </div>
        </section>
        
        
        
        <div role="main" class="main" id="ver">

            <div class="container pt-3 pb-2">

                <h2 class="font-weight-normal line-height-1">Hola, <strong class="font-weight-extra-bold">{{ $user->name }} {{ $user->last_name }}</strong></h2>
                @if (Session::has('message'))
                <div class="alert alert-success">
                    <p>{{ Session::get('message') }}</p>
                </div>
                @endif
                @if (Session::has('error'))
                <div class="alert alert-danger">
                    <p>{{ Session::get('error') }}</p>
                </div>
                @endif
                <div class="row pt-2">
                    <div class="col-lg-3 mt-4 mt-lg-0">

                        <div class="d-flex justify-content-center mb-4">
                            <div class="profile-image-outer-container">
                                <div class="profile-image-inner-container bg-color-primary">
                                    @if ($user->avatar == '/img/team/perfil_default.jpg')
                                    <img id="output" src="{{ asset('img/projects/bicicleta.jpg')}}">
                                    @else
                                    <img id="output" src="{{ asset($user->avatar) }}">
                                    @endif

                                    <span class="profile-image-button bg-color-dark">
                                        <i class="fas fa-camera text-light"></i>
                                    </span>
                                </div>
                                <!--
                                <form action="{{ route('prof_avatarupload', ['hash_user' => $user->hash])  }}" method="POST" enctype="multipart/form-data" >
                                    {{ method_field('PUT') }}
                                    @csrf
                                    <br>
                                    
                                    <input type="file" id="file" name="avatar" class="form-control profile-image-input" accept='image/*' onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])" required>
                                -->
                                
                                
                            </div>
                            
                        </div>
                        
                        <aside class="sidebar mt-2" id="sidebar">
                            
                            <ul class="nav nav-list flex-column mb-5">
                                <!--
                                <button type="submit" class="btn btn-primary btn-modern float-end mb-4" data-dismiss="fileupload">Subir imagen</button>
                                </form>
                                -->
                                
                                <!--
                                    <li class="nav-item"><a class="nav-link text-3 text-dark active" href="{{ route('prof_perfil', ['hash_user' => $user->hash])}}">Perfil Profesional</a></li>
                                @if ($user->profile())
                                <li class="nav-item"><a class="nav-link text-3" href="{{ route('prof_publicacion', ['hash_user' => $user->hash]) }}">Publicaciones Profesional</a></li>
                                @endif
                                -->
                                <!--<li class="nav-item"><a class="nav-link text-3" href="#">Mensajes</a></li> -->
                                <!-- <li class="nav-item"><a class="nav-link text-3" href="{{ url('/clave') }}">Contraseña</a></li>-->
                                <!--<li class="nav-item"><a class="nav-link text-3" href="#">Salir</a></li>-->
                            </ul>
                        </aside>

                    </div>
                    <div class="col-lg-9">

                        <form role="form" class="needs-validation" action="{{ route('prof_perfil_update', ['hash_user' => $user->hash]) }}" method="post" enctype="multipart/form-data">
                            {{ method_field('PUT') }}
                            @csrf
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2 required">Nombre (*)</label>
                                <div class="col-lg-9">
                                    <input class="form-control text-3 h-auto py-2 @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name', $user->name ) }}" required>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2 required">Apellido (*)</label>
                                <div class="col-lg-9">
                                    <input class="form-control text-3 h-auto py-2 @error('last_name') is-invalid @enderror" type="text" name="last_name" value="{{ old('last_name', $user->last_name ) }}" required>
                                    @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2 required">Email (*)</label>
                                <div class="col-lg-9">
                                    <input class="form-control text-3 h-auto py-2 @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email', $user->email ) }}" required>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2 required">Celular (*)</label>
                                <div class="col-lg-9">
                                    <input class="form-control text-3 h-auto py-2" type="number" name="mobile" placeholder="Ej: 1155668899, sin guiones y sin cero delante." value="{{ $user->profile->mobile }}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2 required">D.N.I. (*)</label>
                                <div class="col-lg-9">
                                    <input class="form-control text-3 h-auto py-2 @error('dni') is-invalid @enderror" type="number" name="dni" value="{{ old('dni', $user->dni) }}" placeholder="Sin puntos, Ej: 22111333" required>
                                    @error('dni')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2 required">CFP (*)</label>
                                <div class="col-lg-9">
                                    <select class="form-control text-3 h-auto py-2 @error('user_cfp') is-invalid @enderror" name="user_cfp"  id="subject" required>
                                        @if ($user_cfp->id)
                                        <option value="{{ old('user_cfp',$user_cfp->id) }}"> {{ old('name',$user_cfp->name) }}</option>
                                        @endif
                                        @foreach ($user_cfp_all as $user_cfpx)
                                            <option value='{{ $user_cfpx->id }}'>{{ $user_cfpx->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('user_cfp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                           
        
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2 required">{{ __('Imagen de pefil') }} </label>
        
                                <div class="col-md-6">
                                    <input id="avatar" type="file" class="form-control text-3 h-auto py-2 @error('avatar') is-invalid @enderror" name="avatar" value="{{ old('avatar') }}" onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
                                    @error('avatar')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2 ">Teléfono fijo</label>
                                <div class="col-lg-9">
                                    <input class="form-control text-3 h-auto py-2" type="number" name="phone" value="{{ old('phone',$user->profile->phone ) }}">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2">Facebook</label>
                                <div class="col-lg-9">
                                    <input class="form-control text-3 h-auto py-2 @error('name') is-invalid @enderror" type="text" name="facebook" value="{{ old('facebook',$user->profile->facebook ) }}" >
                                    @error('facebook')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2">Instagram</label>
                                <div class="col-lg-9">
                                    <input class="form-control text-3 h-auto py-2 @error('name') is-invalid @enderror" type="text" name="instagram" value="{{ old('instagram',$user->profile->instagram) }}">
                                    @error('instagram')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <!--<a href="#" class="btn btn-default fileupload-new" data-dismiss="fileupload">Zonas de trabajo </a>-->
                                <label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2">Zonas de trabajo </label>
                                <div class="col-lg-9">
                                    <ul class="portfolio-list sort-destination" data-sort-id="portfolio">
                                        <li class="col-md-4 col-sm-6 col-xs-12 isotope-item websites">
                                            <label for="">
                                            <input type="checkbox" name="select-all" onclick="toggle(this);" multiple ria-label="Radio button for following text input" /> Todos los barrios
                                            </label><br>
                                        </li>
                                    
                                        
                                        @if($zonas_all)
                                            @foreach($zonas_all as $zona)
                                                <li class="col-md-4 col-sm-6 col-xs-12 isotope-item websites">
                                                @if($user->hasZona($zona))
                                                    <label for="">
                                                    <input type="checkbox" name="zonas[]" value="{{ $zona->name }}" multiple ria-label="Radio button for following text input" checked> {{ $zona->name }}
                                                    </label><br>
                                                @else
                                                <label for="">
                                                <input type="checkbox" name="zonas[]" value="{{ $zona->name }}" multiple ria-label="Radio button for following text input"> {{ $zona->name }}
                                                </label><br>
                                                @endif
                                                    
                                                </li>
                                            @endforeach
                                        @else  
                                            <p>Ups! Algo ocurrio con las zonas</p>
                                        @endif
                                    </ul>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="form-group col-lg-9">
                                    <a href="{{ route('admin_profesionales') }}" class="btn btn-dark btn-modern float-end">Volver</a>
                                </div>
                                
                                <div class="form-group col-lg-3">
                                    <button type="submit" value="Guardar Cambios" class="btn btn-primary btn-modern float-end" data-loading-text="Cargando...">Guardar </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>

            </div>

        </div>

        
            
    
            
        </div>
        

        


        </div>






    </div>

</div>
</div>
@endsection
