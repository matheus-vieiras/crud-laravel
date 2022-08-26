@component('mail::message')
    # Contato

    Olá, Matheus, você recebeu um email do {{$user['name']}}

    {{$user['message']}}

    @component('mail::button', ['url' => $url])
        Visite meus projetos
    @endcomponent

@endcomponent

