<footer class="footer bg-light">
    <div
        class="container-fluid d-flex flex-md-row flex-column justify-content-between align-items-md-center gap-1 container-p-x py-3">
        <div>
            <a href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/landing/" target="_blank"
                class="footer-text fw-bolder">Sneat</a> ©
        </div>
        <div style="display:flex" class="footer-logout">
            {{-- <div class="form-check form-control-sm footer-link me-3">
          <input class="form-check-input" type="checkbox" value="" id="customCheck2" checked="">
          <label class="form-check-label" for="customCheck2">
            Show
          </label>
        </div> --}}
            <div class="dropdown dropup footer-link me-3">
                <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    {{ auth()->user()->name ?? '' }}
                </button>
                {{-- <div class="dropdown-menu dropdown-menu-end">
            <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-bitcoin"></i> </a>
          </div> --}}
            </div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-sm btn-outline-danger">
                    <i class="bx bx-log-out-circle"></i> Logout
                </button>
            </form>
        </div>
    </div>

</footer>
