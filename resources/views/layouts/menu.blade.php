<li class="nav-item">
    <a href="{{ route('cTipos.index') }}"
       class="nav-link {{ Request::is('cTipos*') ? 'active' : '' }}">
        <p>C Tipos</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('cEstados.index') }}"
       class="nav-link {{ Request::is('cEstados*') ? 'active' : '' }}">
        <p>C Estados</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('cClinicas.index') }}"
       class="nav-link {{ Request::is('cClinicas*') ? 'active' : '' }}">
        <p>C Clinicas</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('tUsuarios.index') }}"
       class="nav-link {{ Request::is('tUsuarios*') ? 'active' : '' }}">
        <p>T Usuarios</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('cProfesionals.index') }}"
       class="nav-link {{ Request::is('cProfesionals*') ? 'active' : '' }}">
        <p>C Profesionals</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('cEstudiantes.index') }}"
       class="nav-link {{ Request::is('cEstudiantes*') ? 'active' : '' }}">
        <p>C Estudiantes</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('tCasos.index') }}"
       class="nav-link {{ Request::is('tCasos*') ? 'active' : '' }}">
        <p>T Casos</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('cBoletins.index') }}"
       class="nav-link {{ Request::is('cBoletins*') ? 'active' : '' }}">
        <p>C Boletins</p>
    </a>
</li>


