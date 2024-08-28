<!-- Sidebar -->
<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index.html">
            <span class="align-middle">Administrator</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Akun
            </li>

            <li class="sidebar-item active">
                <a class="sidebar-link" href="{{ route('dashboard') }}">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('data') }}">
                    <i class="align-middle" data-feather="box"></i> <span class="align-middle">Master Data</span>
                </a>
            </li>


        </ul>>

    </div>
</nav>

<style>
    /* Efek Kedip */
    @keyframes blink {
        0% { opacity: 1; }
        50% { opacity: 0; }
        100% { opacity: 1; }
    }

    /* Kelas untuk notifikasi dengan efek */
    .notifikasi-urgent {
        color: white; /* Warna teks putih */
        background-color: red; /* Warna latar belakang badge */
        animation: blink 1s infinite; /* Efek kedip */
    }
</style>
<!-- end sidebar -->


