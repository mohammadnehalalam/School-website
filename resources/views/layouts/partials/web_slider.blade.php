<section id="slider" class="slider">

    <style>

        p {
            color: rgb(213, 216, 31);
        }
        h2{
          color:aqua;
        }
    </style>
    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
        @foreach($slider as $key => $item)
            @php $count = 0 @endphp
          <div class="carousel-item h-100 {{ ($key == 0) ? 'active' : ''}}">
            <img src="{{ asset($item->image) }}" class="d-block w-100 h-100" alt="{{ $item->slogan }}">
            <div class="carousel-caption d-md-block">
                <h2>{{ $item->headerline }}</h2>
                <p style="text-transform: uppercase">{{ $item->description }}</p>
            </div>
          </div>
        @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
</section>
