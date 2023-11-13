@extends('layouts.index')


@section('content')
    <section class="section">
        <div class="section-header">
        <h1>Product List</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{route('dashboard')}}">Dashboard</a></div>
            <div class="breadcrumb-item">Product</div>
        </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 mb-3">
                    <a href="#" class="btn btn-icon icon-left btn-primary create-user" data-title="Create User"><i class="far fa-edit"></i> Create Product</a>
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
                                <tr>
                                    <td>
                                      <div class="sort-handler">
                                        <i class="fas fa-th"></i>
                                      </div>
                                    </td>
                                    <td>Create a mobile app</td>
                                    <td class="align-middle">
                                      <div class="progress" data-height="4" data-toggle="tooltip" title="100%">
                                        <div class="progress-bar bg-success" data-width="100"></div>
                                      </div>
                                    </td>
                                    <td>
                                      <img alt="image" src="assets/img/avatar/avatar-5.png" class="rounded-circle" width="35" data-toggle="tooltip" title="Wildan Ahdian">
                                    </td>
                                    <td>2018-01-20</td>
                                    <td><div class="badge badge-success">Completed</div></td>
                                    <td><a href="#" class="btn btn-secondary">Detail</a></td>
                                </tr>
                            </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
