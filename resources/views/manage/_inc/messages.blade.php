{{-- <div class="opacity-layer" style="display:none"></div>
<div class="snackbar" style="display:none"></div> --}}

@if(isset($errors) && count($errors)>0)
    <div id="msgErrAll" class="notification error">
        <div class="alert alert-error">
            <button class="absolute focus:outline-none right-0 top-0 px-2 py-1 text-gray-800 hover:bg-red-300 font-bold" onclick="document.getElementById('msgErrAll').remove();">X</button>
            @foreach($errors->all() as $error)
                <p>{{$error}}</p>
            @endforeach 
        </div>
    </div>
@endif
@if(session('success'))
    <div id="msgSuc" class="notification success">
        <div class="alert alert-success">
            <button class="absolute focus:outline-none right-0 top-0 px-2 py-1 text-gray-800 hover:bg-green-300 font-bold" onclick="document.getElementById('msgSuc').remove();">X</button>
            {{session('success')}}
        </div>
    </div>
@endif
@if(session('error'))
<div id="msgErr" class="notification error">
    <div class="alert alert-error">
        <button class="absolute focus:outline-none right-0 top-0 px-2 py-1 text-gray-800 hover:bg-red-300 font-bold" onclick="document.getElementById('msgErr').remove();">X</button>
        {{session('error')}}
    </div>
</div>
@endif
@if(session('info'))
<div id="msgInf" class="notification info">
    <div class="alert alert-info">
        <button class="absolute focus:outline-none right-0 top-0 px-2 py-1 text-gray-800 hover:bg-red-300 font-bold" onclick="document.getElementById('msgIng').remove();">X</button>
        {{session('info')}}
    </div>
</div>
@endif

@if(session('warn'))
<div id="msgWrn" class="notification warn">
    <div class="alert alert-warn">
            <button class="absolute focus:outline-none right-0 top-0 px-2 py-1 text-gray-800 hover:bg-red-300 font-bold" onclick="document.getElementById('msgWrn').remove();">X</button>
            {{session('warn')}}
    </div>
</div>
@endif
