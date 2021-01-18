@extends('layouts.app')
@section('content')
<div class="loader-page-get" style="display: none;"></div>
<div class="container-fluid">
    <div class="content-header">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Bienvenido Encargado</li>
            </ol>  
        </nav>
    </div>
    <div class="row">
        <div class="col-sm-2 container-fluid">
            <ul class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <li class="nav-item">
                    <a class="nav-link active" id="v-pills-Inicio-tab" data-toggle="pill" href="#v-pills-Inicio" role="tab" aria-controls="v-pills-Inicio" aria-selected="true">
                        <i class="fas fa-home"></i> 
                        Inicio
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="v-pills-Consignacion-tab" data-toggle="pill" href="#v-pills-Consignacion" role="tab" aria-controls="v-pills-Consignacion" aria-selected="false">
                        <i class="fas fa-box-open"></i>
                        Consignación
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="v-pills-Usuarios-tab" data-toggle="pill" href="#v-pills-Usuarios" role="tab" aria-controls="v-pills-Usuarios" aria-selected="false">
                        <i class="fas fa-user-cog"></i>
                        Usuarios
                    </a>
                </li>
            </ul>
        </div>
        <div class="col-sm">
            <div class="container-sm">
                <div class="tab-content container-sm" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-Inicio" role="tabpanel" aria-labelledby="v-pills-Inicio-tab">
                        @include('politicas.RolEncargado')
                    </div>
                    <div class="tab-pane fade" id="v-pills-Consignacion" role="tabpanel" aria-labelledby="v-pills-Consignacion-tab">
                        @include('Content_Encargado.ConsignacionProductos')
                    </div>
                    <div class="tab-pane fade" id="v-pills-Usuarios" role="tabpanel" aria-labelledby="v-pills-Usuarios-tab">
                        @include('auth.restUser')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection