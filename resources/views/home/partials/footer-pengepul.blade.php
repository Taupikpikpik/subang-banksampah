<!-- Footer -->
    <footer class="footer">
        <div class="container">
            <ul class="nav nav-pills nav-justified">
                
                <li class="nav-item">
                    <a class="nav-link" href="{{url('pengepul/pembelian')}}">
                        <span>
                            <i class="nav-icon bi bi-bag"></i>
                            <span class="nav-text">Pembelian</span>
                        </span>
                    </a>
                </li>
                <li class="nav-item center-item">
                    <a class="nav-link active" href="{{url('/pengepul')}}">
                        <span>
                            <i class="nav-icon bi bi-house"></i>
                            {{-- <span class="nav-text">Home</span> --}}
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