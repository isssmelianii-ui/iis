@extends('control_panel.master')
@section('title', 'All Movies')
@section('main-content')
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Movies</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Movies</a></div>
              <div class="breadcrumb-item">All Movies</div>
            </div>
          </div>

          <div class="section-body">

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>All Movies</h4>
                    <div class="card-header-form">
                      <form>
                        <div class="input-group">
                          <input type="text" class="form-control" placeholder="Search">
                          <div class="input-group-btn">
                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped table-md">
                        <thead>
                          
                          <tr>
                            <th>Poster</th>
                            <th>Title</th>
                            <th>Year</th>
                            <th>Type</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody id="movie-container">
                         <tr>
                          <td>dune</td>
                          <td></td>
                         </tr>
                         <tr>
                          <td>spiderman</td>
                         </tr>
                        </tbody>
                        </table>
                    </div>
                  </div>
                    <nav class="d-inline-block">
                      <ul class="pagination mb-0">
                      </ul>
                    </nav>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
@endsection