@extends('layouts.app')



@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 mt-2">
                <div class="card">
                    <div class="card-body">
                         @if ($message = Session::get('success'))
                             <div class="alert alert-success  alert-dismissible">
                                 <button type="button" class="close" data-dismiss="alert">×</button>
                                 <strong>{{ $message }}</strong>
                             </div>
                         @endif
                         <form method="POST" action="{{ route('signature.store') }}">
                             @csrf
                             <div class="col-md-12">
                                 <input type="hidden" name="user_id" value="{{ $user_id }}">
                                 <label class="" for="">Draw Signature:</label>
                                 <br/>
                                 <div id="sig"></div>
                                 <br><br>
                                 <a class="btn btn-primary" href="{{ route('test_covids.index') }}"> Back</a>
                                 <button id="clear" class="btn btn-danger">Clear Signature</button>
                                 <button class="btn btn-success">Save</button>
                                 <textarea id="signature" name="signed" style="display: none"></textarea>
                             </div>
                         </form>
                    </div>
                </div>
            </div>
        </div>
     </div>
<hr>

@endsection


