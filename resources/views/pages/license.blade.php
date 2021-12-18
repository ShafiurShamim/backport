@extends('layouts.app')


@section('header')
<h1>License - MIT</h1>
@endsection

@section('content')
<div class=" bg-white p-4">
    <div class="">
      
        <span class="text-gray-800">Copyright &copy; {{ date("Y") }} Backport</span>

           <p class="text-justify p-4">
               Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:
            </p> 
            
           <p class="text-justify p-4">
               The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
            </p> 

            <p class="text-justify p-4 uppercase">
                THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
            </p>
            
    </div>
</div>

@endsection