@extends('layouts.app')

@section('component')
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Login</h3>
                                </div>
                                <div class="card-body">
                                    @if (session('error'))
                                        <div class="alert alert-danger d-flex align-items-center alert-dismissible fade show"
                                            role="alert">
                                            <i class="bi bi-exclamation-circle me-3"></i>
                                            <div class="fw-medium">
                                                {{ session('error') }}
                                            </div>
                                        </div>
                                    @endif
                                    <form action="{{ route('login.proses') }}" method="POST">
                                        @csrf
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="email" name="email" type="email"
                                                placeholder="Masukkan email anda" />
                                            <label for="email">Email address</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="password" name="password" type="password"
                                                placeholder="Password" />
                                            <label for="password">Password</label>
                                        </div>
                                        <button class="btn btn-primary mt-2 col-12">Login</button>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small">Powered by HP Autopilot</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Inventory - App 2024</div>
                        <div>
                            Made with <i class="bi bi-heart-fill text-danger"></i> by <a
                                href="https://www.linkedin.com/in/rizalsofiana/" target="_blank">Rizal</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
@endsection
