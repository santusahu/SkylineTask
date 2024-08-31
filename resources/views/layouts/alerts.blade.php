<div class="alert_div" id="alert_div">
    @if (Session::has('success'))
        <div class="alert alert-success" id="msg_div" role="alert">
            {{ Session::get('success') }}
        </div>
    @elseif (Session::has('false'))
        <div class="alert alert-danger" id="msg_div" role="alert">
            {{ Session::get('false') }}
        </div>
    @elseif (Session::has('failure'))
        <div class="alert alert-danger" id="msg_div" role="alert">
            {{ Session::get('failure') }}
        </div>
    @elseif (Session::has('error'))
        <div class="alert alert-warning" id="msg_div" role="alert">
            {{ Session::get('error') }}
        </div>
    @elseif (Session::has('warning'))
        <div class="alert alert-warning" id="msg_div" role="alert">
            {{ Session::get('warning') }}
        </div>
    @endif

    @if ($errors->any())
    <div class="alert alert-danger"  id="msg_div" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</div>

<div class="alert alert-danger d-none" id="popupBox" role="alert">
    <span  class="popupContent" id="popupContent">thgrejtgregthrj</span>
</div>
<div class="clearfix"></div>
