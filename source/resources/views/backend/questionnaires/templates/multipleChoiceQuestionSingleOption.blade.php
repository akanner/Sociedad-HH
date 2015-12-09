<div class="question-multiple-choice">
    <div class="form-group option-multiple-choice normal-option">
        {!! Form::radio("questionValue", "1", false, ["required", "data-changeMyName" => true]) !!} {!! Form::text("questionValueText", null, ["class" => "form-control", "placeholder" => "Opci&oacute;n", "required"]) !!}
        <button title="Borrar respuesta" type="button" class="delete-option-button btn btn-xs btn-danger">Eliminar</button>
    </div>
    <div class="add-option-multiple-choice">
        <button type="button" class="add-option-button btn btn-xs btn-primary">Agregar opci&oacute;n</button> o
        <button type="button" class="add-other-option-button">Agregar "Otra"</button>
    </div>
</div>
