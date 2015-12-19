<div class="question-multiple-selection">

    <div class="question-possible-values-wrapper">
        <div class="question-possible-value">
            {!! Form::label("", "Mayor") !!}
            {!! Form::text("questionValueText", null, ["class" => "form-control", "placeholder" => "Ejemplo: Muy relevante", "required"]) !!}
        </div>
        <div class="question-possible-value">
            {!! Form::label("", "Intermedio") !!}
            {!! Form::text("questionValueText", null, ["class" => "form-control", "placeholder" => "Ejemplo: Relevante", "required"]) !!}
        </div>
        <div class="question-possible-value">
            {!! Form::label("", "Menor") !!}
            {!! Form::text("questionValueText", null, ["class" => "form-control", "placeholder" => "Ejemplo: Poco relevante", "required"]) !!}
        </div>
    </div>

    <div class="subquestion">
        <div class="form-group subquestion-title-wrapper">
            {!! Form::label("subquestion-title", "T&iacute;tulo de la subpregunta") !!}
            <button title="Borrar subpregunta" type="button" class="btn delete-subquestion-button pull-right">
                <i class="fa fa-trash-o"></i>
            </button>
            {!! Form::text("subquestion-title", null, ["class" => "form-control subquestion-title", "required"]) !!}
        </div>

        <div class="form-group option-multiple-selection-subquestion">
            {!! Form::text("option-multiple-selection-content", null, ["class" => "form-control option-multiple-selection-content", "placeholder" => "Opci&oacute;n", "required"]) !!}
            <button title="Borrar opci&oacute;n" type="button" class="delete-option-multiple-selection-button btn btn-md">Eliminar</button>
        </div>

        <div class="add-option-multiple-selection">
            <button type="button" class="add-option-multiple-selection-button btn btn-xs btn-primary">Agregar opci&oacute;n</button>
        </div>
    </div>

    <div class="add-subquestion-multiple-selection">
        <button type="button" class="add-subquestion-multiple-selection-button btn btn-default">
            Agregar subpregunta
            <i class="fa fa-hand-o-down"></i>
        </button>
    </div>

</div>
