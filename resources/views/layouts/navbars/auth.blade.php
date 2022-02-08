<div class="sidebar" data-color="white" data-active-color="danger">
    <div class="logo">
        <a href="" class="simple-text logo-mini">
            <div class="logo-image-small">
                <img src="{{ asset('paper') }}/img/logo-small.png">
            </div>
        </a>
        <a href="{{ route('page.index', 'dashboard') }}" class="simple-text logo-normal">
            {{ __('SIMPENKAR') }}
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="{{ $elementActive == 'dashboard' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'dashboard') }}">
                    <i class="nc-icon nc-tile-56"></i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'master' || $elementActive == 'master' ? 'active' : '' }}">
                <a data-toggle="collapse" aria-expanded="true" href="#laravelExamples">
                    <i class="nc-icon nc-settings"></i>
                    <p>
                        {{ __('Master') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="laravelExamples">
                    <ul class="nav">
                        <li class="{{ $elementActive == 'masterkaryawan' ? 'active' : '' }}">
                            <a href="{{ route('pegawai.index') }}">
                                <span class="sidebar-mini-icon">{{ __('MK') }}</span>
                                <span class="sidebar-normal">{{ __(' MASTER KARYAWAN ') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'masterdivisi' ? 'active' : '' }}">
                            <a href="{{ route('divisi.index') }}">
                                <span class="sidebar-mini-icon">{{ __('MD') }}</span>
                                <span class="sidebar-normal">{{ __(' MASTER DIVISI') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'Masterjabatan' ? 'active' : '' }}">
                            <a href="{{ route('jabatan.index') }}">
                                <span class="sidebar-mini-icon">{{ __('MJ') }}</span>
                                <span class="sidebar-normal">{{ __(' MASTER JABATAN') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="{{ $elementActive == 'kategoripenilaian' ? 'active' : '' }}">
                <a href="{{ route('kategori.index') }}">
                    <i class="nc-icon nc-bullet-list-67"></i>
                    <p>{{ __('KATEGORI PENILAIAN') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'aspekpenilaian' ? 'active' : '' }}">
                <a href="{{ route('aspek.index') }}">
                    <i class="nc-icon nc-bullet-list-67"></i>
                    <p>{{ __('ASPEK PENILAIAN') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'kriteriapenilaian' ? 'active' : '' }}">
                <a href="{{ route('kriteria.index') }}">
                    <i class="nc-icon nc-bullet-list-67"></i>
                    <p>{{ __('KRITERIA PENILAIAN') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'laporanpenilaian' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'laporanpenilaian') }}">
                    <i class="nc-icon nc-single-copy-04"></i>
                    <p>{{ __('LAPORAN PENILAIAN') }}</p>
                </a>
            </li>
        </ul>
    </div>
</div>