
<li class="nav-item {!! Request::is('*home*') ? 'start  open' : '' !!}">
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="icon-home"></i>
        <span class="title">Dashboard</span>
        <span class="selected"></span>
        <span class="arrow open"></span>
    </a>
    <ul class="sub-menu" style="display:  {!! Request::is('*home*') ? 'block' : 'none' !!};">
  
        <li class="nav-item start active open">
            <a href="{!! route('home') !!}" class="nav-link ">
                <i class="icon-bulb"></i>
                <span class="title">@lang('fully.Home')</span>
                <span class="selected"></span>
            </a>
        </li>

    </ul>
</li>
@foreach (Auth::user()->menu()->where('parent',null)->where('label','<>',null) as $model)

<li class="nav-item {{ Request::is('{{!!$model->name!!}}*') ? 'active open' : '' }}">
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="{{$model->icon}}"></i>
        <span class="title">@lang('fully.'.$model->label)</span>
        <span class="arrow"></span>
    </a>

    <ul class="sub-menu" style="display: none;">
        @foreach (Auth::user()->menu()->where('parent',$model->id) as $sub)
        <li class="nav-item {{ Request::is('{{!!$sub->name!!}}*') ? 'active' : '' }}">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="icon-settings"></i> @lang('fully.'.$sub->label)
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu" style="display: none;">
                @foreach (Auth::user()->menu()->where('parent',$sub->id) as $action)

                
                        <li class="nav-item  {{ Request::is('{{!!$action->name!!}}*') ? 'active open' : '' }}">
                            <a href="{!! route($sub->name.'.'.$action->name.'.index') !!}" class="nav-link">
                                <i class="icon-power"></i>  @lang('fully.'.$action->label)
                            </a>
                        </li>
                       
                @endforeach

            </ul>
        </li>
        @endforeach

    </ul>

</li>

@endforeach
<a class="nav-link nav-toggle" href="{!! route('inventory.transfers.index') !!}">
    <i class="fa fa-edit"></i>
    <span  class="title">@lang('fully.transfers')</span></a>



















