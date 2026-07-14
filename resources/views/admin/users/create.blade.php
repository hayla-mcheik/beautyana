@extends('layouts.admin')

@section('title', 'Add User')

@section('content')

<div class="row">

    <div class="col-md-12">


        {{-- Success Message --}}

        @if(session('message'))

            <div class="alert alert-success">

                {{ session('message') }}

            </div>

        @endif


        {{-- Validation Errors --}}

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

                    Add User


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
                    action="{{ url('admin/users') }}"
                    method="POST"
                >

                    @csrf


                    <div class="row">


                        {{-- Name --}}

                        <div class="col-md-6 mb-3">

                            <label>
                                Name
                            </label>


                            <input
                                type="text"
                                name="name"
                                value="{{ old('name') }}"
                                class="form-control"
                                required
                            >


                            @error('name')

                                <small class="text-danger">

                                    {{ $message }}

                                </small>

                            @enderror

                        </div>



                        {{-- Email --}}

                        <div class="col-md-6 mb-3">

                            <label>
                                Email
                            </label>


                            <input
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                class="form-control"
                                required
                            >


                            @error('email')

                                <small class="text-danger">

                                    {{ $message }}

                                </small>

                            @enderror

                        </div>



                        {{-- Password --}}

                        <div class="col-md-6 mb-3">

                            <label>
                                Password
                            </label>


                            <input
                                type="password"
                                name="password"
                                class="form-control"
                                autocomplete="new-password"
                                required
                            >


                            @error('password')

                                <small class="text-danger">

                                    {{ $message }}

                                </small>

                            @enderror

                        </div>



                        {{-- Confirm Password --}}

                        <div class="col-md-6 mb-3">

                            <label>
                                Confirm Password
                            </label>


                            <input
                                type="password"
                                name="password_confirmation"
                                class="form-control"
                                autocomplete="new-password"
                                required
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
                                    {{ old('role_as') === '0' ? 'selected' : '' }}
                                >

                                    User

                                </option>


                                <option
                                    value="1"
                                    {{ old('role_as') === '1' ? 'selected' : '' }}
                                >

                                    Admin

                                </option>

                            </select>


                            @error('role_as')

                                <small class="text-danger">

                                    {{ $message }}

                                </small>

                            @enderror

                        </div>



                        {{-- Save Button --}}

                        <div class="col-md-12 text-end">

                            <button
                                type="submit"
                                class="btn btn-primary"
                            >

                                Save

                            </button>

                        </div>


                    </div>

                </form>


            </div>

        </div>

    </div>

</div>

@endsection