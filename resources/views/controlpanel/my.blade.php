@include("controlpanel.components.header")
      <!-- Main Content -->
      <div class="main-content" style="min-height: 896px">
        <section class="section">
          <div class="section-header">
            <h1>{{ __('messages.my_title') }}</h1>
          </div>
          <div class="section-body">
            <div class="row mt-4">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>{{ __('messages.my_section_title') }}</h4>
                  </div>
                  <div class="card-body">
                    <div id="favorites-content">
                      <div class="text-center py-5">
                        <i class="fas fa-heart-broken fa-3x text-muted mb-3 d-block"></i>
                        <h5 class="text-muted">{{ __('messages.my_no_favorites') }}</h5>
                        <p class="text-muted">{{ __('messages.my_empty_text') }}</p>
                        <a href="{{ route('dashboard') }}" class="btn btn-primary mt-2" >
                          <i class="fas fa-search"></i> {{ __('messages.my_find_button') }}
                        </a>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
          </div>
        </section>
      </div>
@include("controlpanel.components.footer")