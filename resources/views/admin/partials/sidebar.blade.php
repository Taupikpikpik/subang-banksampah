<div class="sidebar" id="sidebar">
        <div class="sidebar-inner slimscroll">
          <div id="sidebar-menu" class="sidebar-menu">
            <ul>
              <li class="{{request()->segment(1) == 'admin' && request()->segment(2) == ''? 'active' : ''}}">
                <a href="{{url('admin')}}">
                  <i class="feather-home"></i>
                  <span class="shape1"></span>
                  <span class="shape2"></span>
                  <span>Beranda</span>
                </a>
              </li>
              <li class="submenu">
                <a href="#">
                  <i class="fa fa-cog"></i>
                  <span> Data Bank Sampah</span>
                  <span class="menu-arrow"></span>
                </a>
                <ul style="display: none;">
                  <li class="{{request()->segment(1) == 'admin' && request()->segment(2) == 'kategori-sampah'? 'active' : ''}}">
                    <a href="{{url('admin/kategori-sampah')}}">Kategori Sampah</a>
                  </li>
                  <li class="{{request()->segment(1) == 'admin' && request()->segment(2) == 'bank-sampah'? 'active' : ''}}">
                    <a href="{{url('admin/bank-sampah')}}">Data Sampah</a>
                  </li>
                  <li class="{{request()->segment(1) == 'admin' && request()->segment(2) == 'user'? 'active' : ''}}">
                    <a href="{{url('admin/user')}}">Data Pengguna</a>
                  </li>
                </ul>
              </li>
              <li class="submenu">
                <a href="#">
                  <i class="fa fa-cart-plus"></i>
                  <span> Data Transaksi</span>
                  <span class="menu-arrow"></span>
                </a>
                <ul style="display: none;">
                  <li class="{{request()->segment(1) == 'admin' && request()->segment(2) == 'penjualan-sampah'? 'active' : ''}}">
                    <a href="{{url('admin/penjualan-sampah')}}">Transaksi Penjualan</a>
                  </li>
                  <li class="{{request()->segment(1) == 'admin' && request()->segment(2) == 'pembelian-sampah'? 'active' : ''}}">
                    <a href="{{url('admin/pembelian-sampah')}}">Transaksi Pembelian</a>
                  </li>
                  <li class="{{request()->segment(1) == 'admin' && request()->segment(2) == 'transaksi-sampah'? 'active' : ''}}">
                    <a href="{{url('admin/transaksi-sampah')}}">Semua Transaksi</a>
                  </li>
                  <li class="{{request()->segment(1) == 'admin' && request()->segment(2) == 'jadwal-pengambilan'? 'active' : ''}}">
                    <a href="{{url('admin/jadwal-pengambilan')}}">Jadwal Pengambilan</a>
                  </li>
                  <li class="{{request()->segment(1) == 'admin' && request()->segment(2) == 'penarikan-saldo'? 'active' : ''}}">
                    <a href="{{url('admin/penarikan-saldo')}}">Penarikan Saldo</a>
                  </li>
                </ul>
              </li>
              <li class="submenu">
                <a href="#">
                  <i class="fa fa-file"></i>
                  <span> Laporan</span>
                  <span class="menu-arrow"></span>
                </a>
                <ul style="display: none;">
                  <li class="{{request()->segment(1) == 'admin' && request()->segment(2) == 'laporan-penjualan'? 'active' : ''}}">
                    <a href="{{url('admin/laporan-penjualan')}}">Laporan Penjualan</a>
                  </li>
                  <li class="{{request()->segment(1) == 'admin' && request()->segment(2) == 'laporan-pembelian'? 'active' : ''}}">
                    <a href="{{url('admin/laporan-pembelian')}}">Laporan Pembelian</a>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </div>