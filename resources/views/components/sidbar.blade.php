<div class="iq-sidebar sidebar-default">
    <div class="iq-sidebar-logo d-flex align-items-center justify-content-between">
        <a href="{{route('home')}}" class="header-logo">
            <img src="{{asset('images/logo.jpg')}}" class="img-fluid rounded-normal light-logo" alt="logo">
            <h5 class="logo-title light-logo ml-3">MYstock</h5>
        </a>
        <div style="cursor:pointer" class="side-menu-bt-sidebar">
            <i class="las la-bars wrapper-menu"></i>
        </div>  
    </div>
    <div class="data-scrollbar" data-scroll="1">
        <nav class="iq-sidebar-menu">
            <ul id="iq-sidebar-toggle" class="iq-menu">
                <li class="">
                    <a href=" {{route('home')}} " class="svg-icon">
                        <svg  class="svg-icon" id="p-dash1" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line>
                        </svg>
                        <span class="ml-4">Dashboard</span>
                    </a>
                </li>
                <li class=" ">
                    <a href="#Command" class="collapsed" data-toggle="collapse" aria-expanded="false">
                        <svg class="svg-icon" id="p-dash2" width="20" height="20"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle>
                            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                        </svg>
                        <span class="ml-4">Order</span>
                        <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="10 15 15 20 20 15"></polyline><path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                        </svg>
                    </a>
                    <ul id="Command" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        <li class="">
                            <a href="{{route('Command.index')}}">
                                <i class="las la-minus"></i><span>List Order</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="{{route('Command.create')}}">
                                <i class="las la-minus"></i><span>Add Order</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class=" ">
                    <a href="#product" class="collapsed" data-toggle="collapse" aria-expanded="false">
                        <i class="fas fa-capsules mr-0"></i>
                        <span class="ml-4">{{__('product.product')}} </span>
                        <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="10 15 15 20 20 15"></polyline><path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                        </svg>
                    </a>
                    <ul id="product" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        <li class="">
                            <a href="{{route('product.index')}}">
                                <i class="fas fa-long-arrow-alt-right"></i>{{ __('product.product_list')}}</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="{{route('product.create')}}">
                                <i class="fas fa-long-arrow-alt-right"></i><span>{{ __('product.add')}}</span>
                            </a>
                        </li>
                    </ul>
                </li>
                @can('isAble','ProviderController')
                <li class=" ">
                    <a href="#provider" class="collapsed" data-toggle="collapse" aria-expanded="false">
                         <i class="fas fa-arrows-alt-h mr-0"></i>
                        <span class="ml-4">{{__('provider.provider')}} </span>
                        <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="10 15 15 20 20 15"></polyline><path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                        </svg>
                    </a>
                    <ul id="provider" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        @can('isAble','ProviderController@index')
                        <li class="">
                            <a href="{{route('provider.index')}}">
                                <i class="fas fa-long-arrow-alt-right"></i><span>{{__('provider.provider_list')}}</span>
                            </a>
                        </li>
                        @endcan
                        @can('isAble','ProviderController@create')
                        <li class="">
                            <a href="{{route('provider.create')}}">
                                <i class="fas fa-long-arrow-alt-right"></i><span>{{__('provider.add')}}</span>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endcan
                @can('isAble','CategoryController')
                <li class=" ">
                    <a href="#category" class="collapsed" data-toggle="collapse" aria-expanded="false">
                        <i class="fas fa-list mr-0"></i>
                        <span class="ml-4">{{__('category.category')}}</span>
                        <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="10 15 15 20 20 15"></polyline><path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                        </svg>
                    </a>
                    <ul id="category" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                      @can('isAble','CategoryController@index')
                        <li class="">
                            <a href="{{route('category.index')}}">
                                <i class="fas fa-long-arrow-alt-right"></i><span>{{__('category.category_list')}}</span>
                            </a>
                        </li>
                        @endcan
                     @can('isAble','CategoryController@create')
                        <li class="">
                            <a href="{{route('category.create')}}">
                                <i class="fas fa-long-arrow-alt-right"></i><span>{{__('category.add')}}</span>
                            </a>
                        </li>
                    @endcan
                    </ul>
                </li>
                @endcan
                @can('isAble','ClientController')
                <li class=" ">
                    <a href="#Client" class="collapsed" data-toggle="collapse" aria-expanded="false">
                    <svg class="svg-icon" id="p-dash8" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg>
                        <span class="ml-4">{{__('client.client')}} </span>
                        <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="10 15 15 20 20 15"></polyline><path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                        </svg>
                    </a>
                    <ul id="Client" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        @can('isAble','ClientController@index')
                        <li class=" ">
                        <li class="">
                            <a href="{{route('Client.index')}}">
                                <i class="fas fa-long-arrow-alt-right"></i><span>{{__('client.list')}} </span>
                            </a>
                        </li>
                        @endcan
                        @can('isAble','ClientController@create')
                        <li class="">
                            <a href="{{route('Client.create')}}">
                                <i class="fas fa-long-arrow-alt-right"></i> <span>{{__('client.add')}} </span>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endcan
                @can('isAble','StoreController')
                <li class=" ">
                    <a href="#store" class="collapsed" data-toggle="collapse" aria-expanded="false">
                        <svg class="svg-icon" id="p-dash2" width="20" height="20"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle>
                            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                        </svg>
                        <span class="ml-4"> Store </span>
                        <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="10 15 15 20 20 15"></polyline><path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                        </svg>
                    </a>
                    <ul id="store" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        @can('isAble','StoreController@index')
                        <li class="">
                            <a href="{{route('Store.index')}}">
                                <i class="las la-minus"></i><span>All Product</span>
                            </a>
                        </li>
                        @endcan
                        @can('isAble','StoreController@create')
                        <li class="">
                            <a href="{{route('Store.create')}}">
                                <i class="las la-minus"></i><span>Add To store</span>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endcan
                @if(auth()->user()->type_id==1)
                <li class=" ">
                    <a href="#uses" class="collapsed" data-toggle="collapse" aria-expanded="false">
                        <svg class="svg-icon" id="p-dash2" width="20" height="20"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle>
                            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                        </svg>
                        <span class="ml-4"> Admin </span>
                        <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="10 15 15 20 20 15"></polyline><path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                        </svg>
                    </a>
                    <ul id="uses" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        <li class="">
                            <a href="{{route('user.index')}}">
                                <i class="las la-minus"></i><span>List Users</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="{{route('user.create')}}">
                                <i class="las la-minus"></i><span>Add User</span>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif
            </ul>
        </nav>
        <div class="p-5"></div>
    </div>
</div>