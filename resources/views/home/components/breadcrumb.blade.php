<section class="banner_area">
      <div class="banner_inner d-flex align-items-center">
        <div class="container">
          <div
            class="banner_content d-md-flex justify-content-between align-items-center"
          >
            <div class="mb-3 mb-md-0">
              <h2>{{$title}}</h2>
              <p>{{ $description }}</p>
            </div>
            <div class="page_link">
              <a href="{{ url('/') }}">Home</a>
              <a href="{{ url($link) }}">{{ $linkTitle }}</a>
            </div>
          </div>
        </div>
      </div>
    </section>