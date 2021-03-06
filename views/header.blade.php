
<div class="m-0 navbar navbar-expand-lg navbar-dark text-white p-2" style="background-color: #2980b9">

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAABfAAAAXwBsrqMZwAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAAxSURBVEiJ7dKhEQAgAMPAlP13LooJQACXV1VVAX0va7Tt0eMkAOPkqe5kRdpnRXrABNDNDApC+gFWAAAAAElFTkSuQmCC" class="img-fluid col-12"></span>
    </button>

    <div class="collapse navbar-collapse text-white" id="navbar">
        <div class="px-4 px-md-2 navbar-nav position-relative font-weight-bold container-fluid d-flex flex-lg-row flex-column"
             style="box-sizing: border-box;color: white;">
            <a href="{{ url() }}" class="text-white nav-item py-3 p-lg-2 ">صفحه اصلی</a>

            @if (App\Core\Auth::check())
                <a href="{{ url('logout') }}" class="nav-item text-white py-3 p-lg-2 ">خروج</a>
                <a href="{{ url() }}" class="nav-item py-3 p-lg-2 ">
                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAABuwAAAbsBOuzj4gAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAADMSURBVEiJ7dMxagJBGIZh19o0sbHRKoWXiXiDeIiQEMQTJXoAwcsopgmRxFLBx2YEE9d11LEQfGGqj/ledv79S6UbVwEa6OMrnAEeUpbP7DJDPYWgn1O+4T2FYF4g+Dl0vxzhyE7MogWjgmwYcb8YNPcM+TvJkINk85vO8YuPZOUXBXfo4D4nq+IJlVPL2/gM7/2Sk7+FbIrWseWvWG0NdIEuauH0sNzKV3iOLW8VLNYhHmMEkzME4/99O5sIUZ+6hyzL/nTGbPKNK2cNX2qNNgsV2P0AAAAASUVORK5CYII=">
                <span class="text-white">{{ Cookie::get('name') }}</span>
                </a>
            @else
                <a href="" class="text-white nav-item py-3 p-lg-2 " data-toggle="modal" data-target="#modalLoginForm"
                >ورود</a>
            @endif
        </div>
    </div>

</div>

