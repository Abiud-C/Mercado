@foreach($Pregunta as $pregunta)
<div class="form-group">
    <h6 class="PreguntaVista" id="{{$pregunta->id}}">{{$pregunta->contenido}}</h6>
    <div class="form-row">
    	<i class="fas fa-puzzle-piece RespuestVista"></i><label class="text-secondary" id="{{$pregunta->id}}">{{$pregunta->Contenido}}</label>
    </div>
</div>
@endforeach