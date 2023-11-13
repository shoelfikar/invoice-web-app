@extends('layouts.index')

@push('header')
    <!-- Template CSS -->
    {{-- <link rel="stylesheet" href="{{url('vendor/assets/css/rtl.css')}}"> --}}
    {{-- <link rel="stylesheet" href="{{url('vendor/assets/css/user.custom.css')}}"> --}}

@endpush


@section('content')

    <section class="section">
        <div class="section-header">
        <h1>Users List</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{route('dashboard')}}">Dashboard</a></div>
            <div class="breadcrumb-item">Users</div>
        </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 mb-3">
                    <a href="#" class="btn btn-icon icon-left btn-primary create-user" data-title="Create User"><i class="far fa-edit"></i> Add User</a>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                            <thead>
                                <tr>
                                <th>
                                    #
                                </th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Date Created</th>
                                <th>Status</th>
                                <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $count = 0
                                @endphp
                                @foreach ($users as $user)
                                @php
                                    $count++
                                @endphp
                                    <tr>
                                        <td class="align-middle">
                                            {{$count}}
                                        </td>
                                        <td class="align-middle">{{$user->name}}</td>
                                        <td class="align-middle">
                                            {{$user->email}}
                                        </td>
                                        <td>
                                            {{$user->role}}
                                        </td>
                                        <td class="align-middle">{{$user->created_at}}</td>
                                        <td class="align-middle"><div class="badge {{$user->status == 1 ? 'badge-success':'badge-danger'}}">{{$user->status == 1 ? 'Active':'Inactive'}}</div></td>
                                        <td class="align-middle"><a href="#" class="btn btn-secondary create-user" data-title="Update User">Detail</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                </div>
            </div>

            <form class="modal-part" id="modal-login-part">
                <p>This form for create or update user</p>
                <div class="form-group">
                  <label>Name</label>
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Name" name="name">
                  </div>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Email" name="email">
                    </div>
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <div class="input-group">
                    <input type="password" class="form-control" placeholder="Password" name="password">
                  </div>
                </div>
                <div class="form-group">
                    <label>Retype Password</label>
                    <div class="input-group">
                      <input type="password" class="form-control" placeholder="Password" name="retype_password">
                    </div>
                </div>
                <div class="form-group">
                    <label>Select Role</label>
                    <select class="form-control">
                      <option>Admin</option>
                      <option>Super Admin</option>
                      <option>Guest</option>
                    </select>
                </div>
            </form>

            <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Modal title</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <p>Modal body text goes here.</p>
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('script')

    <script>
        let title = $(".create-user").attr("data-title")
        $(".create-user").fireModal({
            title: title,
            body: $("#modal-login-part"),
            footerClass: 'bg-whitesmoke',
            autoFocus: false,
            onFormSubmit: function(modal, e, form) {
                // Form Data
                let form_data = $(e.target).serialize();
                console.log(form_data)

                // DO AJAX HERE
                let fake_ajax = setTimeout(function() {
                form.stopProgress();
                modal.find('.modal-body').prepend('<div class="alert alert-info">Please check your browser console</div>')

                clearInterval(fake_ajax);
                }, 1500);

                e.preventDefault();
            },
            shown: function(modal, form) {
                console.log(form)
            },
            buttons: [
                {
                    text: 'Submit',
                    submit: true,
                    class: 'btn btn-primary btn-shadow',
                    handler: function(modal) {
                    }
                }
            ]
        });
    </script>
@endpush
