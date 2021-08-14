{{-- user info and avatar --}}
<div class="avatar av-l"><a href="/"><img width="100px" alt="100px" src="{{ asset('images/logo2.png') }}"
            alt="logo"></a></div>
<p class="info-name"><a href="/">{{ config('chatify.name') }}</a></p>
<div class="messenger-infoView-btns">
    {{-- <a href="#" class="default"><i class="fas fa-camera"></i> default</a> --}}
    <a href="#" class="danger delete-conversation"><i class="fas fa-trash-alt"></i> Borrar conversación</a>
</div>
{{-- shared photos --}}
<div class="messenger-infoView-shared">
    <p class="messenger-title">Archivos compartidos</p>
    <div class="shared-photos-list"></div>
</div>
