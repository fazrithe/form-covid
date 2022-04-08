@extends('layouts.app')



@section('content')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" integrity="sha512-aOG0c6nPNzGk+5zjwyJaoRUgCdOrfSDhmMID2u4+OIslr0GjpLKo7Xm0Ao3xmpM4T8AmIouRkqwj1nrdVsLKEQ==" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="http://keith-wood.name/css/jquery.signature.css">
    <style>
        .kbw-signature { width: 100%; height: 200px;}
        #sig canvas{ width: 100% !important; height: auto;}
    </style>
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
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
<script type="text/javascript" src="http://keith-wood.name/js/jquery.signature.js"></script>
<script type="text/javascript">
    var sig = $('#sig').signature({syncField: '#signature', syncFormat: 'PNG'});
    $('#clear').click(function(e) {
        e.preventDefault();
        sig.signature('clear');
        $("#signature").val('');
    });
</script>

@endsection


