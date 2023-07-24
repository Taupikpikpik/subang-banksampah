<!-- Footer -->
    <footer class="footer">
        <div class="container">
            <ul class="nav nav-pills nav-justified">
                <li class="nav-item">
                    <a class="nav-link" href="{{url('sell')}}">
                        <span>
                            <i class="nav-icon bi bi-cart"></i>
                            <span class="nav-text">Jual</span>
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('nasabah/jadwal')}}">
                        <span>
                            <i class="nav-icon bi bi-calendar-date"></i>
                            <span class="nav-text">Jadwal</span>
                        </span>
                    </a>
                </li>
                <li class="nav-item center-item">
                    <a class="nav-link active" href="{{url('/')}}">
                        <span>
                            <i class="nav-icon bi bi-house"></i>
                            {{-- <span class="nav-text">Home</span> --}}
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('withdraw')}}">
                        <span>
                            <i class="nav-icon bi bi-cash-stack"></i>
                            <span class="nav-text">Saldo
                            </span>
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('logout.user')}}">
                        <span>
                            <i class="nav-icon bi bi-box-arrow-in-left"></i>
                            <span class="nav-text">Keluar</span>
                        </span>
                    </a>
                </li>
            </ul>
        </div>
    </footer>
    <!-- Footer ends-->