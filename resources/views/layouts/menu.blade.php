<li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
    <a class="nav-link" href="/">
        <i class="fas fa-building"></i><span>Dashboard</span>
    </a>
    <a class="nav-link" href="/docentes">
        <i class="fas fa-users"></i><span>Docentes</span>
    </a>
    <a class="nav-link" href="/estudiantes">
        <i class="fas fa-users"></i><span>Estudiantes</span>
    </a>
    <a class="nav-link" href="/carreras">
        <i class="fas fa-users"></i><span>Carreras</span>
    </a>
    <a class="nav-link" href="/materias">
        <i class="fas fa-users"></i><span>Materias</span>
    </a>
    <a class="nav-link" href="/MateriaDocente">
        <i class="fas fa-users"></i><span>Materias docentes</span>
    </a>
    <a class="nav-link" href="/MateriaEstudiante">
        <i class="fas fa-users"></i><span>Materias estudiantes</span>
    </a>
    <a class="nav-link" href="/aulas">
        <i class="fas fa-users"></i><span>Aulas</span>
    </a>
    <a class="nav-link" href="/roles">
        <i class="fas fa-users"></i><span>Roles</span>
    </a>
    <a class="nav-link" href="/horarios">
        <i class="fas fa-calendar"></i><span>Horarios</span>
    </a>
    <a class="nav-link" href="{{ route('horarios.create') }}">
        <i class="fas fa-clock"></i><span>Crear Horarios</span>
    </a>
    
    <a class="nav-link" href="/calificacion">
        <i class="fas fa-calendar"></i><span>Calificaciones</span>
    </a>
  
</li>
