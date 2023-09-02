<li class="nav-item @if ($active == 'Spp') {
    {{ 'active' }}
} @endif">
    <a class="nav-link" href="{{ url('#') }}">
        <i class="fas fa-fw fa-cute "></i>
        <span class="text-light"> <i class="fas fa-money-check-alt text-light"></i> SPP</span>
    </a>
    <button class="nav-link bg-primary booder border-white border-4" href="{{ url('excel-export') }}">
        <i class="fas fa-fw fa-cute "></i>
        <span class="text-light"> <i class="fas fa-file-excel text-light"></i> Ekspor XLS</span>
    </button>

</li>
