<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon -->
    <link rel="icon" type="image/x-icon" href="<?= base_url('assets/img/instansi/'.$sekolah->logo); ?>">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Akademik</title>
    <style>
    	.gradient{
    		background: #dfe4ea;
			/*background: linear-gradient(90deg, rgba(0,176,255,1) 0%, rgba(229,5,244,1) 97%);*/
			
    	}
    	.col-md-2{
    		padding: 10px;
    		opacity: 70%;
    	}
    	.col-md-2:hover{
		    opacity: 100%;
    	}

      /*  */
.counter{
    font-family: 'Nunito Sans', sans-serif;
    background: #fff;
    text-align: center;
    width: 180px;
    min-height: 115px;
    padding: 10px 15px;
    margin: 0 auto;
    border-radius: 30px;
    box-shadow: 0 8px 5px rgba(0, 0, 0, 0.2);
    position: relative;
}
.counter:before{
    content: '';
    background-color: #9DD662;
    height: 105px;
    width: 100%;
    border-radius: 30px 30px 0 0;
    position: absolute;
    left: 0;
    top: 0;
}
.counter .counter-icon{
    color: #fff;
    background: #7CA936;
    font-size: 50px;
    line-height: 90px;
    width: 120px;
    height: 100px;
    margin: 0 auto 10px;
    border-radius: 10px 10px 0 0;
    transform: translateY(-20px);
    position: relative;
    clip-path: polygon(0% 0%, 100% 0, 100% 70%, 50% 100%, 0 70%);
}
.counter .counter-icon:before{
    content: "";
    background: #8AC248;
    width: 120px;
    height: 90px;
    border-radius: 10px 10px 0 0;
    transform: translateX(-50%);
    position: absolute;
    top: 0;
    left: 50%;
    z-index: -1;
    clip-path: polygon(0% 0%, 100% 0, 100% 70%, 50% 100%, 0 70%);
}
.counter:hover .counter-icon i{
    transform: rotate(360deg);
    transition: all 0.3s ease;
}
.counter h3{
    color: #333;
    font-size:17px;
    font-weight: 600;
    letter-spacing: 1px;
    text-transform: uppercase;
    margin: 0 0 5px 0;
}
.counter .counter-value{
    color: #7CA936;
    font-size: 30px;
    font-weight: 600;
    display: block;
}
.counter.blue:before{ background-color: #5A9BEF; }
.counter.blue .counter-icon{ background-color: #2A70B5; }
.counter.blue .counter-icon:before{ background-color: #367DCB; }
.counter.blue .counter-value{ color: #367DCB; }
.counter.red:before{ background-color: #FD6D4B; }
.counter.red .counter-icon{ background-color: #D14026; }
.counter.red .counter-icon:before{ background-color: #EA5736; }
.counter.red .counter-value{ color: #EA5736; }
.counter.gray:before{ background-color: #777; }
.counter.gray .counter-icon{ background-color: #444; }
.counter.gray .counter-icon:before{ background-color: #666; }
.counter.gray .counter-value{ color: #666; }
.counter.purple:before{ background-color: #777; }
.counter.purple .counter-icon{ background-color: #be2edd; }
.counter.purple .counter-icon:before{ background-color: #666; }
.counter.purple .counter-value{ color: #666; }

/*  */
.counter.gold:before{ background-color: #1abc9c; }
.counter.gold .counter-icon{ background-color: #27ae60; }
.counter.gold .counter-icon:before{ background-color: #16a085; }
.counter.gold .counter-value{ color: #666; }

/*  */
.counter.yellow:before{ background-color: #f1c40f; }
.counter.yellow .counter-icon{ background-color: #f39c12; }
.counter.yellow .counter-icon:before{ background-color: #e67e22; }
.counter.yellow .counter-value{ color: #666; }

@media screen and (max-width:990px){
    .counter{ margin-bottom: 40px; }
}

    </style>
  </head>
  <body class="gradient">

  	<div class="container">
  	<!-- header -->
  	<div class="header mt-4">
  		<div class="text-center text-white">
  			
		  	<img src="<?= base_url('assets/img/instansi/'.$sekolah->logo); ?>" width="200" alt="...">
		    <!-- <h1>SISFO AKADEMIK</h1> -->
		    <h2 class="text-secondary"><?= $sekolah->nama_sekolah; ?></h2>

  		</div>
  	</div>

  	<!-- menu -->
  	<div class="col-md-12 mt-5">

      <div class="row">
        <div class="col-md-4 col-sm-6">
            <a href="<?= base_url('sisfo/auth'); ?>" style="text-decoration: none;">
            <div class="counter">
                <div class="counter-icon">
                   <i class="fas fa-graduation-cap"></i>
                </div>
                <div class="counter-content">
                    <h3>Akademik</h3>
                </div>
            </div>
            </a>
        </div>
        <div class="col-md-4 col-sm-6">
            <a href="<?= base_url('infoguru/auth'); ?>" style="text-decoration: none;">
            <div class="counter blue">
                <div class="counter-icon">
                    <i class="fas fa-solid fa-chalkboard-user"></i>
                </div>
                <div class="counter-content">
                    <h3>Info Guru</h3>
                </div>
            </div>
            </a>
        </div>
        <div class="col-md-4 col-sm-6">
            <a href="<?= base_url('infosiswa/auth'); ?>"  style="text-decoration: none;">
            <div class="counter red">
                <div class="counter-icon">
                    <i class="fas fa-users"></i>
                </div>
                <div class="counter-content">
                    <h3>Info Siswa</h3>
                </div>
            </div>
            </a>
        </div>
        

    </div>

        <!-- menu -->
    <div class="col-md-12 mt-5">

      <div class="row">
        <div class="col-md-4 col-sm-6">
            <a href="<?= base_url('keuangan/auth'); ?>" style="text-decoration: none;">
            <div class="counter gold">
                <div class="counter-icon">
                   <i class="fas fa-money-bill"></i>
                </div>
                <div class="counter-content">
                    <h3>Keuangan</h3>
                </div>
            </div>
            </a>
        </div>

        <div class="col-md-4 col-sm-6">
            <a href="<?= base_url('bpbk/Auth'); ?>" style="text-decoration: none;">
            <div class="counter yellow">
                <div class="counter-icon">
                    <i class="fas fa-user-edit"></i>
                </div>
                <div class="counter-content">
                    <h3>BPBK</h3>
                </div>
            </div>
            </a>
        </div>

        <div class="col-md-4 col-sm-6">
            <a href="<?= base_url('presensi'); ?>" style="text-decoration: none;">
            <div class="counter purple">
                <div class="counter-icon">
                    <i class="fa fa-fingerprint"></i>
                </div>
                <div class="counter-content">
                    <h3>Presensi</h3>
                </div>
            </div>
            </a>
        </div>
       
  		
  	</div>

  	</div>


    <!-- Option 2: Separate Popper and Bootstrap JS -->
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    
  </body>
</html>