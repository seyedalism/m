<div class="m-0 navbar navbar-expand-lg navbar-dark text-white p-2" style="background-color: #2980b9">

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAABfAAAAXwBsrqMZwAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAAxSURBVEiJ7dKhEQAgAMPAlP13LooJQACXV1VVAX0va7Tt0eMkAOPkqe5kRdpnRXrABNDNDApC+gFWAAAAAElFTkSuQmCC" class="img-fluid col-12"></span>
    </button>

    <div class="collapse navbar-collapse text-white" id="navbar">
        <div class="px-4 px-md-2 navbar-nav position-relative font-weight-bold container-fluid d-flex flex-lg-row flex-column"
             style="box-sizing: border-box;color: white;">
            @if (App\Core\Auth::check('admin'))
            <a href="{{ url('admin/manage-leages') }}" class="text-white nav-item py-3 p-lg-2 ">
                افزودن لیگ
            </a>
            <a href="{{ url('admin/manage-users') }}" class="text-white nav-item py-3 p-lg-2 ">
                مدیریت کاربران
            </a>
            <a href="{{ url('admin/add-user') }}" class="text-white nav-item py-3 p-lg-2 ">
                افزودن کاربر
            </a>
            <a href="{{ url('admin/book') }}" class="text-white nav-item py-3 p-lg-2 ">
               معرفی کتاب
            </a>
              <a href="{{ url('admin/logout') }}" class="text-white nav-item py-3 p-lg-2 ">
               خروج
              </a>
            @endif
            
        </div>
    </div>

</div>