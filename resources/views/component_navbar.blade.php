<nav class="navbar navbar-expand-lg navbar-dark bg-dark rounded">
    <button class="navbar-toggler" type="button" data-toggle="collapse"
        data-target="#navbar" aria-controls="navbar" aria-expanded="false" arialabel="
        Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

 <div class="collapse navbar-collapse" id="navbar">
    <ul class="navbar-nav mr-auto">
        <li @if($current=="home") class="nav-item active" @else class="nav-item" @endif>
            <a class="nav-link" href="/">Home </a>
        </li>
        @if(Session::get('user')->isAdmin)
        <li @if($current=="users") class="nav-item active" @else class="nav-item" @endif>
            <a class="nav-link" href="/users">Usuários</a>
        </li>
        <li @if($current=="employees") class="nav-item active" @else class="nav-item" @endif>
            <a class="nav-link" href="/employees">Funcionários</a>
        </li>
        <li @if($current=="loans") class="nav-item active" @else class="nav-item" @endif>
            <a class="nav-link" href="/loans">Empréstimos</a>
        </li>
        @endif
        <li @if($current=="loans") class="nav-item active" @else class="nav-item" @endif>
            <a class="nav-link" href="/my-loans">Meus empréstimos</a>
        </li>
        <li @if($current=="books") class="nav-item active" @else class="nav-item" @endif>
            <a class="nav-link" href="/books">Livros</a>
        </li>
        <li  class="nav-item" >
            <a class="nav-link" href="/logout">Logout</a>
        </li>
    </ul>
 </div>
 </nav>