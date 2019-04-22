<div class="my-3 my-md-5">
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">
                @yield('page_title')
            </h1>
            <div class="page-options d-flex">
                @yield('page_action')
            </div>
        </div>
        <!-- End Page Title -->
        @if (session()->has('success'))
            <div class="alert alert-success alert-rounded"> {!! session()->get('success') !!}.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true" class="invisible">×</span> </button>
            </div>
        @elseif (session()->has('error'))
            <div class="alert alert-danger alert-rounded"> {!! session()->get('error') !!}.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
            </div>
        @endif

        @yield('page')
    </div>
</div>
