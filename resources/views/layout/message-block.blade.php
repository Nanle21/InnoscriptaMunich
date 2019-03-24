@if(Session::has('message'))
    <div class="row" style="list-style: none; text-align: center;">
        <div class="col col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
           <p class="{{Session::get('messagetype')}}">{{Session::get('message')}}</p>
        </div>
    </div>
@endif