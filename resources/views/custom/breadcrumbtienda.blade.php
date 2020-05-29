 @yield('salto')
<div class="row page_nav_row">
                    <div class="col">
                        <div class="page_nav">
                            <ul class="d-flex flex-row align-items-start justify-content-center">
                                <li class="breadcrumb-item"><a href="{{route('index')}}">Inicio</a></li>
                                      @yield('breadcrumb')                      
                            </ul>
                        </div>
                    </div>
                </div>