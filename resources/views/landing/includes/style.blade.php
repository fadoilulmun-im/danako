<style>
   /* index penampunagan semenetara */

.c-notverifikasi {
    width: 1346px;
    height: 679px;
    margin: auto;
    background-size: cover;
    background-position: center;
    position: relative;
    background-image: url({{ asset('danako/img/bgcard.png') }});
 }


 /* ajuan campaign */

 
  
 .c-notverifikasi .d-flex {
    display: flex;
    align-items: center;
    height: 100%;
  }
  
  .c-notverifikasi .d-flex .title {
    text-align: center;
    width: 598px;
    height: 61px;
    background: #FFFFFF;
    box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
    border-radius: 5px;
  }
  
  .konten{
    width: 406px; 
    height: 351px;
  }
  
  /* Responsive styles */
  @media screen and (max-width: 767px) {
    /* Adjust the size of the container to fit smaller screens */
    .c-notverifikasi {
      width: auto;
      height: auto;
      padding: 20px;
    }
  
    /* Adjust the size of the title */
    .c-notverifikasi .d-flex .title {
      width: 100%;
      height: auto;
    }
  
    /* Adjust the size of the images */
    .konten {
      width: 100%;
      height: auto;
    }
  }
  


  /* payment notifikasi */



  .konten-verifikasi{
    text-align: center;
    width: 598px;
    height: 100%;
    background: #FFFFFF;
    box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
    border-radius: 5px;
    margin: auto; /* membuat konten berada di tengah */
  }
  
  /* aturan untuk layar dengan lebar maksimum 768px */
  @media only screen and (max-width: 768px){
    .konten-verifikasi{
      width: 90%;
      height: auto;
    }
  }
  
  /* aturan untuk layar dengan lebar maksimum 480px */
  @media only screen and (max-width: 480px){
    .konten-verifikasi{
      width: 100%;
    }
  }
  
  .konten-verifikasi .title-pending{
    font-family: 'Poppins';
    font-style: normal;
    font-weight: 600;
    font-size: 24px;
    line-height: 24px;
    margin: auto; /* membuat konten berada di tengah */
  
    /* aturan untuk layar dengan lebar maksimum 768px */
  
  }
  
  @media only screen and (max-width: 768px){
    .konten-verifikasi .title-pending{ 
      font-size: 20px;
    }
  
    }
  
    /* aturan untuk layar dengan lebar maksimum 480px */
    @media only screen and (max-width: 480px){
    .konten-verifikasi .title-pending{
      font-size: 18px;
    }
    }
  
  .konten-verifikasi .title-konten{
    width: 371px;
    height: 68px;
    font-family: 'Poppins';
    font-style: normal;
    font-weight: 400;
    font-size: 16px;
    line-height: 25px;
    /* or 156% */
    letter-spacing: -0.24px;
    text-align: center; /* menengahkan teks */
    margin: auto; /* membuat konten berada di tengah */
  }
  
  /* aturan untuk layar dengan lebar maksimum 768px */
  @media only screen and (max-width: 768px){
    .konten-verifikasi .title-konten{
      width: 80%;
      height: auto;
    }
    }
  
    /* aturan untuk layar dengan lebar maksimum 480px */
    @media only screen and (max-width: 480px){
      .konten-verifikasi .title-konten{
      width: 90%;
      font-size: 14px;
      }
    }




.header{
  width: 100%;
  height: 600px;
}

.header{
  background-size: cover;
  background-image: url({{ asset('danako/img/bgindex.png') }});
}

.text-header{
  padding-top: 15vh;
  
}
.text-header h1{
  font-size: 44px;
}

.hero{
  background-image: url({{ asset('danako/img/bgindex2.png') }});
  background-size: cover;
}

.header .bt-index{
  width: 212px;
border-radius: 45px;
}

.carousel-item{
  padding-left: 120px;
  padding-right: 120px;
}

.sponsor {
  overflow: hidden;
  
}
.sponsor .slider {
  animation: slidein 30s linear infinite;
  white-space: nowrap;
  
}
.sponsor .slider .logos {
  width: 100%;
  display: inline-block;
  margin: 0px 0;
}
.sponsor .slider .logos .fab {
  width: calc(100% / 5);
  animation: fade-in 0.5s cubic-bezier(0.455, 0.03, 0.515, 0.955) forwards;
}

@keyframes slidein {
  from {
    transform: translate3d(0, 0, 0);
  }
  to {
    transform: translate3d(-100%, 0, 0);
  }
}
@keyframes fade-in {
  0% {
    opacity: 0;
  }
  100% {
    opacity: 1;
  }
}



.dropdown-toggle::after {
  display: none;
}



footer.text-footer{
  color: #E9ECEB;
  font-size: 14px;
}

span.icon-footer img{
  width: 30px;
}

span.icon-footer + span.icon-footer{
  margin-left: 40px;
}

footer.footer{
  background-color: #6C6A6A;
}


/* CSS untuk layar dengan lebar kurang dari atau sama dengan 768 piksel */
@media (max-width: 768px) {
  .header{
    height: 400px; /* Mengurangi tinggi header */
  }

  .text-header h1{
    font-size: 32px; /* Mengurangi ukuran font */
  }

  .carousel-item{
    padding-left: 20px;
    padding-right: 20px; /* Mengurangi padding pada item carousel */
  }
  .sponsor .slider .logos {
    width: auto;
    display: inline-block;
    margin: 0px 0;
  }


  .sponsor .slider .logos .fab {
    width: calc(150% / 8); /* Mengurangi jumlah logo pada baris */
  }

  footer.text-footer{
    font-size: 12px; /* Mengurangi ukuran font pada footer */
  }

}

/* CSS untuk layar dengan lebar antara 768 dan 1200 piksel */
@media (min-width: 768px) and (max-width: 1200px) {
  .header{
    height: 500px; /* Mengurangi tinggi header */
  }

  .text-header h1{
    font-size: 38px; /* Mengurangi ukuran font */
  }

  .carousel-item{
    padding-left: 60px;
    padding-right: 60px; /* Mengurangi padding pada item carousel */
  }

  .sponsor .slider .logos .fab {
    width: calc(150% / 8); /* Mengurangi jumlah logo pada baris */
  }

  footer.text-footer{
    font-size: 13px; /* Mengurangi ukuran font pada footer */
  }
}

@media only screen and (max-width: 480px) {
  .sponsor .slider .logos .fab {
    width: calc(190% / 10);
  }
}

/* buat campaign */

/* find */
.find-form {
  background: #ffffff;
  padding: 15px;
  margin-top: 40px;
  border-radius: 10px;
  position: relative;
  -webkit-box-shadow: 0 10px 30px rgba(0, 0, 0, 0.07);
          box-shadow: 0 10px 30px rgba(0, 0, 0, 0.07);
}

.find-form .form-group {
  margin-bottom: 0;
  line-height: 1;
  text-align: left;
  position: relative;
}

.find-form .form-group label {
  font-size: 15px;
  color: #5c5a5a;
  font-weight: 600;
  padding-left: 20px;
}

.find-form .form-group .form-control {
  height: 40px;
  border-radius: 10px;
  padding: 5px 20px 10px;
}

.find-form .form-group ::-webkit-input-placeholder {
  font-size: 14px;
  font-weight: 500;
  color: #8e8d8d;
}

.find-form .form-group :-ms-input-placeholder {
  font-size: 14px;
  font-weight: 500;
  color: #8e8d8d;
}

.find-form .form-group ::-ms-input-placeholder {
  font-size: 14px;
  font-weight: 500;
  color: #8e8d8d;
}

.find-form .form-group ::placeholder {
  font-size: 14px;
  font-weight: 500;
  color: #8e8d8d;
}

.find-form .form-group i {
  position: absolute;
  top: 10px;
  right: 15px;
  font-size: 22px;
  color: #9b9b9b;
}

.find-form .nice-select {
  height: 40px;
  border-radius: 10px;
  padding: 5px 20px 10px;
  border: 1px solid #ced4da;
  width: 100%;
}

.find-form .nice-select::after {
  right: 20px;
  top: 46%;
  width: 9px;
  height: 9px;
}

.find-form .nice-select .current {
  font-size: 14px;
  bottom: 5px;
  position: relative;
  font-weight: 500;
  color:#000;
}

.find-form .nice-select .list {
  width: 100%;
  color:#000;
}

.find-form .find-btn {
  background: #359085;
  font-size: 16px;
  text-transform: uppercase;
  font-weight: 600;
  width: 100%;
  color: #ffffff;
  border-radius: 10px;
  padding: 7px 15px;
  -webkit-transition: 0.5s;
  transition: 0.5s;
}

.bg-wytouse {
  background-color: #515153;
}

.find-form .find-btn:hover {
  background: #515153;
}

.find-form .find-btn i {
  left: 10px;
  top: 2px;
  position: relative;
}

</style>