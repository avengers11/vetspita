add
$user->image = !empty($req->image) ? Utils::processFile($req->file('image'), 'users') : "placeholder.png";


if (Storage::exists($slider->image)) {
    Storage::delete($slider->image);
}

Edit
$image = "";
if(!empty($req->image)){
    $image = Utils::processFile($req->file('image'), 'users');
    Storage::delete($user->image);
}else{
    $image = $user->image;
}


add 
$req->validate([
    'name' => 'required',
    'email' => 'required',
    'password' => 'required',
    'role' => 'required',
]);

try {
    $user = new User;
    $user->name = $req->name;
    $user->email = $req->email;
    $user->image = !empty($req->image) ? Utils::processFile($req->file('image'), 'users') : "placeholder.png";
    $user->password = Hash::make($req->password);
    $user->save();

    return redirect(route('admin.user.index'))->with(['status' => true, 'msg' => 'You are successfully created a user!']);
} catch (\Throwable $th) {
    return redirect(route('admin.user.index'))->with(['status' => false, 'msg' => 'Error Type: '.$th]);
}

update 

$req->validate([
    'name' => 'required',
    'email' => 'required',
    'password' => 'nullable',
    'role' => 'required',
]);


try {
    $imgName = "";
    if(!empty($req->image)){
        $imgName = Utils::processFile($req->file('image'), 'users');
        Storage::delete($user->image);
    }else{
        $imgName = $user->image;
    }

    $user->name = $req->name;
    $user->email = $req->email;
    $user->password = empty($req->password) ? $user->password : Hash::make($req->password);
    $user->image = $imgName;
    $user->save();

    return redirect(route('admin.user.index'))->with(['status' => true, 'msg' => 'You are successfully updated a user!']);
} catch (\Throwable $th) {
    return redirect(route('admin.user.index'))->with(['status' => false, 'msg' => 'Error Type: '.$th]);
}



















@extends('admin.layouts.master')
@section('master')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Dashboard</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard v1</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- /.content-header -->

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        @if (permission('User Add'))
                            <a class="btn bg-gradient-success btn-sm ml-3" href="{{ route('admin.user.add') }}" > {{keywords()->Add ?? __('Add')}}</a>
                        @endif
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{keywords()->Employee ?? __('Employee')}}</th>
                                    <th>{{keywords()->Email ?? __('Email')}} </th>
                                    <th>{{keywords()->Actions ?? __('Actions')}} </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataTypes as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{$data->name}}</td>
                                        <td>{{$data->email}}</td>
                                        <td>
                                            <div class="d-flex justify-content-end">
                                                @if (permission('User Edit'))
                                                    <a class="btn bg-gradient-success btn-sm" href="{{route('admin.user.edit', $data)}}" > {{keywords()->Edit ?? __('Edit')}}</a>
                                                @endif

                                                @if (permission('User Delete'))
                                                    <a class="btn bg-gradient-danger btn-sm" href="{{route('admin.user.delete', $data)}}"> {{keywords()->Delete ?? __('Delete')}}</a>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                                @if(count($dataTypes) < 1)
                                    <tr>
                                        <td colspan="6" class="text-center">
                                            No data found!
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>

                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection