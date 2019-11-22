@extends('layouts.website')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Verifique seu e-mail</div>
                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            Um novo link de verificação foi enviado para o seu endereço de e-mail.
                        </div>
                    @endif
                        Antes de prosseguir, verifique seu e-mail para um link de verificação.
                        Se você não recebeu o email, <a href="{{ route('verification.resend') }}">clique aqui para solicitar outra</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
