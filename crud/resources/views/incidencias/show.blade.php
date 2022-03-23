@extends('layouts.head')
@section('title', 'Incidencia')

@section('content')
    <div class="bg-dark p-5">
        <div class="container d-flex justify-content-center align-items-center">
            <table class="table">
                <thead class="thead-dark">
                    <tr class="text-center">
                        <th scope="col">Id</th>
                        <th scope="col">@lang('Error')</th>
                        <th scope="col">@lang('Tipo del error')</th>
                        <th scope="col">@lang('Descripcion del error')</th>
                    </tr>
                </thead>
                <tbody>
                        <tr class="text-center bg-white">
                            <td>{{ $incidencia->id }}</td>
                            <td>{{ $incidencia->error }}</td>
                            <td>{{ $incidencia->tipoerror }}</td>
                            <td>{{ $incidencia->descerror }}</td>
                </tbody>
            </table>
        </div>
    </div>

