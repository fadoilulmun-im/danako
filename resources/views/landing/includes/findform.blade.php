<form class="find-form mt-0 bg-primary"  action="{{ route('searchJobs') }}" method="GET">
    <div class="container">
      <div class="row">
        <div class="col-lg-3">
            <div class="form-group">
                <input type="text" class="form-control" id="exampleInputEmail1" name="title" placeholder="Job Title or Keyword">
                <i class="bx bx-search-alt"></i>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="form-group">
                <input type="text" class="form-control" id="exampleInputEmail2" placeholder="Location">
                <i class="bx bx-locataion-plus"></i>
            </div>
        </div>

        <div class="col-lg-3">
            <select class="category" name="category">
                <option value="" data-display="Perusahaan">Pilih</option>
                @foreach($companies as $company)
                    <option value="{{ $company->id }}" data-display="Perusahan">{{ $company->name }}</option>
                @endforeach
            </select>

            
        </div>

        <div class="col-lg-3">
            <button type="submit" class="find-btn">
                Find A Job
                <i class='bx bx-search'></i>
            </button>
        </div>
    </div>
  </div>
</form>

