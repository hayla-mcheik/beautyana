@extends('layouts.admin')

@section('title', 'Edit User')

@section('content')

<div class="row">

    <div class="col-md-12">


        @if(session('message'))

            <div class="alert alert-success">

                {{ session('message') }}

            </div>

        @endif


        @if($errors->any())

            <div class="alert alert-warning">

                @foreach($errors->all() as $error)

                    <div>
                        {{ $error }}
                    </div>

                @endforeach

            </div>

        @endif


        <div class="card">


            <div class="card-header">

                <h4>

                    Edit User


                    <a
                        href="{{ url('admin/users') }}"
                        class="btn btn-danger btn-sm float-end"
                    >

                        Back

                    </a>

                </h4>

            </div>


            <div class="card-body">


                <form
                    action="{{ url('admin/users/'.$user->id) }}"
                    method="POST"
                >

                    @csrf

                    @method('PUT')


                    <div class="row">


                        {{-- Name --}}

                        <div class="col-md-6 mb-3">

                            <label>
                                Name
                            </label>


                            <input
                                type="text"
                                name="name"
                                value="{{ old('name', $user->name) }}"
                                class="form-control"
                                required
                            >

                        </div>



                        {{-- Email --}}

                        <div class="col-md-6 mb-3">

                            <label>
                                Email
                            </label>


                            <input
                                type="email"
                                name="email"
                                value="{{ old('email', $user->email) }}"
                                class="form-control"
                                required
                            >

                        </div>



                        {{-- New Password --}}

                        <div class="col-md-6 mb-3">

                            <label>
                                New Password
                            </label>


                            <input
                                type="password"
                                name="password"
                                class="form-control"
                                autocomplete="new-password"
                            >


                            <small class="text-muted">

                                Leave empty to keep the current password.

                            </small>

                        </div>



                        {{-- Confirm New Password --}}

                        <div class="col-md-6 mb-3">

                            <label>
                                Confirm New Password
                            </label>


                            <input
                                type="password"
                                name="password_confirmation"
                                class="form-control"
                                autocomplete="new-password"
                            >

                        </div>



                        {{-- Role --}}

                        <div class="col-md-6 mb-3">

                            <label>
                                Select Role
                            </label>


                            <select
                                name="role_as"
                                class="form-control"
                                required
                            >

                                <option value="">
                                    Select Role
                                </option>


                                <option
                                    value="0"
                                    {{ old('role_as', $user->role_as) == 0 ? 'selected' : '' }}
                                >

                                    User

                                </option>


                                <option
                                    value="1"
                                    {{ old('role_as', $user->role_as) == 1 ? 'selected' : '' }}
                                >

                                    Admin

                                </option>

                            </select>

                        </div>



                        <div class="col-md-12 text-end">

                            <button
                                type="submit"
                                class="btn btn-primary"
                            >

                                Update User

                            </button>

                        </div>


                    </div>

                </form>


            </div>

        </div>

    </div>

</div>

@endsection