@extends('admin.layouts.app')


@section('styles')

    <style>

        .lighter{

            color: grey;

        }

    </style>

    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{asset('admin/plugins/iCheck/all.css')}}">


@endsection

@section('content')

    <section class="content">

        <div class="row">
            <div class="col-12">

                <div class="card ">
                    <div class="card-header">
                        <h3 class="card-title"><b>Edit Role - </b> <i>{{$role->name}}</i></h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" method="post" action="{{route('role.update', $role->id)}}">
                        {{csrf_field()}}
                        {{method_field('PATCH')}}
                        <div class="card-body">
                            <div class="col-lg-6">

                                <div class="form-group">
                                    <label for="name"> Role Name</label>
                                    <input type="text" value="{{$role->name}}"  class="form-control" name="name" id="name" placeholder="Enter  tag name">
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label for="name">Post Permissions</label>
                                        @foreach($permissions as $permission)
                                            @if($permission->for == 'blog')
                                                <div class="checkbox">
                                                    <label for=""><input class="flat-red" type="checkbox" name="permissions[]" value="{{$permission->id}}"

                                                        @foreach($role->permissions as $rolPer)

                                                            @if($rolPer->id == $permission->id)
                                                                {{'checked'}}
                                                                    @endif

                                                                @endforeach

                                                        > {{$permission->name}}</label>
                                                </div>
                                            @endif
                                        @endforeach

                                    </div>
                                    <div class="col-lg-4">
                                        <label for="name">Users Permission</label>
                                        @foreach($permissions as $permission)
                                            @if($permission->for == 'user')
                                                <div class="checkbox">
                                                    <label for=""><input class="flat-red" type="checkbox" name="permissions[]" value="{{$permission->id}}"

                                                        @foreach($role->permissions as $rolPer)

                                                            @if($rolPer->id == $permission->id)
                                                                {{'checked'}}
                                                                    @endif

                                                                @endforeach

                                                        > {{$permission->name}}</label>
                                                </div>
                                            @endif
                                        @endforeach

                                    </div>
                                    <div class="col-lg-4">
                                        <label for="name">Other Permission</label>
                                        @foreach($permissions as $permission)
                                            @if($permission->for == 'other')
                                                <div class="checkbox">
                                                    <label for=""><input class="flat-red" type="checkbox" name="permissions[]" value="{{$permission->id}}"

                                                                         @foreach($role->permissions as $rolPer)

                                                                         @if($rolPer->id == $permission->id)
                                                                         checked
                                                                @endif

                                                                @endforeach
                                                        > {{$permission->name}}</label>
                                                </div>
                                            @endif
                                        @endforeach

                                    </div>

                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer mt-2">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{route('role.index')}}" class="btn btn-danger">Back</a>
                        </div>
                    </form>
                </div>

            </div>

        </div>

    </section>

@endsection

@section('scripts')

    <!-- iCheck 1.0.1 -->
    <script src="{{asset('admin/plugins/iCheck/icheck.min.js')}}"></script>

    <script>

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass   : 'iradio_minimal-blue'
        })
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
            checkboxClass: 'icheckbox_minimal-red',
            radioClass   : 'iradio_minimal-red'
        })
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass   : 'iradio_flat-green'
        })

    </script>

@endsection