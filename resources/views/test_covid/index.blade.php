@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Test Covid</h2>
            </div>
            <div class="pull-right">
                @can('testcovid-create')
                <a class="btn btn-sm btn-success" href="{{ route('test_covids.create') }}"> Create New Test</a>
                @endcan
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <div class="table-responsive">
        <table id="example1" class="table table-bordered table-striped">
        <thead>
            <th>No</th>
            <th>NIK</th>
            <th>Name</th>
            <th width="280px">Action</th>
        </tr>
        </thead>
        <tbody>
	    @foreach ($TestCovids as $value)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $value->nik }}</td>
	        <td>{{ $value->name }}</td>
	        <td>
                <form action="{{ route('test_covids.destroy',$value->id) }}" method="POST">
                    <a class="btn btn-sm btn-info" href="{{ route('test_covids.show',$value->id) }}">Show</a>
                    @can('testcovid-edit')
                    <a class="btn btn-sm btn-primary" href="{{ route('test_covids.edit',$value->id) }}">Edit</a>
                    @endcan


                    @csrf
                    @method('DELETE')
                    @can('testcovid-delete')
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    @endcan
                </form>
	        </td>
	    </tr>
	    @endforeach
        </tbody>
    </table>

<br>
{!! $TestCovids->links() !!}
@endsection
