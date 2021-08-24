<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky p-3 d-flex flex-wrap h-100">
        <div>
            <a href="/" class="fs-4 link-dark text-decoration-none"><img
                    src="{{ asset('/assets/icon/open-book.png') }}" width="35"
                    alt="" />PerpustakaanKu</a>
            <hr>
            <ul class="nav nav-pills flex-column mx-auto mb-auto mt-4">
                <li class="nav-item">
                    <a class="nav-link {{ ($title === 'Dashboard') ? 'active' : '' }}"
                        href="/">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-home" aria-hidden="true">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ ($title === 'Peminjaman' || $title === 'Pencarian Peminjaman' || $title === 'Edit Peminjaman' || $title === 'Pinjam Buku') ? 'active' : '' }}"
                        href="/borrow">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-file" aria-hidden="true">
                            <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path>
                            <polyline points="13 2 13 9 20 9"></polyline>
                        </svg>
                        Peminjaman
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ ($title === 'Buku' || $title==='Kategori Buku' || $title === 'Tambah Kategori' || $title === 'Tambah Buku' || $title==='Pencarian Buku' || $title==='Edit Buku' || $title==='Pengarang Buku' || $title==='Edit Pengarang' || $title==='Tambah Pengarang' || $title === 'Penerbit Buku' ||$title === 'Edit Penerbit' || $title === 'Tambah Penerbit') ? 'active' : '' }}"
                        href="/book">
                        <svg height="24" viewBox="0 0 480 480" width="24" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="m240 0h-104c-4.417969 0-8 3.582031-8 8v56h-120c-4.417969 0-8 3.582031-8 8v400c0 4.417969 3.582031 8 8 8h232c4.417969 0 8-3.582031 8-8v-464c0-4.417969-3.582031-8-8-8zm-8 416h-88v-16h88zm-216-296h112v240h-112zm216-32h-88v-24h88zm-216 288h112v24h-112zm128 8v-280h88v280zm88-368v32h-88v-32zm-104 64v24h-112v-24zm-112 336h112v48h-112zm128 48v-32h88v32zm0 0" />
                            <path
                                d="m479.742188 437.984375-96-368c-.535157-2.0625-1.871094-3.824219-3.714844-4.898437-1.839844-1.070313-4.03125-1.363282-6.089844-.8125l-120 32c-4.25 1.132812-6.789062 5.484374-5.679688 9.742187l96 368c.535157 2.0625 1.875 3.824219 3.71875 4.894531 1.839844 1.066406 4.03125 1.355469 6.085938.800782l120-32c4.242188-1.132813 6.777344-5.476563 5.679688-9.726563zm-201.246094-279.441406 104.542968-27.871094 3.761719 14.398437-104.535156 27.914063zm112.34375 2.050781 46.398437 177.980469-104.503906 27.882812-46.398437-177.992187zm50.472656 193.46875 8.191406 31.394531-104.542968 27.871094-8.160157-31.382813zm-71.023438-272.261719 8.710938 33.398438-104.542969 27.863281-8.703125-33.382812zm-12.578124 380.398438-8.710938-33.398438 104.542969-27.878906 8.703125 33.382813zm0 0" />
                            <path
                                d="m104 144h-64c-4.417969 0-8 3.582031-8 8v64c0 4.417969 3.582031 8 8 8h64c4.417969 0 8-3.582031 8-8v-64c0-4.417969-3.582031-8-8-8zm-8 64h-48v-48h48zm0 0" />
                        </svg>
                        Daftar Buku
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ ($title === 'Keanggotaan' || $title === 'Pencarian Anggota' || $title === 'Tambah Anggota' || $title === 'Edit Data Anggota') ? 'active' : '' }}"
                        href="/members">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-users" aria-hidden="true">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        </svg>
                        Keanggotaan
                    </a>
                </li>
            </ul>
        </div>
        <div class="flex-grow-1"></div>
        <div class="dropdown d-flex align-items-end">
            <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle"
                id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="{{ asset('/assets/icon/user-circle-solid.svg') }}" alt="" width="32"
                    height="32" class="rounded-circle me-2" />
                <strong>{{ Auth::user()->name }}</strong>
            </a>
            <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
                <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
            </ul>
        </div>
    </div>
</nav>
