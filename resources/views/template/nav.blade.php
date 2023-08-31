<li class="nav-item @if ($active == 'Spp') {
    {{ 'active' }}
} @endif">
    <a class="nav-link" href="{{ url('#') }}">
        <i class="fas fa-fw fa-cute "></i>
        <span class="text-light"> <i class="fas fa-money-check-alt text-light"></i> SPP</span>
    </a>
    <a class="nav-link" href="{{ url('excel-export') }}">
        <i class="fas fa-fw fa-cute "></i>
        <span class="text-light"> <i class="fas fa-file-excel text-light"></i> Cetak</span>
    </a>

</li>
