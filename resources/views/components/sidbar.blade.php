<div class="iq-sidebar sidebar-default">
    <div class="iq-sidebar-logo d-flex align-items-center justify-content-between">
        <a href="{{ route('home') }}" class="header-logo">
            <img src="{{ asset('images/logo.jpg') }}" class="img-fluid rounded-normal light-logo" alt="logo">
            <h5 class="logo-title light-logo ml-3">MYstock</h5>
        </a>
        <div style="cursor:pointer" class="side-menu-bt-sidebar">
            <svg class="wrapper-menu" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img" width="0.3em" height="0.3em"
                preserveAspectRatio="xMidYMid meet" viewBox="0 0 32 32">
                <path fill="currentColor" d="M4 7v2h24V7zm0 8v2h24v-2zm0 8v2h24v-2z" />
            </svg>
        </div>
    </div>
    <div class="data-scrollbar" data-scroll="1">
        <nav class="iq-sidebar-menu">
            <ul id="iq-sidebar-toggle" class="iq-menu">
                <li class="">
                    <a href=" {{ route('home') }} " class="svg-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img"
                            preserveAspectRatio="xMidYMid meet" viewBox="0 0 1024 1024">
                            <path fill="currentColor"
                                d="M946.5 505L560.1 118.8l-25.9-25.9a31.5 31.5 0 0 0-44.4 0L77.5 505a63.9 63.9 0 0 0-18.8 46c.4 35.2 29.7 63.3 64.9 63.3h42.5V940h691.8V614.3h43.4c17.1 0 33.2-6.7 45.3-18.8a63.6 63.6 0 0 0 18.7-45.3c0-17-6.7-33.1-18.8-45.2zM568 868H456V664h112v204zm217.9-325.7V868H632V640c0-22.1-17.9-40-40-40H432c-22.1 0-40 17.9-40 40v228H238.1V542.3h-96l370-369.7l23.1 23.1L882 542.3h-96.1z" />
                        </svg>
                        <span class="ml-4">Dashboard</span>
                    </a>
                </li>
                <li class=" ">
                    <a href="#Command" class="collapsed" data-toggle="collapse" aria-expanded="false">
                        <svg class="svg-icon" id="p-dash2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <circle cx="9" cy="21" r="1"></circle>
                            <circle cx="20" cy="21" r="1"></circle>
                            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                        </svg>
                        <span class="ml-4">Order</span>
                        <svg class="svg-icon iq-arrow-right arrow-active" "
                            xmlns=" http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="10 15 15 20 20 15"></polyline>
                            <path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                        </svg>
                    </a>
                    <ul id="Command" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        <li class="">
                            <a href="{{ route('Command.index') }}">
                                <i class="las la-minus"></i><span>List Order</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="{{ route('Command.create') }}">
                                <i class="las la-minus"></i><span>Add Order</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class=" ">
                    <a href="#product" class="collapsed" data-toggle="collapse" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img"
                            preserveAspectRatio="xMidYMid meet" viewBox="0 0 1024 1024">
                            <path fill="currentColor"
                                d="M839.2 278.1a32 32 0 0 0-30.4-22.1H736V144c0-17.7-14.3-32-32-32H320c-17.7 0-32 14.3-32 32v112h-72.8a31.9 31.9 0 0 0-30.4 22.1L112 502v378c0 17.7 14.3 32 32 32h736c17.7 0 32-14.3 32-32V502l-72.8-223.9zM360 184h304v72H360v-72zm480 656H184V513.4L244.3 328h535.4L840 513.4V840zM652 572H544V464c0-4.4-3.6-8-8-8h-48c-4.4 0-8 3.6-8 8v108H372c-4.4 0-8 3.6-8 8v48c0 4.4 3.6 8 8 8h108v108c0 4.4 3.6 8 8 8h48c4.4 0 8-3.6 8-8V636h108c4.4 0 8-3.6 8-8v-48c0-4.4-3.6-8-8-8z" />
                        </svg>
                        <span class="ml-4">{{ __('product.product') }} </span>
                        <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="10 15 15 20 20 15"></polyline>
                            <path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                        </svg>

                    </a>
                    <ul id="product" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        <li class="">
                            <a href="{{ route('product.index') }}">
                                <i class="fas fa-long-arrow-alt-right"></i>{{ __('product.list') }}</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="{{ route('product.create') }}">
                                <i class="fas fa-long-arrow-alt-right"></i><span>{{ __('product.add') }}</span>
                            </a>
                        </li>
                    </ul>
                </li>
                @can('isAble', 'ProviderController')
                    <li class=" ">
                        <a href="#provider" class="collapsed" data-toggle="collapse" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img"
                                preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M9 3L5 6.99h3V14h2V6.99h3L9 3zm7 14.01V10h-2v7.01h-3L15 21l4-3.99h-3z" />
                            </svg>
                            <span class="ml-4">{{ __('provider.provider') }} </span>
                            <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="10 15 15 20 20 15"></polyline>
                                <path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                            </svg>
                        </a>
                        <ul id="provider" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                            @can('isAble', 'ProviderController@index')
                                <li class="">
                                    <a href="{{ route('provider.index') }}">
                                        <i
                                            class="fas fa-long-arrow-alt-right"></i><span>{{ __('provider.provider_list') }}</span>
                                    </a>
                                </li>
                            @endcan
                            @can('isAble', 'ProviderController@create')
                                <li class="">
                                    <a href="{{ route('provider.create') }}">
                                        <i class="fas fa-long-arrow-alt-right"></i><span>{{ __('provider.add') }}</span>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('isAble', 'CategoryController')
                    <li class=" ">
                        <a href="#category" class="collapsed" data-toggle="collapse" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img"
                                preserveAspectRatio="xMidYMid meet" viewBox="0 0 512 512">
                                <path fill="currentColor"
                                    d="M96 197.333h320v32H96zm72 101.334h176v32H168zM216 400h80v32h-80zM48 96h416v32H48z" />
                            </svg>
                            <span class="ml-4">{{ __('category.category') }}</span>
                            <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="10 15 15 20 20 15"></polyline>
                                <path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                            </svg>
                        </a>
                        <ul id="category" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                            @can('isAble', 'CategoryController@index')
                                <li class="">
                                    <a href="{{ route('category.index') }}">
                                        <i
                                            class="fas fa-long-arrow-alt-right"></i><span>{{ __('category.category_list') }}</span>
                                    </a>
                                </li>
                            @endcan
                            @can('isAble', 'CategoryController@create')
                                <li class="">
                                    <a href="{{ route('category.create') }}">
                                        <i class="fas fa-long-arrow-alt-right"></i><span>{{ __('category.add') }}</span>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('isAble', 'ClientController')
                    <li class=" ">
                        <a href="#Client" class="collapsed" data-toggle="collapse" aria-expanded="false">
                            <svg class="svg-icon" id="p-dash8" width="20" height="20"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg>
                            <span class="ml-4">{{ __('client.client') }} </span>
                            <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="10 15 15 20 20 15"></polyline>
                                <path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                            </svg>
                        </a>
                        <ul id="Client" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                            @can('isAble', 'ClientController@index')
                                <li class=" ">
                                <li class="">
                                    <a href="{{ route('Client.index') }}">
                                        <i class="fas fa-long-arrow-alt-right"></i><span>{{ __('client.list') }} </span>
                                    </a>
                                </li>
                            @endcan
                            @can('isAble', 'ClientController@create')
                                <li class="">
                                    <a href="{{ route('Client.create') }}">
                                        <i class="fas fa-long-arrow-alt-right"></i> <span>{{ __('client.add') }} </span>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('isAble', 'StoreController')
                    <li class=" ">
                        <a href="#store" class="collapsed" data-toggle="collapse" aria-expanded="false">
                            <svg class="svg-icon" id="p-dash2" width="20" height="20"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="9" cy="21" r="1"></circle>
                                <circle cx="20" cy="21" r="1"></circle>
                                <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                            </svg>
                            <span class="ml-4"> {{__('purchase.purchase')}} </span>
                            <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="10 15 15 20 20 15"></polyline>
                                <path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                            </svg>
                        </a>
                        <ul id="store" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                            @can('isAble', 'StoreController@index')
                                <li class="">
                                    <a href="{{ route('Store.index') }}">
                                        <i class="las la-minus"></i><span> {{__('purchase.purchase_list')}}</span>
                                    </a>
                                </li>
                            @endcan
                            @can('isAble', 'StoreController@create')
                                <li class="">
                                    <a href="{{ route('Store.create') }}">
                                        <i class="las la-minus"></i><span> {{__('purchase.add')}}</span>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @if (auth()->user()->type_id == 1)
                    <li class=" ">
                        <a href="#uses" class="collapsed" data-toggle="collapse" aria-expanded="false">
                            <svg class="svg-icon" id="p-dash2" width="20" height="20"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="9" cy="21" r="1"></circle>
                                <circle cx="20" cy="21" r="1"></circle>
                                <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                            </svg>
                            <span class="ml-4"> Admin </span>
                            <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="10 15 15 20 20 15"></polyline>
                                <path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                            </svg>
                        </a>
                        <ul id="uses" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                            <li class="">
                                <a href="{{ route('user.index') }}">
                                    <i class="las la-minus"></i><span>List Users</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="{{ route('user.create') }}">
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
