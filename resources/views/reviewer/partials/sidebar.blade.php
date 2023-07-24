<div class="sidebar" id="sidebar">
        <div class="sidebar-inner slimscroll">
          <div id="sidebar-menu" class="sidebar-menu">
            <ul>
              <li class="{{request()->segment(1) == 'reviewer' && request()->segment(2) == ''? 'active' : ''}}">
                <a href="{{url('reviewer')}}">
                  <i class="feather-home"></i>
                  <span class="shape1"></span>
                  <span class="shape2"></span>
                  <span>Beranda</span>
                </a>
              </li>
              <li class="submenu">
                <a href="#">
                  <i class="fa fa-file"></i>
                  <span> Laporan</span>
                  <span class="menu-arrow"></span>
                </a>
                <ul style="display: none;">
                  <li class="{{request()->segment(1) == 'reviewer' && request()->segment(2) == 'laporan-penjualan'? 'active' : ''}}">
                    <a href="{{url('reviewer/laporan-penjualan')}}">Laporan Penjualan</a>
                  </li>
                  <li class="{{request()->segment(1) == 'reviewer' && request()->segment(2) == 'laporan-pembelian'? 'active' : ''}}">
                    <a href="{{url('reviewer/laporan-pembelian')}}">Laporan Pembelian</a>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </div>