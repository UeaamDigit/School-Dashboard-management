@extends('tablar::page')

@section('title')
    Users
@endsection

@section('content')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        @lang('messages.list')
                    </div>
                    <h2 class="page-title">
                        {{ __('Users ') }}
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-12 col-md-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <div class="dropdown">
                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Language
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="locale/ar">Arabic</a>
                                <a class="dropdown-item" href="locale/en">English</a>
                                <a class="dropdown-item" href="locale/fr">French</a>
                                <a class="dropdown-item" href="locale/es">Spanish</a>
                            </div>
                        </div>
                        <a href="{{ route('utilisateurs.create') }}" class="btn btn-warning d-none d-sm-inline-block">
                            <!-- Download SVG icon from http://tabler-icons.io/i/trash -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <line x1="4" y1="7" x2="20" y2="7" />
                                <line x1="10" y1="11" x2="10" y2="17" />
                                <line x1="14" y1="11" x2="14" y2="17" />
                                <path
                                    d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12m-9 0v-3a1 1 0 0 1 1 -1h6a1 1 0 0 1 1 1v3" />
                                <line x1="3" y1="7" x2="21" y2="7" />
                            </svg>
                            Delete Selection
                        </a>
                        <a class="btn btn-success d-none d-sm-inline-block" href="{{ route('users.export') }}">Export
                            Excel</a>


                        <a href="{{ route('export_user_pdf') }}" class="btn btn-danger d-none d-sm-inline-block">
                            Export PDF
                        </a>

                        <a href="{{ route('utilisateurs.create') }}" class="btn btn-primary d-none d-sm-inline-block">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <line x1="12" y1="5" x2="12" y2="19" />
                                <line x1="5" y1="12" x2="19" y2="12" />
                            </svg>
                            Create User
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            @if (config('tablar', 'display_alert'))
                @include('tablar::common.alert')
            @endif
            <div class="row row-deck row-cards">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Users</h3>
                        </div>
                        <div class="card-body border-bottom py-3">
                            <div class="d-flex">
                                <div class="text-muted">
                                    <form action="{{ route('utilisateurs.index') }}" method="GET"
                                        class="form-inline d-flex ">
                                        Show :
                                        <input type="text" id="entries-count" name="entries"
                                            class="form-control form-control-sm mx-2" value="{{ request('entries', 10) }}"
                                            size="3" aria-label="Entries count">
                                        <button type="submit" class="btn btn-sm btn-warning ">Apply</button>
                                    </form>
                                </div>
                                <div class="ms-auto text-muted ">
                                    <form action="{{ route('utilisateurs.index') }}" method="GET"
                                        class="form-inline d-flex">
                                        <input type="text" id="search" name="search"
                                            class="form-control form-control-sm p-2 border border-3" style="width: 350px;"
                                            value="{{ request('search') }}" aria-label="Search invoice">
                                        <button type="submit" class="btn btn-primary ml-2">Search</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                        <div class="table-responsive min-vh-100">
                            <table class="table card-table table-vcenter text-nowrap datatable">
                                <thead>
                                    <tr>
                                        <th class="w-1"></th>
                                        <th class="w-1">Id</th>
                                        <th>Nom</th>
                                        <th>Email</th>
                                        <th>Adresse</th>
                                        <th>Phone</th>
                                        <th>Sexe</th>
                                        <th>Country</th>
                                        <th class="w-1"> </th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse ($utilisateurs as $utilisateur)
                                        <tr>
                                            <td><input class="form-check-input m-0 align-middle" type="checkbox"
                                                    aria-label="Select utilisateur"></td>

                                            <td>{{ $utilisateur->id }}</td>
                                            <td>{{ $utilisateur->nom }}</td>
                                            <td>{{ $utilisateur->email }}</td>
                                            <td>{{ $utilisateur->adresse }}</td>
                                            <td>{{ $utilisateur->phone }}</td>
                                            <td>{{ $utilisateur->sexe }}</td>
                                            <td>{{ $utilisateur->country }}</td>
                                            <td>
                                                <div class="btn-list flex-nowrap">
                                                    <div class="dropdown">
                                                        <button class="btn dropdown-toggle align-text-top"
                                                            data-bs-toggle="dropdown">
                                                            Actions
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item"
                                                                href="{{ route('utilisateurs.show', $utilisateur->id) }}">
                                                                View
                                                            </a>
                                                            <a class="dropdown-item"
                                                                href="{{ route('utilisateurs.edit', $utilisateur->id) }}">
                                                                Edit
                                                            </a>
                                                            <form
                                                                action="{{ route('utilisateurs.destroy', $utilisateur->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    onclick="if(!confirm('Do you Want to Proceed?')){return false;}"
                                                                    class="dropdown-item text-red"><i
                                                                        class="fa fa-fw fa-trash"></i>
                                                                    Delete
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <td>No Data Found</td>
                                    @endforelse
                                </tbody>

                            </table>
                            <div class="card-footer d-flex align-items-center">
                                <form action="{{ route('users.import') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="file" name="file" class="form-control">
                                    <br>
                                    <button class="btn btn-success">Import User Data</button>
                                </form>
                                <ul class="pagination m-0 ms-auto">
                                    <li class="page-item ">
                                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                                            <!-- Download SVG icon from http://tabler-icons.io/i/chevron-left -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <polyline points="15 6 9 12 15 18" />
                                            </svg>
                                            prev
                                        </a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item active"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                                    <li class="page-item"><a class="page-link" href="#">5</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">
                                            next <!-- Download SVG icon from http://tabler-icons.io/i/chevron-right -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <polyline points="9 6 15 12 9 18" />
                                            </svg>
                                        </a>
                                    </li>
                                </ul>

                                {{--
                                 Built In Paginator Component
                                 {!! $modelName->links('tablar::pagination') !!}
                                 --}}

                            </div>
                        </div>
                        <div class="card-footer d-flex align-items-center">
                            {!! $utilisateurs->links('tablar::pagination') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
</script>
