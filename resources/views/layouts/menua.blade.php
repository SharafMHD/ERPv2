
<li class="{!! Request::is('home*') ? 'active' : '' !!}">
    <a href="{!! route('home') !!}" class="nav-link nav-toggle">
        <i class="icon-home"></i>
        <span class="title">@lang('fully.Home')</span>
    </a>
</li>
@foreach (Auth::user()->menu()->where('parent',null) as $model)

                                    @if( auth::user()->isautherd("index",$model->name) && $model->label !=null )

   <li class="nav-item ">
                               <a href="javascript:;" class="nav-link nav-toggle">
                               <i class="{{$model->icon}}"></i>
                                   <span class="title"> @lang('fully.'.$model->label)</span>
                                   <span class="arrow"></span>
                               </a>
                               
                               <ul class="sub-menu">
                           
                               @foreach (Auth::user()->menu()->where('parent',$model->id) as $action)

                                    @if( auth::user()->isautherd("index",$action->name) )

                                    {{-- <li class="nav-item  {{ Request::is('{{!!$model->name!!}}*') ? 'active' : '' }}">
                                        <a href="/en/{{$action->name}}" class="nav-link">
                                            <span class="title">{{$action->label}}</span>
                                        </a>
                                    </li> --}}
                                    <li class="nav-item  {{ Request::is('{{!!$model->name!!}}*') ? 'active' : '' }}">
                                        <a href="{!! route($action->name.'.index') !!}" class="nav-link">
                                            <span class="title">@lang('fully.'.$action->label)</span>
                                        </a>
                                    </li>
                                    @endif
                                 @endforeach
                                    
                                </ul>
                              
                                            
 </li>
 @endif

@endforeach








