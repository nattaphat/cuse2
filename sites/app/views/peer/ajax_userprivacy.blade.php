<div >

    <form class="form-horizontal" role="form">
    @foreach ( $user_privacy as $val)
        <div class="form-group">
            <label for="inputPassword1" class="col-lg-3 control-label">{{$val->name_th}}</label>
            <div class="col-lg-4">
                <div >
                    @if($val->init_value)
                        {{ $user_info[$val->name_en] }}
                    @else
                        n/a
                    @endif
                </div>
            </div>
        </div>
    @endforeach
    </form>
</div>
