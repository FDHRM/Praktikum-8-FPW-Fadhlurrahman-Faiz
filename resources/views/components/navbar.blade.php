<nav>
    <ul>
        <li><a href="/">Awal</a></li>
        <a href="/home"><li>Home</li></a>
        <a href="/buku"><li>Buku</li></a>
        <a href="/pengelola"><li>Pengelola</li></a>
        <a href="/tentang"><li>Tentang</li></a>
        <form action="{{ route('logout') }}" method="post">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </ul>
</nav>  