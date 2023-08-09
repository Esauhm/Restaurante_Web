
<!-- INSERTAR CONTENIDO -->
<link rel="stylesheet" href="resources/css/index.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0/css/bootstrap.min.css">


<style>
    .image-container {
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .image-container img {
      border-radius: 50%;
      width: 150px;
      height: 150px;
      margin: 10px;
    }

    .image-container img:hover {
      
      background-color: #f8f8f8;
      box-shadow: 0 0 10px rgba(255,0,0,1);
    }

    .image-container p {
      text-align: center;
    }

    .titulo-promociones {
      text-align: center;
      font-weight: bold;
      margin-top: 50px;
      font-size: 3rem;
      font-weight: 700;
      margin-bottom: 40px;
      color: #c43f3f;
      
    }

    .card {
      transition: transform 0.3s;
    }

    .card:hover {
      transform: scale(1.05);
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    
  </style>

<!-- INSERTAR CONTENIDO -->
<body>
@include('layouts.header')

  <div class="row">
    <div class="col-md-12">
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{ asset('img/slide4.jpg') }}" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5 class="fw-bold fs-1">Las mejores pupusas de Santa Ana</h5>
        <p>Visítanos en nuestro restaurante PupuSA</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="{{ asset('img/slide3.jpg') }}" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5 class="fw-bold fs-1">Pupusas de Calidad</h5>
        <p>Somos los mejores en hacer pupusas</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="{{ asset('img/slide3.jpeg') }}" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5 class="fw-bold fs-1">Llévate una experiencia inolvidable</h5>
        <p>Siente la calidad</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
  </div>
</div>



<div class="container mt-5">
  <h1 class="titulo-promociones mb-4">Mejores Promociones</h1>
  <div class="row">
    <div class="col-md-6 col-lg-4 text-center mb-4">
      <img src="{{ asset('img/pu1.jpg') }}" class="rounded img-fluid" data-aos="zoom-in" alt="...">
    </div>
    <div class="col-md-6 col-lg-4 text-center mb-4">
      <img src="{{ asset('img/pu2.jpg') }}" class="rounded img-fluid" data-aos="zoom-in" alt="...">
    </div>
    <div class="col-md-6 col-lg-4 text-center mb-4">
      <img src="{{ asset('img/pu1.jpg') }}" class="rounded img-fluid" data-aos="zoom-in" alt="...">
    </div>
  </div>
</div>




    <div class="container">
    <h1 class="titulo-promociones  mb-5">El secreto son nuestros ingredientes</h1>
    <div class="row">
    <div class="col-sm-6 col-md-3" data-aos="fade-up">
        <div class="card">
          <img src="{{ asset('img/c1.jpg') }}" class="card-img-top" alt="Imagen 3">
          <div class="card-body">
            <h5 class="card-title">Queso</h5>
            <p class="card-text">Usamos el mejor queso para hacer pupusas</p>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-3" data-aos="fade-up">
        <div class="card">
          <img src="{{ asset('img/c2.jpg') }}" class="card-img-top" alt="Imagen 3">
          <div class="card-body">
            <h5 class="card-title">Frijoles</h5>
            <p class="card-text">Se preparan con frijoles de calidad</p>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-3" data-aos="fade-up">
        <div class="card">
          <img src="{{ asset('img/c3.jpg') }}" class="card-img-top" alt="Imagen 3">
          <div class="card-body">
            <h5 class="card-title">Chile</h5>
            <p class="card-text">No puede faltar el buen chile para la salsita</p>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-3" data-aos="fade-up">
        <div class="card">
          <img src="{{ asset('img/c4.jpg') }}"  class="card-img-top" alt="Imagen 4">
          <div class="card-body">
            <h5 class="card-title">Maiz</h5>
            <p class="card-text">Se usa maiz de calidad para tener una masa suave</p>
          </div>
        </div>
      </div>
    </div>
  </div>




<div class="container">
  <h1 class="titulo-promociones mb-4">Aqui Encontrarás</h1>
  <div class="row">
    <div class="col-md-6 col-lg-3 mb-4">
      <div class="image-container" >
        <p>Pupusas</p>
        <img src="{{ asset('img/pu3.jpg') }}" alt="Imagen 1" class="img-fluid">
      </div>
    </div>
    <div class="col-md-6 col-lg-3 mb-4">
      <div class="image-container" >
        <p>Refrescos</p>
        <img src="{{ asset('img/ref1.jpg') }}" alt="Imagen 2" class="img-fluid">
      </div>
    </div>
    <div class="col-md-6 col-lg-3 mb-4">
      <div class="image-container" >
        <p>Promociones</p>
        <img src="{{ asset('img/prom1.jpg') }}" alt="Imagen 3" class="img-fluid">
      </div>
    </div>
    <div class="col-md-6 col-lg-3 mb-4">
      <div class="image-container" >
        <p>Postres</p>
        <img src="{{ asset('img/postre1.jpg') }}" alt="Imagen 4" class="img-fluid">
      </div>
    </div>
  </div>
</div>


    
</body>
  @include('layouts.footer')


<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0/js/bootstrap.bundle.min.js"></script>
  <script>
    AOS.init();
  </script>
<!-- FIN CONTENIDO -->


    
