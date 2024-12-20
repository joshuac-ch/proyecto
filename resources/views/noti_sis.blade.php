@foreach ($noti as $n)
<li class="mb-2">
    <a class="dropdown-item border-radius-md" href="javascript:;">
        <div class="d-flex py-1">
            <div class="my-auto">
                <img src="{{asset('assets/img/team-2.jpg')}}" class="avatar avatar-sm  me-3 ">
            </div>
            <div class="d-flex flex-column justify-content-center">
                <h6 class="text-sm font-weight-normal mb-1">
                    <span class="font-weight-bold">{{$n->mensaje}}</span> from {{$n->id}}
                </h6>
                <p class="text-xs text-secondary mb-0">
                    <i class="fa fa-clock me-1"></i>
                    13 minutes ago
                </p>
            </div>
        </div>
    </a>
</li>
@endforeach