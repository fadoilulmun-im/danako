@extends('admin.layout.master')

@section('content')
<div class="container-fluid mt-2">
  <div class="row">
    <div class="col-12">
        <div class="card">
          <div class="card-body">
            {{-- <div class="d-flex justify-content-between mb-2">
              <h4 class="mt-0 header-title">Detail Users</h4>
              <div id="button"></div>
            </div> --}}

            <div class="data">
              <div class="spinner mx-auto">
                <span class="spinner-border avatar-lg" role="status" aria-hidden="true"></span>
              </div>
            </div>
            
          </div>
        </div>
    </div>
  </div>
@endsection

@section('init-js')
  <script>
    $(document).ready(function() {
      ajax({
        url: "{{route('api.master.users.show', $id)}}",
        method: "GET",
        beforeSend: function() {},
        success: function(res) {
          let data = res.data;

          let status_color = '';
          switch (data.detail.status) {
            case 'processing':
              // $('#button').html(`
              //   <button type="button" class="btn btn-danger btn-sm rounded" onclick="tolak()">Tolak</button>
              //   <button type="button" class="btn btn-success ms-2 rounded btn-sm" onclick="terima()">Terima</button>
              // `);
              status_color = 'bg-warning';
              break;
            case 'rejected':
              status_color = 'bg-danger';
              break;
            case 'verified':
              status_color = 'bg-success';
              break;
          
            default:
              status_color = 'bg-secondary';
              break;
          }

          $('.data').html(`

            <div class="d-flex justify-content-between mb-2">
              <div id='status-verif'>
                <h5 class='m-0 badge p-1 ${status_color}'>${(data.detail.status).toUpperCase()}</h5>
              </div>
              <div id="button">
                ${data.detail.status == 'processing' ?
                  '<button type="button" class="btn btn-danger btn-sm rounded" onclick="tolak()">Tolak</button>'+
                  '<button type="button" class="btn btn-success ms-2 rounded btn-sm" onclick="terima()">Terima</button>' 
                : data.detail.status == 'rejected' ?
                '<span>Alasan ditolak: '+data.detail.reject_note+'</span>'
                : ''
                } 
              </div>
            </div>

            <div class="row pb-1">
              <div class="col-lg-3">
                <img src="{{asset('')}}${data.photoProfile ? 'uploads'+ data.photoProfile.path : 'assets/images/users/user-6.jpg'}" alt="image" class="img-fluid rounded">
              </div>
            </div>

            <div class="row pb-1">
              <div class="col-lg-3">
                <h5>Nama</h5>
              </div>
              <div class="col-lg-9">
                <h5>: ${data.name}</h5>
              </div>
            </div>

            <div class="row pb-1">
              <div class="col-lg-3">
                <h5>Username</h5>
              </div>
              <div class="col-lg-9">
                <h5>: ${data.username}</h5>
              </div>
            </div>
            
            <div class="row pb-1">
              <div class="col-lg-3">
                <h5>Email</h5>
              </div>
              <div class="col-lg-9">
                <h5>: ${data.email}</h5>
              </div>
            </div>
            
            <div class="row pb-1">
              <div class="col-lg-3">
                <h5>No HP</h5>
              </div>
              <div class="col-lg-9">
                <h5>: ${data.detail.phone_number}</h5>
              </div>
            </div>
            
            <div class="row pb-1">
              <div class="col-lg-3">
                <h5>Alamat</h5>
              </div>
              <div class="col-lg-9">
                <h5>: ${data.detail.address}</h5>
              </div>
            </div>
          `);
        },
      });
      
    });

    function tolak(){
      Swal.fire({
        title: 'Apakah anda yakin?',
        text: "Beri alasan kenapa anda menolak",
        icon: 'warning',
        input: 'text',
        inputAttributes: {
          autocapitalize: 'off'
        },
        showCancelButton: true,
        showLoaderOnConfirm: true,
        allowOutsideClick: () => !Swal.isLoading(),
        preConfirm: (note) => {
          return fetch("{{route('api.master.users.verif', $id)}}", {
            method: 'PUT',
            headers: {
              'Content-Type': 'application/json',
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
              'Authorization': 'Bearer '+localStorage.getItem('_token'),
            },
            body: JSON.stringify({
              status: 0,
              note: note,
            })
          })
          .then(response => {
            if (!response.ok) {
              throw new Error(response.statusText)
            }
            return response.json()
          })
          .catch(error => {
            Swal.showValidationMessage(
              `Request failed: ${error}`
            )
          })
        },
      }).then((result) => {
        if (result.isConfirmed) {
          let data = result.value.data;
          Swal.fire({
            title: `Berhasil`,
            text: 'Berhasil menolak',
            icon: 'success',
          });
          
          $('#button').html(`<span>Alasan ditolak: ${data.reject_note}</span>`);
          $('#status-verif').html(`
            <h5 class='m-0 badge p-1 bg-danger'>${(data.status).toUpperCase()}</h5>
          `);
        }
      })
    }

    function terima(){
      Swal.fire({
        title: 'Apakah anda yakin?',
        text: "Data akan diubah menjadi terverifikasi!",
        icon: 'warning',
        showCancelButton: true,
        showLoaderOnConfirm: true,
        allowOutsideClick: () => !Swal.isLoading(),
        preConfirm: () => {
          return fetch("{{route('api.master.users.verif', $id)}}", {
            method: 'PUT',
            headers: {
              'Content-Type': 'application/json',
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
              'Authorization': 'Bearer '+localStorage.getItem('_token'),
            },
            body: JSON.stringify({
              status: 1
            })
          })
          .then(response => {
            if (!response.ok) {
              throw new Error(response.statusText)
            }
            return response.json()
          })
          .catch(error => {
            Swal.showValidationMessage(
              `Request failed: ${error}`
            )
          })
        },
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.fire({
            title: `Berhasil`,
            text: 'Berhasil verifikasi',
            icon: 'success',
          });
          
          $('#button').html(``);
          $('#status-verif').html(`
            <h5 class='m-0 badge p-1 bg-success'>${(result.value.data.status).toUpperCase()}</h5>
          `);
        }
      })
    }
  </script>
@endsection