<div class="navbar">
    <input type="checkbox" name="" value="" id="check">
    <label for="check">
        <i class="fa-solid fa-bars kanan" id="dehaze"></i>
        <i class="fa-solid fa-xmark kanan" id="close"></i>
    </label>
    <div class="logo kiri">
        <a href="/">
            <img src="img/logo.png" alt="">
        </a>
    </div>

    <div class="nav kanan">

        <ul>
            <li>
                <div class="a">
                    <a class="{{ Request::is('/*') ? 'active' : '' }}" href="/">Home</a>
                </div>
            </li>
            <li>
                <div class="a ">
                    <a href="/profile-home" class="{{ Request::is('profile*') ? 'active' : '' }}">Profile</a>
                </div>
            </li>
            <li>
                <div class="a ">
                    <a href="/market" class="{{ Request::is('market*') ? 'active' : '' }}">Showcase</a>
                </div>
            </li>
            <li>
                <div class="a">
                    <a href="/artikel" class="{{ Request::is('artikel*') ? 'active' : '' }}">Artikel</a>
                </div>
            </li>
            <li>
                <div class="a">
                    <a href="/event" class="{{ Request::is('event*') ? 'active' : '' }}">Event</a>
                </div>

            </li>
            <li>
                <div class="a">
                    <a href="/contact" class="{{ Request::is('contact*') ? 'active' : '' }}">Contact</a>
                </div>
            </li>
            @guest

                <li>
                    <div class="a">
                        <a href="/login" class="{{ Request::is('login*') ? 'active' : '' }}">Login</a>
                    </div>
                </li>
            @else
                <li>
                    <div class="dropdown">
                        <button class="dropbtn">
                            @if (Auth::user()->image)
                                <img src="{{ asset('storage/user/' . Auth::user()->image) }}" style="width: 25px; height: 25px;"
                                    alt="">
                            @else
                                <img src="{{ asset('img/images.png') }}" style="height: 25px; object-fit: cover;padding:3px"
                                    class="card-img-top" alt="...">
                            @endif
                        </button>
                        <div class="dropdown-content">
                            <div class="dropdown-content-isi">
                                <a href="/user-profile"
                                    class="{{ Request::is('user-profile*') ? 'active' : '' }}">Profile</a>
                            </div>
                            <div class="dropdown-content-isi">
                                <a href="/user-produk">Produk Anda
                                </a>
                            </div>
                            <div class="dropdown-content-isi">

                                <form action="/logout" method="POST">
                                    @csrf
                                    <button>Keluar <i class="fa-solid fa-right-from-bracket"></i></button>

                                </form>
                            </div>
                        </div>
                    </div>

                </li>

            @endguest

        </ul>
    </div>
</div>
