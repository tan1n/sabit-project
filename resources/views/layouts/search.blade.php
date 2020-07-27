<section class="section section-search">
    <div class="container-fluid">
        <div class="banner-wrapper">
            <div class="banner-header text-center">
                <h1>Search Doctor, Make an Appointment</h1>
                <p>Discover the best doctors, clinic & hospital the city nearest to you.</p>
            </div>
            <!-- Search -->
            <div class="search-box">
                <form action="{{route('search')}}" method="get">
                    <div class="form-group search-location">
                        <select class="form-control" id="location">
                            <option value="Dhaka">Dhaka</option>
                            <option value="Chittagong">Chittagong</option>
                        </select>
                        <span class="form-text">Based on your Location</span>
                    </div>
                    <div class="form-group search-info">
                        <input type="text" name="name"  id="doc_name" class="form-control" placeholder="Search Doctors,Diseases">
                        <span class="form-text" id="doc_name_suggest"></span>
                    </div>
                    <button type="submit" class="btn btn-primary search-btn"><i class="fas fa-search"></i> <span>Search</span></button>
                </form>
            </div>
            <!-- /Search -->
        </div>
    </div>
</section>
