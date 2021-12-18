@if(session('success'))
    <div id="notification" class="notification success">
        <div class="alert alert-success">
            <button class="absolute right-2 top-1 p-1 text-gray-800 hover:bg-red-300 font-bold" onclick="document.getElementById('notification').remove();">X</button>
            {{session('success')}}
        </div>
    </div>
@endif
@if(session('status'))
    <div id="notification" class="notification status">
        <div class="alert alert-status">
            <button class="absolute right-2 top-1 p-1 text-gray-800 hover:bg-red-300 font-bold" onclick="document.getElementById('notification').remove();">X</button>
            {{session('status')}}
        </div>
    </div>
@endif