@extends('layout.main')
@section('title') Contacto :: @parent @endsection @section('content')

    <div class="row">

        <div class="page-intro-wrapper">
            <h4>CUENTEN CON NOSOTROS</h4>
            <h3>CONTACTO</h3>
            <p>Explicacion breve: Jwqvfliywesafcvsavx ch ujasx yeqaisfc saxzvieasd cxuvascixuz ujasjxz ceiqwfsc uevwdc x veidas xzj idavsx ievsciv dsuxvic uevsiced xjevc vdc eidsafobqes ageifas c dosvqke ivoiwevdsxjqwisocvjhw edj. Mbfiew iebf egd gi as iuwisac isuadvc usaic uvsdiuv udi buds bwisdbv sdgj irfdgibs.</p>
        </div>

        <form class="stylish-form">
            <div class="form-group">
                <label class="required" for="fullName-input">Nombre y apellido</label>
                <input name="fullName" type="text" class="form-control" id="fullName-input" required>
            </div>
            <div class="form-group">
                <label class="required" for="email-input">E-mail</label>
                <input name="email" type="email" class="form-control" id="email-input" required>
            </div>
            <div class="form-group">
                <label class="required" for="subject-input">Asunto</label>
                <input name="subject" type="text" class="form-control" id="subject-input" required>
            </div>
            <div class="form-group">
                <label class="required" for="message-input">Mensaje</label>
                <textarea name="message" class="form-control" rows="10" id="message-input" required></textarea>
            </div>
            <button type="submit" class="btn btn-error">Enviar</button>
        </form>
    </div>

@endsection
