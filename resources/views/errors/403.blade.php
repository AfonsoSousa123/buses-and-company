@extends('errors::minimal')

@section('title', 'Acesso Proibido')
@section('code', '403')
@section('message', $exception->getMessage() ?: 'está proibido de aceder a esta página')
