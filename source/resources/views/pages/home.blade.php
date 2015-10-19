@extends('layout.main')
@section('title') Home :: @parent @endsection

@section('header')
    <header class="home-header">
        <div class="content-wrapper">
            <div class="gradient-background">
                <div class="left-gradient-background"></div>
                <div class="logo-container">
                    <img src="{{asset('img/logo/logo-home.png')}}" alt="Logo sociedad hematologos y hemoterapeutas">
                </div>
                <div class="right-gradient-background"></div>
            </div>
        </div>
    </header>
@endsection

@section('content')

    <!-- Intro -->
    <div class="row text-content">
        <div class="columns-wrapper">
            <div class="col-md-6">
               <div class="header-and-paragraph">
                    <h3>MISI&Oacute;N</h3>
                    <p>La Sociedad de Hematología y Hemoterapia de La Plata es una asociación sin fines de lucro que reúne de forma voluntaria a profesionales de la hematología y hemoterapia de la localidad platense y sus alrededores.</p>
                </div>
                <div class="header-and-paragraph">
                    <h3>VISI&Oacute;N</h3>
                    <p>Busca ser la entidad hematológica de referencia local, procurando ofrecer un lugar de encuentro para los colegas donde se atienda a sus demandas e intereses, y se unan los esfuerzos de la especialidad, en pos de llevar adelante la excelencia en el ejercicio profesional para con la comunidad. </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="header-and-paragraph">
                    <h3>OBJETIVO</h3>
                    <p>Su objetivo es obrar por la defensa, el respeto y el desarrollo de la especialidad, intentando junto con ello, mejorar la calidad de la atención hematológica en la comunidad platense y zonas aledañas.</p>
                    <p>Por tal motivo, la entidad trabaja desde la actividad científica, al fomentar la investigación sobre temas inherentes a las dos especialidades. Mediante la participación y comunicación entre sus miembros, pretende conseguir un progreso en la etiopatogenia, prevención, diagnóstico y tratamiento de las Enfermedades Hemáticas; incentivando además, la formación académica, y la práctica médica.</p>
                    <p>Asimismo, apunta a lo comunitario, propiciando respuestas y calidad en la atención para el bienestar de la población.</p>
                    <p>Y finalmente, promueve la lucha gremial por la mejora de las condiciones laborales y los honorarios de los hematólogos platenses.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Valores -->
    <div class="icon-text-content">
        <h3 class="title-with-underscore">NUESTROS VALORES</h3>

        <div class="row row-columns-wrapper">
            <div class="col-md-6">
                <div class="icon-title-text">
                    <div class="icon-wrapper">
                        <img src="{{asset('img/home/etica.png')}}" alt="Icono etica">
                    </div>
                    <div class="text-wrapper">
                        <h5>&Eacute;TICA, TRANSPARENCIA Y HONESTIDAD</h5>
                        <p>Trabajamos para el bien común no sólo de los integrantes de la Sociedad de Hematología y Hemoterapia de la ciudad de la Plata, sino de la sociedad en general.</p>
                        <p>Apuntamos a construir y consolidar vínculos genuinos con los asociados, las administraciones públicas, la industria farmacéutica, las asociaciones de pacientes y la comunidad.</p>
                   </div>
                </div>
            </div>

            <div class="clearfix visible-xs-block visible-sm-block mobile-home-margin"></div>

            <div class="col-md-6">
                <div class="icon-title-text">
                    <div class="icon-wrapper">
                        <img src="{{asset('img/home/compromiso.png')}}" alt="Icono compromiso">
                    </div>
                    <div class="text-wrapper">
                        <h5>COMPROMISO Y COOPERACIÓN</h5>
                        <p>Pretendemos servir de ayuda a pacientes y a la población que quiera obtener información sobre enfermedades o trastornos que afectan a la sangre.</p>
                        <p>Aspiramos  compartir conocimientos, capacidades, sugerencias y resultados de investigaciones,  e impulsamos la iniciativa de nuevos proyectos.</p>
                   </div>
                </div>
            </div>
        </div>

        <div class="row row-columns-wrapper">
            <div class="col-md-6">
                <div class="icon-title-text">
                    <div class="icon-wrapper">
                        <img src="{{asset('img/home/integracion.png')}}" alt="Icono integracion">
                    </div>
                    <div class="text-wrapper">
                        <h5>INTEGRACI&Oacute;N</h5>
                        <p>Procuramos la unión con cada uno de los miembros profesionales y con la comunidad entera.</p>
                    </div>
                </div>
            </div>

            <div class="clearfix visible-xs-block visible-sm-block mobile-home-margin"></div>

            <div class="col-md-6">
                <div class="icon-title-text">
                    <div class="icon-wrapper">
                        <img src="{{asset('img/home/independencia.png')}}" alt="Icono independencia">
                    </div>
                    <div class="text-wrapper">
                        <h5>INDEPENDENCIA</h5>
                        <p>Bregamos por la defensa de los intereses de la Sociedad de Hematología y Hemoterapia de la ciudad de La Plata respecto de otras entidades públicas y privadas, desde un respeto mutuo.</p>
                   </div>
                </div>
            </div>
        </div>

        <div class="row row-columns-wrapper">
            <div class="col-md-6">
                <div class="icon-title-text">
                    <div class="icon-wrapper">
                        <img src="{{asset('img/home/eficacia.png')}}" alt="Icono eficacia">
                    </div>
                    <div class="text-wrapper">
                        <h5>EFICACIA Y EXCELENCIA</h5>
                        <p>Utilizamos todos los recursos a nuestro alcance para obtener los objetivos propuestos. Actuamos siempre en un entorno de mejora continua.</p>
                   </div>
                </div>
            </div>

            <div class="clearfix visible-xs-block visible-sm-block mobile-home-margin"></div>

            <div class="col-md-6">
                <div class="icon-title-text">
                    <div class="icon-wrapper">
                        <img src="{{asset('img/home/creatividad.png')}}" alt="Icono creatividad">
                    </div>
                    <div class="text-wrapper">
                        <h5>CREATIVIDAD E INNOVACI&Oacute;N</h5>
                        <p>Desarrollamos actividades para generar nuevas soluciones o mejorar las existentes.</p>
                   </div>
                </div>
            </div>
        </div>

    </div>
    <!-- Valores -->

@endsection
